@extends('layouts.template')

@section('title', "Medewerker$user->first_name $user->last_name")

@section('main')
    <h1>Update medewerker</h1>
    <form action="/employees/{{$user->id}}" method="post">
        @method('put')
        @include('medewerker-beheren.form')
    </form>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(1,2)}}
@endsection