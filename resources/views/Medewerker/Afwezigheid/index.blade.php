{{-- Select list waar in alle shiften met het correcte UserID wordt opgevraagd wanneer deze gesubmit wordt wordt aan de hand van de id afwezigheid op 1 gezet en de reden meegegeven--}}

@extends('layouts.template')


@section('main')
    <h1>Afwezigheid melden</h1>
    @include('shared.alert')

    {{--Hier eerst select box met mogelijke datums die daarna dan in de form gebruiken--}}



    <form action="/shifts-employees/update" method="post">
    @method("put")
        @include('Medewerker.Afwezigheid.form')
    </form>




@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,1)}}
@endsection






