@extends('layouts.template')



@section('title', "Nieuwe artiest")

@section('main')
    <h1>Nieuwe artiest toevoegen</h1>
    <form action="/artists" method="post">
        @include('Verantwoordelijke.Artiesten.form')
    </form>
@endsection
