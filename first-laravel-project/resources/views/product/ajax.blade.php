@extends('layouts.app')
@section('content')
<div class="container mt-2">
    <p class="text-success" id="message">

    </p>
    <form class="row" id="form">
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
            <select name="category_id" id="category" class="form-select">
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
            <button class="btn btn-sm btn-success w-100 mt-2" id="submitBtn">Save</button>
            <button class="btn btn-sm btn-success w-100 mt-2" id="loadingBtn" type="button" disabled>
                <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                <span role="status">Loading...</span>
            </button>
        </div>
    </form>
</div>
@endsection



@section('scripts')
<script>
    $(document).ready(function() {
        $("#loadingBtn").hide()
        const form = $("#form")
        form.on('submit',function(e){
            e.preventDefault();
            $("#submitBtn").hide()
            $("#loadingBtn").show()
            const body = {
                "name": $("#name").val(),
                "seller":$("#seller").val(),
                "price":$("#price").val(),
                "url":$("#url").val(),
                "title":$("#title").val(),
                "category_id":$("#category").val(),
                "desc":$("#desc").val(),
            } 
            $.ajax({
                url: '/products/add/',
                type: 'POST',
                dataType: 'json',
                data: body,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(data) {
                    console.log(data);
                    console.log("Added Successfully");
                    $("#message").text(data)
                    $("#submitBtn").show()
                    $("#loadingBtn").hide()
                },
                error: function(error) {
                    console.log(error);
                    $("#submitBtn").show()
                    $("#loadingBtn").hide()

                }
            })
        })
        
    })
</script>
@endsection