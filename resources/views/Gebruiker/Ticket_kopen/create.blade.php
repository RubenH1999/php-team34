@extends('layouts.template')
@section('main')

    <h1>Vul nog even deze gegevens in.</h1>
    <form action="/ticket_kopen" method="post">
        @include('Gebruiker.Ticket_kopen.form')
    </form>




    @endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(3,1)}}
@endsection
