@extends('layouts.template')



@section('title', "Nieuw Ticket")

@section('main')
    <h1>Nieuw nieuwsitem toevoegen</h1>
    <form action="/tickets/" method="post">
        @include('Verantwoordelijke.Ticket.form')
    </form>
@endsection
