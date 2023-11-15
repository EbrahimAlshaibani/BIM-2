@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <form action="{{route('services.store')}}" method="POST" class="row">
        @method('POST')
        @csrf
        <div class="col-9">
            <label for="title">title:</label>
            <input type="text" placeholder="title" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
            <p class="text-danger">@error('title') {{$message}} @enderror</p>
        </div>
        <div class="col-3">
            <label for="icon">icon:</label>
            <input type="text" placeholder="icon" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{old('icon')}}">
            <p class="text-danger">@error('icon') {{$message}} @enderror</p>
        </div>
        <div class="col-12">
            <label for="desc">desc:</label>
            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control @error('desc') is-invalid @enderror">{{old('desc')}}</textarea>
            <p class="text-danger">@error('desc') {{$message}} @enderror</p>
        </div>

        <div class="col-4">
            <label for="bg_color">bg color:</label>
            <input type="color" placeholder="bg color" name="bg_color" id="bg_color" class="form-control @error('bg_color') is-invalid @enderror" value="{{old('bg_color')}}">
            <p class="text-danger">@error('bg_color') {{$message}} @enderror</p>
        </div>

        <div class="col-4">
            <label for="border_color">border color:</label>
            <input type="color" placeholder="border color" name="border_color" id="border_color" class="form-control @error('border_color') is-invalid @enderror" value="{{old('border_color')}}">
            <p class="text-danger">@error('border_color') {{$message}} @enderror</p>
        </div>

        <div class="col-4">
            <label for="icon_color">icon color:</label>
            <input type="color" placeholder="icon color" name="icon_color" id="icon_color" class="form-control @error('icon_color') is-invalid @enderror" value="{{old('icon_color')}}">
            <p class="text-danger">@error('icon_color') {{$message}} @enderror</p>
        </div>

        <div class="col-12">
            <button name="button" value="save" class="btn btn-sm btn-success mt-2">Save</button>
            <button name="button" value="save_and_continue" class="btn btn-sm btn-success mt-2">Save and Continue Editing</button>
        </div>
    </form>
</div>
@endsection