@extends('layouts.template')



@section('title', "Edit Ticket: $ticket->ticket_name")

@section('main')
    <h1>Update artiest</h1>
    <form action="/tickets/{{$ticket->id}}" method="post">
        @method('put')
        @include('Verantwoordelijke.Ticket.form')
    </form>
@endsection
