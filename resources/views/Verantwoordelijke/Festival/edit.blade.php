@extends('layouts.template')



@section('title', "Edit festival: $festival->title")

@section('main')
    <h1>Update festival</h1>
    <form action="/festivals/{{$festival->id}}" method="post">
        @method('put')
        @include('Verantwoordelijke.Festival.form')
    </form>
@endsection
