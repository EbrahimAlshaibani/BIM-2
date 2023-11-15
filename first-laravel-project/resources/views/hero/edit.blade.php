@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <form action="{{route('heros.update',$hero->id )}}" method="POST" class="row">
        @method('PUT')
        @csrf
        <div class="col-6">
            <label for="title">title:</label>
            <input type="text" placeholder="title" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $hero->title }}">
            <p class="text-danger">@error('title') {{$message}} @enderror</p>
        </div>
        <div class="col-6">
            <label for="link">link:</label>
            <input type="text" placeholder="link" name="link" id="link" class="form-control @error('link') is-invalid @enderror" value="{{ $hero->link }}">
            <p class="text-danger">@error('link') {{$message}} @enderror</p>
        </div>
        <div class="col-12">
            <label for="desc">desc:</label>
            <textarea name="desc" id="desc" cols="30" rows="10" class="form-control @error('desc') is-invalid @enderror">{{ $hero->desc }}</textarea>
            <p class="text-danger">@error('desc') {{$message}} @enderror</p>
        </div>
        <div class="col-12">
            <button class="btn btn-sm btn-success w-100 mt-2">Update</button>
        </div>
    </form>
</div>
@endsection