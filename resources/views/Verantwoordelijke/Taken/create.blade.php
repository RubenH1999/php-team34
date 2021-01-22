@extends('layouts.template')



@section('title', "Nieuwe taak")

@section('main')
    <h1>Nieuwe taak toevoegen</h1>
    <form action="/tasks" method="post">
        @include('Verantwoordelijke.Taken.form')
    </form>
@endsection
