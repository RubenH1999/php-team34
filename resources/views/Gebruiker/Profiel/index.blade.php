@extends('layouts.template')

@section('title','Profiel bekijken')
@section('main')
    @include('shared.alert')
    <div class="container emp-profile border border-secondary">
        <form method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                        <i class="fas fa-campground fa-5x " id="logonav"></i>
                        <h3>Festival 2020</h3>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="profile-head">
                        <h5>
                           {{auth()->user()->first_name . " " . auth()->user()->last_name}}
                        </h5>
                        <h6>
                           {{ucfirst(auth()->user()->type->name)}}
                        </h6>
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active text-secondary" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-secondary" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tickets</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-2">
                    <a href="/profiel/{{auth()->user()->id}}/edit" class="btn profile-edit-btn">Edit profile</a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="profile-work">
                        <p>Useful links</p>
                        <a href="shifts">Uurrooster</a><br/>
                        <a href="tickets">Tickets</a><br/>
                        <a href="festival">Festival</a><br/>
                        <a href="news">Nieuws</a><br/>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="tab-content profile-tab" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Type</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{ucfirst(auth()->user()->type->name)}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Name</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{auth()->user()->first_name . " " . auth()->user()->last_name}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Email</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{auth()->user()->email}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Phone</label>
                                </div>
                                <div class="col-md-6">
                                    <p>{{auth()->user()->phonenumber}}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Addres</label>
                                </div>
                                <div class="col-md-3">
                                    <p>{{auth()->user()->adress}} ,</p>
                                </div>
                                <div class="col-md-3">
                                    <p>{{auth()->user()->city}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                            @php

                            $oldticket = "";
                            @endphp

                            @foreach($soldTickets as $soldTicket)



                                @if($oldticket == "" || $oldticket->ticket_id != $soldTicket->ticket_id)
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Festival</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$soldTicket->ticket->festival->name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Ticket type</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>{{$soldTicket->ticket->ticket_name}}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Price</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p>€ {{$soldTicket->ticket->price}} @php
                                                    foreach ($ticketAmount as $ticket){if($ticket["ticket_id"] == $soldTicket->ticket_id){echo $ticket["amount"];}}





                                                        @endphp</p>
                                        </div>
                                    </div>
                                    <hr>

                                    @php

                                        $oldticket = $soldTicket;

                                    @endphp
                                @endif

                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(1,3)}}
@endsection