@extends('layouts.template')



@section('title', "Nieuw Festival")

@section('main')
    <h1>Nieuw nieuwsitem toevoegen</h1>
    <form action="/festivals/" method="post">
        @include('Verantwoordelijke.Festival.form')
    </form>
@endsection
