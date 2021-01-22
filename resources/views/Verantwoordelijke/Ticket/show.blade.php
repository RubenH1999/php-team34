@extends('layouts.template')

@section('main')
    <h1>Kopers {{$ticketnaam->first()->ticket_name}} <a href="{!! url('/help#ticketsBeheren') !!}"><i class="fas fa-question-circle"></i></a></h1>
    <div class="container row">

        <table class="table">
            <tr>
                <th>Voornaam</th>
                <th>Achtenaam</th>
                <th>Email adres</th>
                <th>Telefoonnummer</th>
                <th>Adres</th>
            </tr>
            @foreach($person as $person)
                <tr>
                    <td>{{$person->first_name}}</td>
                    <td>{{$person->last_name}}</td>
                    <td>{{$person->email}}</td>
                    <td>{{$person->phonenumber}}</td>
                    <td>{{$person->adress}}</td>

                </tr>
            @endforeach
        </table>


    </div>

@endsection

@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(2,3)}}
@endsection
