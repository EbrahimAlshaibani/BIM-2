@extends('layouts.master')
@section('title') Car {{$car->id}} @endsection
@section('content')
    <div class="container mt-2">
        <form action="{{route('cars.destroy',$car)}}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <h3 class="mb-2">Are you sure that you want to delete the car {{$car->name}} {{$car->model}} ?</h3>
            <button class="btn btn-sm btn-danger">Yes</button>
            <a href="{{route('cars.index')}}" class="btn btn-sm btn-dark">No</a>
        </form>
    </div>
@endsection