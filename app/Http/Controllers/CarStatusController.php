<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Models\Cars; // Make sure the model is correctly referenced
use Illuminate\Http\Request;

class CarStatusController extends Controller
{
    // Mark a car as "Not Available" (Check-Out)
    public function checkOut($car_id)
    {
        // Find the car by ID
        $car = Cars::findOrFail($car_id);

        // Update the car's status to 'rented'
        $car->status = 'not available';
        $car->save();

        // Find the active reservation for this car (pending reservation)
        $reservation = Reservation::where('car_id', $car->car_id)
            ->where('status', 'pending') // Only affect pending reservations
            ->first();



        return redirect()->route('carstatus.index')->with('success', 'Car checked out and reservation marked as rented.');
    }

public function checkIn($id)
{
    $car = Cars::findOrFail($id); // Find the car by its ID
    $car->status = 'available'; // Mark the car as available
    $car->save(); // Save the changes

    return redirect()->route('carstatus.index')->with('success', 'Car checked in successfully!');
}

    // Inside CarStatusController
// Inside CarStatusController
public function index()
{
    $cars = Cars::all();
    return view('cars.carstatus', compact('cars')); // Use the new view name
}


}
