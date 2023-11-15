@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{route('services.create')}}" class="btn btn-success btn-sm mt-2 mb-2">Add Service </a>
    @if ($services->count() <= 0)
    <div class="alert alert-light text-center" role="alert">
        There are not Services yet
    </div>
    @else
    <table class="table mt-2 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>icon</th>
                <th>icon color</th>
                <th>border color</th>
                <th>bg color</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($services as $hero)
        <tr>
            <td>{{$hero->id}}</td>
            <td>{{$hero->title}}</td>
            <td>{{$hero->desc}}</td>
            <td>
            <i class="{{$hero->icon}}"></i>
            </td>
            <td><div style="display: inline-block ; width: 25px; height: 25px; border-radius: 5px; background-color: {{$hero->icon_color}};"></div> </td>
            <td><div style="display: inline-block ; width: 25px; height: 25px; border-radius: 5px; background-color: {{$hero->border_color}};"></div> </td>
            <td><div style="display: inline-block ; width: 25px; height: 25px; border-radius: 5px; background-color: {{$hero->bg_color}};"></div> </td>
            <td>
                <a href="{{route('services.edit',$hero)}}" class="btn btn-sm btn-dark">Edit</a>
                <a href="{{route('services.show',$hero)}}" class="btn btn-sm btn-dark">Show</a>
                <a href="{{route('services.delete',$hero)}}" class="btn btn-sm btn-dark">Delete</a>
            </td>
        </tr>
        @endforeach        
    </tbody>
    </table>
    @endif

</div>
@endsection