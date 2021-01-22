{{--TODO: Start datum/uur aanpassen aan nieuwe databank--}}
@section('title', 'Create new record')
@extends('layouts.template')

@section('main')
    @include('shared.alert')
    <h1>Performance van {{$performance->artist->name}} aanpassen</h1>
    <form action="/performances/{{$performance->id}}" method="post">
        @method('put')
        @include('Line-up_beheren.form')

    </form>
@endsection

@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(1,4)}}
@endsection
