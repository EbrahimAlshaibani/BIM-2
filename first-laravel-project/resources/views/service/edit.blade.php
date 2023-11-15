@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <form action="{{route('services.update',$service->id)}}" method="POST" class="row">
        @method('PUT')
        @csrf
        <div class="col-9">
            <label for="title">title:</label>
            <input type="text" placeholder="title" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value=" {{ $service->title }} ">
            <p class="text-danger">@error('title') {{$message}} @enderror</p>
        </div>
        <div class="col-3">
            <label for="icon">icon:</label>
            <input type="text" placeholder="icon" name="icon" id="icon" class="form-control @error('icon') is-invalid @enderror" value="{{ $service->icon }}">
            <p class="text-danger">@error('icon') {{$message}} @enderror</p>
        </div>
        <div class="col-12">
            <label for="desc">desc:</label>
            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control @error('desc') is-invalid @enderror">{{ $service->desc }}</textarea>
            <p class="text-danger">@error('desc') {{$message}} @enderror</p>
        </div>

        <div class="col-4">
            <label for="bg_color">bg color:</label>
            <input type="color" placeholder="bg color" name="bg_color" id="bg_color" class="form-control @error('bg_color') is-invalid @enderror" value="{{ $service->bg_color }}">
            <p class="text-danger">@error('bg_color') {{$message}} @enderror</p>
        </div>
        <div class="col-4">
            <label for="border_color">border color:</label>
            <input type="color" placeholder="border color" name="border_color" id="border_color" class="form-control @error('border_color') is-invalid @enderror" value="{{ $service->border_color }}">
            <p class="text-danger">@error('border_color') {{$message}} @enderror</p>
        </div>

        <div class="col-4">
            <label for="icon_color">icon color:</label>
            <input type="color" placeholder="icon color" name="icon_color" id="icon_color" class="form-control @error('icon_color') is-invalid @enderror" value="{{ $service->icon_color }}">
            <p class="text-danger">@error('icon_color') {{$message}} @enderror</p>
        </div>

        <div class="col-12">
            <button class="btn btn-sm btn-success  mt-2" name="button" value="save">Save</button>
            <button class="btn btn-sm btn-success  mt-2" name="button" value="save_as_new">Save as New</button>
        </div>
    </form>
</div>
@endsection