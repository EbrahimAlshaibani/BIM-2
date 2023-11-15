@extends('layouts.master')
@section('title') Create Car @endsection
@section('content')
    <div class="container mt-2">
        <form action="{{route('cars.store')}}" method="POST" class="row">
            @method('POST')
            @csrf
            <div class="col-6">
                <label for="name">Name:</label>
                <input type="text" placeholder="Car Name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                <p class="text-danger">@error('name') {{$message}} @enderror</p>
            </div>
            <div class="col-6">
                <label for="color">color:</label>
                <input type="text" placeholder="Car color" name="color" id="color" class="form-control @error('color') is-invalid @enderror" value="{{old('color')}}">
                <p class="text-danger">@error('color') {{$message}} @enderror</p>

            </div>
            <div class="col-6">
                <label for="model">model:</label>
                <input type="text" placeholder="Car model" name="model" id="model" class="form-control @error('model') is-invalid @enderror" value="{{old('model')}}">
                <p class="text-danger">@error('model') {{$message}} @enderror</p>
            </div>
            <div class="col-6">
                <label for="manufacturer">manufacturer:</label>
                <input type="text" placeholder="Car manufacturer" name="manufacturer" id="manufacturer" class="form-control @error('manufacturer') is-invalid @enderror" value="{{old('manufacturer')}}">
                <p class="text-danger">@error('manufacturer') {{$message}} @enderror</p>

            </div>
            <div class="col-6">
                <label for="color">price:</label>
                <input type="text" placeholder="Car price" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
                <p class="text-danger">@error('price') {{$message}} @enderror</p>
            </div>
            <div class="col-6">
                <label for="vin">vin:</label>
                <input type="text" placeholder="Car vin" name="vin" id="vin" class="form-control @error('vin') is-invalid @enderror" value="{{old('vin')}}">
                <p class="text-danger">@error('vin') {{$message}} @enderror</p>
            </div>
            <div class="col-12">
                <button class="btn btn-sm btn-success w-100 mt-2">Save</button>
            </div>
        </form>
    </div>

    @endsection