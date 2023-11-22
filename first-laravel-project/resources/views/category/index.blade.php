@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('categories.create')}}" class="btn btn-success btn-sm mt-2">Add Category </a>
    @if ($categories->count() <= 0)
    <div class="alert alert-light text-center" role="alert">
        There are not Category yet
    </div>
    @else
    <table class="table mt-2 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Products Count</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($categories as $hero)
        <tr>
            <td>{{$hero->id}}</td>
            <td>{{$hero->name}}</td>
            <td>{{$hero->products_count}}</td>
            <td>{{$hero->created_at}}</td>
            <td>
                <a href="{{route('categories.edit',$hero)}}" class="btn btn-sm btn-dark">Edit</a>
                <a href="{{route('categories.show',$hero)}}" class="btn btn-sm btn-dark">Show</a>
            </td>
        </tr>
        @endforeach        
    </tbody>
    </table>
    @endif

</div>
@endsection