@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <form action="{{route('categories.update',$category->id)}}" method="POST" class="row">
        @method('PUT')
        @csrf
        <div class="col-12">
            <label for="name">Name:</label>
            <input type="text" placeholder="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}">
            <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </div>
        <div class="col-12">
            <button class="btn btn-sm btn-success w-100 mt-2">Update</button>
        </div>
    </form>
</div>
@endsection