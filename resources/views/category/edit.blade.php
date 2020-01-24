@extends('app')

@section('content')
    <div class="container">

        <h1>Create Post</h1>
        <form action="{{route('category.update', $category)}}" method="POST">
            @method('PUT')
            @csrf

            @include('category.form')


        </form>

@endsection