<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function create($car_id)
    {

        $car = Cars::find($car_id);


        return view('reservations.create', compact('car'));
    }

    public function store(Request $request)
    {
        // Validate the input
        $validated = $request->validate([
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);
//dd($request->car_id);
        $car = Cars::find($request->car_id);

        // Check if the car is already reserved during the requested period
        $carReserved = Reservation::where('car_id', $car->car_id) // Using the passed $car instance
        ->where(function ($query) use ($request) {
            $query->whereBetween('pickup_date', [$request->start_date, $request->end_date])
                ->orWhereBetween('return_date', [$request->start_date, $request->end_date])
                ->orWhere(function ($query) use ($request) {
                    $query->where('pickup_date', '<=', $request->start_date)
                        ->where('return_date', '>=', $request->end_date);
                });
        })
            ->exists();

        // If the car is already reserved, redirect back with an error message
        if ($carReserved) {
            return redirect()->back()->with('error', 'This car is already reserved for the selected dates.');
        }

        // Calculate the reservation period in days
        $start_date = Carbon::parse($request->start_date);
        $end_date = Carbon::parse($request->end_date);
        $days = $start_date->diffInDays($end_date) + 1;

        // Retrieve the car's price
        $price_per_day = $car->price;

        // Calculate the total price
        $total_price = $days * $price_per_day;

        // Create the reservation
        Reservation::create([
            'user_id' => auth()->id(),
            'car_id' => $car->car_id,
            'pickup_date' => $request->start_date,
            'return_date' => $request->end_date,
            'reservation_date' => now(),
            'subtotal' => $total_price,
        ]);

        return redirect()->route('reservations.my')->with('success', 'Reservation created successfully!');
    }



    public function index()
    {
        $reservation = Reservation::where('user_id', auth()->id())->get();
        return view('reservations.index', compact('reservation'));
    }

    public function myReservations()
    {

        $reservations = Reservation::with('car')
        ->where('user_id', auth()->id())
            ->orderBy('pickup_date', 'asc')
            ->get();

        return view('reservations.my', compact('reservations'));
    }


    public function edit($id)
    {

        $reservation = Reservation::findOrFail($id);

    //cek reservasi dobel
        $overlappingReservation = Reservation::where('car_id', $reservation->car_id)
            ->where(function ($query) use ($reservation) {
                $query->whereBetween('pickup_date', [$reservation->pickup_date, $reservation->return_date])
                    ->orWhereBetween('return_date', [$reservation->pickup_date, $reservation->return_date])
                    ->orWhere(function ($query) use ($reservation) {
                        $query->where('pickup_date', '<=', $reservation->pickup_date)
                            ->where('return_date', '>=', $reservation->return_date);
                    });
            })
            ->where('reservation_id', '!=', $reservation->reservation_id) // no curr rsvp
            ->where('user_id', '!=', auth()->id()) // the reservation bukan puny current user
            ->exists();


        if ($overlappingReservation) {
            return redirect()->route('reservations.index')->with('error', 'This car is already reserved during the selected dates.');
        }


        return view('reservations.edit', compact('reservation'));
    }



    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after_or_equal:pickup_date',
        ]);


        $reservation = Reservation::with('car')->findOrFail($id);


        // cek rsv
        $overlappingReservation = Reservation::where('car_id', $reservation->car_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('pickup_date', [$request->pickup_date, $request->return_date])
                    ->orWhereBetween('return_date', [$request->pickup_date, $request->return_date])
                    ->orWhere(function ($query) use ($request) {
                        $query->where('pickup_date', '<=', $request->pickup_date)
                            ->where('return_date', '>=', $request->return_date);
                    });
            })
            ->where('reservation_id', '!=', $reservation->reservation_id)
            ->exists();


        if ($overlappingReservation) {
            return back()->with('error', 'This car is already reserved during the selected dates.');
        }


        $reservation->update([
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
        ]);


        return redirect()->route('reservations.my')->with('success', 'Reservation updated successfully!');
    }

       public function markAsRented($reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);

        if ($reservation->status === 'pending') {
            // Mark reservation as rented
            $reservation->status = 'rented';
            $reservation->save();

            // Also mark the car as checked out
            $car = $reservation->car;
            $car->status = 'checked out';  // Mark car as unavailable
            $car->save();

            return redirect()->back()->with('success', 'Reservation marked as rented, car checked out.');
        }

        return redirect()->back()->with('error', 'Reservation is not pending.');
    }

    // Mark reservation as pending
    public function markAsPending($reservation_id)
    {
        $reservation = Reservation::findOrFail($reservation_id);

        if ($reservation->status === 'rented') {
            // Mark reservation as pending
            $reservation->status = 'pending';
            $reservation->save();

            // Mark the car as available again
            // Mark car as available


            return redirect()->back()->with('success', 'Reservation marked as pending, car available.');
        }

        return redirect()->back()->with('error', 'Reservation is not rented.');
    }



public function destroy($reservation_id)
{
    $reservation = Reservation::find($reservation_id);

    if ($reservation) {
        $reservation->delete();
        return redirect()->route('reservations.my')->with('success', 'Reservation deleted successfully');
    }

    return redirect()->route('reservations.my')->with('error', 'Reservation not found');
}


    public function extend($id)
    {
        $reservation = Reservation::findOrFail($id);

        return redirect()->route('reservations.my')->with('success', 'Reservation extended!');
    }
}
