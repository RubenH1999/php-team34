@extends('layouts.template')

@section('main')
    <div class="row">
        @include('shared.alert')
        @foreach($tickets as $ticket)

            <div class="card text-center col-lg-3 tickets col-sm-12" style="width: 20rem;">
                <div class="card-body">
                    <h4 class="card-title">{{$ticket->ticket_name}}</h4>
                    <h4 class="card-title">€{{$ticket->price}}</h4>


                    <a  href="/ticket_kopen/add/{{ $ticket->id }}"  class="btn btn-success">Toevoegen</a>
                </div>
            </div>
        @endforeach

        <div class="col-12 text-right" >
            @if( Cart::getTotalQty() == 0)
                <div class="alert alert-primary">
                    Je hebt nog geen ticket geselecteerd!
                </div>
            @else
                <a  href="/ticket_kopen/create"  class="btn-success btn mr-5">Betalen</a>    @endif

        </div>
    </div>


@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(3,2)}}
@endsection


