@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <form action="{{route('products.store')}}" method="POST" class="row">
        @method('POST')
        @csrf
        <div class="col-6">
            <label for="name">Name:</label>
            <input type="text" placeholder="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
            <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </div>
        <div class="col-6">
            <label for="seller">Seller:</label>
            <input type="text" placeholder="seller" name="seller" id="seller" class="form-control @error('seller') is-invalid @enderror" value="{{old('seller')}}">
            <p class="text-danger">@error('seller') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="price">price:</label>
            <input type="text" placeholder="price" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{old('price')}}">
            <p class="text-danger">@error('price') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="url">url:</label>
            <input type="text" placeholder="url" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="{{old('url')}}">
            <p class="text-danger">@error('url') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="title">title:</label>
            <input type="text" placeholder="title" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{old('title')}}">
            <p class="text-danger">@error('title') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="category">Category:</label>
            <select name="category_id" class="form-select">
                <option value="">---</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            <p class="text-danger">@error('category') {{$message}} @enderror</p>
        </div>

        <div class="col-12">
            <label for="desc">desc:</label>
            <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" cols="30" rows="10">{{old('desc')}}</textarea>
            <p class="text-danger">@error('desc') {{$message}} @enderror</p>
        </div>
        <div class="col-12">
            <button class="btn btn-sm btn-success w-100 mt-2">Save</button>
        </div>
    </form>
</div>
@endsection


