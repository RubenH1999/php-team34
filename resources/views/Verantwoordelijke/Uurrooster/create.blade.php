@extends('layouts.template')





@section('main')
    <div class="container">
    <h1>Nieuwe shift toevoegen</h1>
    <form action="/Uurrooster" method="post">
        @include('Verantwoordelijke.Uurrooster.form')
    </form>
    </div>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(3,4)}}
@endsection
