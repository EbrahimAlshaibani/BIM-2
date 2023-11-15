<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    function index() {
        $cars = Car::all();
        return view('car.index',compact('cars',));
        // return view('car.index')->with('mycars',$cars);
    }
    function show(Car $car) {
        return view('car.show',compact('car'));
    }
    function create() {
        return view('car.create');
    }
    function store(Request $request) {
        $request->validate([
            'manufacturer'=> 'required',
            'name'=> 'required',
            'model'=> 'required',
            'color'=> 'required',
            'price'=> 'required',
            'vin'=> 'required|unique:cars',
        ]);
        Car::create($request->all());
        return redirect()->route('cars.index');
    }
    function edit(Car $car) {
        return view('car.edit',compact('car'));
    }
    function update(Request $request, Car $car) {
        $car->name = $request->name;
        $car->color = $request->color;
        $car->vin = $request->vin;
        $car->model = $request->model;
        $car->manufacturer = $request->manufacturer;
        $car->price = $request->price;
        $car->update();
        return redirect()->route('cars.index');
    }
    function delete(Car $car) {
        return view('car.confirm-delete')->with('car',$car);
    }
    function trash(Car $car) {
        $car->trash();
        return redirect()->route('cars.index');
    }
    function destroy(Car $car) {
        $car->delete();
        return redirect()->route('cars.index');
    }
    function toggleAvaliablity(Car $car){
        $car->is_avaiable = !$car->is_avaiable;
        $car->update();
        return redirect()->route('cars.index');
    }
}
