@section('title', 'Create new record')
@extends('layouts.template')
@section('main')
    @include('shared.alert')
    <h1>Create new performance</h1>
    <form action="/performances" method="post">
        @include('Line-up_beheren.form')

    </form>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(1,4)}}
@endsection
@show
