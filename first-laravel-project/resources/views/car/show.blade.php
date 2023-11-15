@extends('layouts.master')
@section('title') Car {{$car->id}} @endsection
@section('content')
<div class="d-flex justify-content-center align-items-center" style="height: 100vh">
    <div class="container-sm m-4 p-4 border rounded">
        <div class="row">
            <div class="col-6">
                <b class="font-weight-bold">Car Name : </b>
            </div>
            <div class="col-6">
                <p> {{$car->name}} </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <b class="font-weight-bold">Car color : </b>
            </div>
            <div class="col-6">
                <p> {{$car->color}} </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <b class="font-weight-bold">Car model : </b>
            </div>
            <div class="col-6">
                <p> {{$car->model}} </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <b class="font-weight-bold">Car price : </b>
            </div>
            <div class="col-6">
                <p> {{$car->price}} </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <b class="font-weight-bold">Car manufacturer : </b>
            </div>
            <div class="col-6">
                <p> {{$car->manufacturer}} </p>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-6">
                <b class="font-weight-bold">Car vin : </b>
            </div>
            <div class="col-6">
                <p> {{$car->vin}} </p>
            </div>
        </div>
    </div>
</div>
@endsection