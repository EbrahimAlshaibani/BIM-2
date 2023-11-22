@extends('layouts.app')
@section('content')

@php
    use Illuminate\Support\Carbon;

@endphp
<div class="container">
    <a href="{{route('products.create')}}" class="btn btn-success btn-sm mt-2">Add Product </a>
    <a href="{{route('products.add')}}" class="btn btn-success btn-sm mt-2">Add Product Ajax </a>
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
                <th>Images</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
        <tr>
            <td>{{$product->id}}</td>
            <td>{{$product->name}}</td>
            <td>{{$product->price}}</td>
            <td>{{$product->category->name}}</td>
            <td>{{$product->images->count()}}</td>
            <td>{{ Carbon::parse($product->created_at)->diffForHumans()}} | {{ Carbon::parse($product->created_at)->format('d/m/Y h:i:s A')}}</td>

            <td>
                <a href="{{route('products.edit',$product)}}" class="btn btn-sm btn-dark">Edit</a>
            </td>
        </tr>
        @endforeach        
    </tbody>
    </table>
    {{ $products->links() }}
    @endif

</div>
@endsection