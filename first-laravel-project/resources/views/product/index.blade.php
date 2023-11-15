@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('products.create')}}" class="btn btn-success btn-sm mt-2">Add Product </a>
    @if ($products->count() <= 0)
    <div class="alert alert-light text-center" role="alert">
        There are not Products yet
    </div>
    @else
    <table class="table mt-2 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td>
                <a href="{{route('products.edit',$product)}}" class="btn btn-sm btn-dark">Edit</a>
            </td>
        </tr>
        @endforeach        
    </tbody>
    </table>
    @endif

</div>
@endsection