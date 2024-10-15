@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="jumbotron text-center">
        <h1>Welcome to My Laravel App</h1>
        <p>This is a simple Employee Management System.</p>
        <a href="{{ url('/nhanviens') }}" class="btn btn-primary">View Employees</a>
    </div>
@endsection
