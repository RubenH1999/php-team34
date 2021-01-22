@extends('layouts.template')


@section('main')
    <div class="container">

    <h1>Edit shift</h1>
        <form action="/Uurrooster/{{ $medewerkershift->id }}" method="post">
        @method('put')
@include('Verantwoordelijke.Uurrooster.form')
        </form>
        </div>

@endsection

@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(3,4)}}
@endsection
