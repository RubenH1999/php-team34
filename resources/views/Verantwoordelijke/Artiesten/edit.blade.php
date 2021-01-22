@extends('layouts.template')



@section('title', "Edit taak: $artist->name")

@section('main')
    <h1>Update artiest</h1>
    <form action="/artists/{{$artist->id}}" method="post">
        @method('put')
        @include('Verantwoordelijke.Artiesten.form')
    </form>
@endsection
