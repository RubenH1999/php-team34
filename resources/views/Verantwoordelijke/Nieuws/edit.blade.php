@extends('layouts.template')



@section('title', "Edit taak: $newsitems->title")

@section('main')
    <h1>Update artiest</h1>
    <form action="/news/{{$newsitems->id}}" method="post">
        @method('put')
        @include('Verantwoordelijke.Nieuws.form')
    </form>
@endsection
