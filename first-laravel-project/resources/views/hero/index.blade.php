@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('heros.create')}}" class="btn btn-success btn-sm mt-2">Add Hero Section </a>
    @if ($heros->count() <= 0)
    <div class="alert alert-light text-center" role="alert">
        There are not Hero Sections yet
    </div>
    @else
    <table class="table mt-2 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Link</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($heros as $hero)
        <tr>
            <td>{{$hero->id}}</td>
            <td>{{$hero->title}}</td>
            <td>{{$hero->desc}}</td>
            <td>{{$hero->link}}</td>
            <td>
                <a href="{{route('heros.edit',$hero)}}" class="btn btn-sm btn-dark">Edit</a>
                <a href="{{route('heros.show',$hero)}}" class="btn btn-sm btn-dark">Show</a>
                <a href="{{route('heros.delete',$hero)}}" class="btn btn-sm btn-dark">Delete</a>
            </td>
        </tr>
        @endforeach        
    </tbody>
    </table>
    @endif

</div>
@endsection