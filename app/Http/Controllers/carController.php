<?php

namespace App\Http\Controllers;

use App\Models\Cars;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
class carController extends Controller
{

    public function index()
    {

        $cars = Cars::where('status', 'available')->get();
        return view('cars.cars', ['cars' => $cars]);
    }

    public function show(Cars $car, Request $request)
    {

        $reservations = $car->reservations;  //  all reservations

        // filer dri user inpt
        if ($request->has('filter') && $request->filter == 'future') {
            $reservations = $reservations->where('pickup_date', '>=', now());
        } elseif ($request->has('filter') && $request->filter == 'past') {
            $reservations = $reservations->where('return_date', '<', now());
        }

        return view('cars.car', compact('car', 'reservations'));
    }


    public function edit(Cars $car){

        if (!Gate::allows('edit-car')) {
            abort(403);
        }

        return view('cars.carEdit', compact('car'));
    }
    public function create()
    {
        return view('cars.carAdd');
    }
    public function store(Request $request){
        //        dd($request->all());


        if (!Gate::allows('add-car')) {
            abort(403);
        }
        $existingplate = Cars::where('number_plate', $request->number_plate)->first();
        if ($existingplate) {
            return back()->withErrors(['number_plate' => 'Nomor pelat ini sudah terdaftar.']);
        }
        $existingrangka = Cars::where('no_rangka', $request->no_rangka)->first();
        if ($existingrangka) {
            return back()->withErrors(['no_rangka' => 'Nomor rangka ini sudah terdaftar.']);
        }



        $request->validate([
                'car_model'=>'required|string|max:30',
                'year'=>'required|integer|digits:4',
                'status'=>'in:available,not Available,reserverd',
                'number_plate'=>'required|string|max:9|regex:/^[A-Z0-9]+$/', //^ artinya start $ artny end dari string harus sesaui format
                'no_rangka'=>'required|string|max:20|regex:/^[A-Z0-9]+$/',
                'price'=>'required|integer|digits_between:1,10',
                'img'=>'image|mimes:jpeg,png,jpg|max:2048',
            ]
        );
        $imgName=time() . '.' . $request->img->getClientOriginalExtension();
        $request->img->storeAs('carIMG',$imgName, 'public');

        $car= new Cars();
        $car->car_model = $request->car_model;
        $car->year = $request->year;
        $car->status= $request->status;
        $car->number_plate = $request->number_plate;
        $car->no_rangka= $request->no_rangka;
        $car->price= $request->price;
        $car->img = 'carIMG/'.$imgName;
        $car->status= 'available';
        $car->save();

        return redirect('/cars')->with('success', 'Mobil baru berhasil ditambahkan');
    }

    public function update(Request $request, Cars $car){
        if (!Gate::allows('edit-car')) {
            abort(403);
        }

        $request->validate([
                'car_model'=>'required|string|max:30',
                'year'=>'required|integer|digits:4',
                'status'=>'in:available,not Available,reserverd',
                'number_plate'=>'required|string|max:9|regex:/^[A-Z0-9]+$/', //^ artinya start $ artny end dari string harus sesaui format
                'no_rangka'=>'required|string|max:20|regex:/^[A-Z0-9]+$/',
                'price'=>'required|integer|digits_between:1,10',
                'img'=>'image|mimes:jpeg,png,jpg|max:2048',
            ]
        );

        // logic update image
        if ($request->hasFile('img')) {
            $fileName = time(). $request->number_plate . '.' . $request->img->getClientOriginalExtension(); //new filename

            // simpan img barunya
            $imagePath = $request->file('img')->storeAs('carIMG',$fileName, 'public');

            // cek apakah img lama ada kalau ada maka dihapus
            if ($car->img && file_exists(storage_path('app/public/' . $car->img))) {
                unlink(storage_path('app/public/' . $car->img));
            }

            // Update nama file ke yg sesuai format
            $request->img = $imagePath;
        } else {
            //handling jika user tidak upload foto baru maka pakai yg lama saja (menghindari fotonya jadi null)
            $request->img = $car->img;
        }

        $car->update(
            [
                'car_model'=>$request->car_model,
                'year' =>$request->year,
                'status'=> $request->status,
                'number_plate'=> $request->number_plate,
                'no_rangka'=>$request->no_rangka,
                'price'=>$request->price,
                'img'=>$request->img,
            ]
        );
        session()->flash('success', 'Car image updated successfully!');
        return redirect()->route('cars.index')->with('success', 'Mobil berhasil diupdate');
    }

    public function delete(Cars $car){
        if (!Gate::allows('delete-car')) {
            abort(403);
        }

        $car->delete();
        return redirect()->route('cars.index')->with('success', 'Mobil berhasil dihapus');

    }

    public function markAsRented($id) {
        $car = Car::findOrFail($id);
        $car->status = 'rented';
        $car->save();

        return redirect()->back()->with('success', 'Car marked as rented.');
    }

    public function markAsPending($id) {
        $car = Car::findOrFail($id);
        $car->status = 'pending';
        $car->save();

        return redirect()->back()->with('success', 'Car marked as pending.');
    }

}
