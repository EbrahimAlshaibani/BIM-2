@extends('layouts.master')
@section('title') Cars @endsection
@section('content')
<div class="container">
    <a href="{{route('cars.create')}}" class="btn btn-success btn-sm mt-2">Add Car </a>
    {{-- {{"<h1>Hey</h1>"}} --}}
    {{-- {{ 1+1 }} --}}

    {{-- {!! "<script>alert('')</script>" !!} --}}

    @if ($cars->count() <= 0)
    <div class="alert alert-light text-center" role="alert">
        There are not cars yet
    </div>
    @else
    <table class="table mt-2 text-center">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Model</th>
                <th>Price</th>
                <th>Available</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($cars as $car)
        <tr class="{{ !$car->is_avaiable?'table-danger':'' }}"" >
            <td>{{$car->id}}</td>
            <td>{{$car->name}}</td>
            <td>{{$car->model}}</td>
            <td>${{$car->price}}</td>
            <td>
                @if ($car->is_avaiable)
                <span class="badge rounded-pill text-bg-success">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                    </svg>
                </span>
                @else
                <span class="badge rounded-pill text-bg-danger">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                </svg>
            </span>
                @endif
            
            </td>
            <td>
                <a href="{{route('cars.edit',$car)}}" class="btn btn-sm btn-dark">Edit</a>
                <a href="{{route('cars.show',$car)}}" class="btn btn-sm btn-dark">Show</a>
                <a href="{{route('cars.delete',$car)}}" class="btn btn-sm btn-dark">Delete</a>
                {{-- <a href="{{route('cars.trash',$car)}}" class="btn btn-sm btn-dark">Trash</a> --}}
                <a href="{{route('cars.toggleAvaliablity',$car)}}" class="btn btn-sm btn-dark">
                    @if ($car->is_avaiable)
                        not avaliable
                    @else
                        avaliable
                    @endif
                </a>
                {{-- <form action="{{route('cars.destroy',$car)}}" method="POST" class="d-inline" onsubmit='return confirm("are you sure you want to delete the car {{$car->name}}")'>
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Yes</button>
                </form> --}}
            </td>
        </tr>
        @endforeach        
    </tbody>
    </table>
    @endif
    {{-- <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d240.49093439428304!2d44.188500278093834!3d15.330115897164118!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1603db4120205f2d%3A0x8e1420fe9eecb25b!2sAl%20Moalim%20Restaurant%201!5e0!3m2!1sen!2s!4v1699425132332!5m2!1sen!2s"  height="450" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> --}}

</div>
@endsection