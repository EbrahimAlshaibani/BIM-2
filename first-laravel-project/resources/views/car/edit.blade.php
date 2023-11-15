@extends('layouts.master')
@section('title') Car {{$car->id}} @endsection
@section('content')
    <div class="container mt-2">
        <form action="{{route('cars.update',$car)}}" method="POST" class="row">
            @method('PUT')
            @csrf
            <div class="col-6">
                <label for="name">Name:</label>
                <input type="text" placeholder="Car Name" name="name" id="name" class="form-control" value="{{$car->name}}">
            </div>
            <div class="col-6">
                <label for="color">color:</label>
                <input type="text" placeholder="Car color" name="color" id="color" class="form-control" value="{{$car->color}}">
            </div>
            <div class="col-6">
                <label for="model">model:</label>
                <input type="text" placeholder="Car model" name="model" id="model" class="form-control" value="{{$car->model}}">
            </div>
            <div class="col-6">
                <label for="manufacturer">manufacturer:</label>
                <input type="text" placeholder="Car manufacturer" name="manufacturer" id="manufacture" class="form-control" value="{{$car->manufacturer}}">
            </div>
            <div class="col-6">
                <label for="color">price:</label>
                <input type="text" placeholder="Car price" name="price" id="price" class="form-control" value="{{$car->price}}">
            </div>
            <div class="col-6">
                <label for="vin">vin:</label>
                <input type="text" placeholder="Car vin" name="vin" id="vin" class="form-control" value="{{$car->vin}}">
            </div>
            <div class="col-12">
                <button class="btn btn-sm btn-success w-100 mt-2">Save</button>
            </div>
        </form>
    </div>
    @endsection