@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <form action="{{route('products.update',$product->id)}}" method="POST" class="row" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-6">
            <label for="name">Name:</label>
            <input type="text" placeholder="name" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}">
            <p class="text-danger">@error('name') {{$message}} @enderror</p>
        </div>
        <div class="col-6">
            <label for="seller">Seller:</label>
            <input type="text" placeholder="seller" name="seller" id="seller" class="form-control @error('seller') is-invalid @enderror" value="{{ $product->seller }}">
            <p class="text-danger">@error('seller') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="price">price:</label>
            <input type="text" placeholder="price" name="price" id="price" class="form-control @error('price') is-invalid @enderror" value="{{ $product->price }}">
            <p class="text-danger">@error('price') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="url">url:</label>
            <input type="text" placeholder="url" name="url" id="url" class="form-control @error('url') is-invalid @enderror" value="{{ $product->url }}">
            <p class="text-danger">@error('url') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="title">title:</label>
            <input type="text" placeholder="title" name="title" id="title" class="form-control @error('title') is-invalid @enderror" value="{{ $product->title }}">
            <p class="text-danger">@error('title') {{$message}} @enderror</p>
        </div>

        <div class="col-6">
            <label for="category">Category:</label>
            <select name="category_id" class="form-select">
                <option value="">---</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id==$product->category->id?'selected':'' }} >{{ $category->name }}</option>
                @endforeach
            </select>
            <p class="text-danger">@error('category') {{$message}} @enderror</p>
        </div>
        @if ($product->images->count() > 0)
        <div class="col-12">
            <label for="images">Images
            @foreach ($product->images as $item)
                <img src='{{asset("uploads/images/$item->url")}}'  width="200">
            @endforeach
        </label>
        </div>
        @endif
        


        <div class="col-12 ">
            <label for="images">Images</label>
            <input type="file" accept=".jpg" multiple class="form-control" name="images[]" id="images">
            <p class="text-danger">@error('images') {{$message}} @enderror</p>
        </div>

        <div class="col-12">
            <label for="desc">desc:</label>
            <textarea name="desc" id="desc" class="form-control @error('desc') is-invalid @enderror" cols="30" rows="10">{{ $product->desc }}</textarea>
            <p class="text-danger">@error('desc') {{$message}} @enderror</p>
        </div>
        <div class="col-12">
            <button class="btn btn-sm btn-success w-100 mt-2">Save</button>
        </div>
    </form>
</div>

@endsection


