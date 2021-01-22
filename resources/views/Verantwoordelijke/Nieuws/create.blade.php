@extends('layouts.template')



@section('title', "Nieuw nieuwsitem")

@section('main')
    <h1>Nieuw nieuwsitem toevoegen</h1>
    <form action="/news/" method="post">
        @include('Verantwoordelijke.Nieuws.form')
    </form>
@endsection
