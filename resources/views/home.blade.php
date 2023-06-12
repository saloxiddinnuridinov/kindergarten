
@extends('welcome')

@section('content')

    <p>
        @php
            echo "Hello World...";
        @endphp
    </p>

@endsection

@section('title')
    Home Page
@endsection

@section('home')
    @include('includes/menu')
@endsection
