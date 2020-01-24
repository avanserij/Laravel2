@extends('app')

@section('content')
    <div class="container">

        <h1>Create Post</h1>
        <form action="{{route('category.store')}}" method="POST">
            @csrf

            @include('category.form')


        </form>

@endsection