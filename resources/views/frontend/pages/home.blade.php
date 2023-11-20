@extends('frontend.layouts.main')

@section('container')
 @auth
    <h1>Hello, Welcome {{auth()->user()->name }}</h1>
 @else
    <h1>Hello, Welcome in Page Home</h1>
 @endauth
@endsection