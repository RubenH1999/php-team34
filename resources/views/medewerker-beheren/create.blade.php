@extends('layouts.template')


@section('title', "Medewerker")

@section('main')
    <h1>Nieuwe medewerker toevoegen</h1>
    <form action="/employees" method="post">
        @include('medewerker-beheren.form')
    </form>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(1,2)}}
@endsection
