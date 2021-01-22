@extends('layouts.template')

@section('main')

    <div class="row ">
        <div class="col-lg-6 mt-2">
            <a href="/artists">
            <div class="card text-white bg-secondary mb-3 ">

                <div class="card-body nav-pastel">

                    <h5 class="card-title "><i class="fas fa-users fa-2x mr-4"></i>Artiest beheren</h5>
                    <p class="card-text"></p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-lg-6 mt-2">
            <a href="/tasks">
                <div class="card text-white bg-secondary mb-3 ">

                    <div class="card-body nav-pastel">

                        <h5 class="card-title "><i class="fas fa-tasks fa-2x mr-4"></i>Taken beheren</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-2">
            <a href="/performances">
                <div class="card text-white bg-secondary mb-3 ">

                    <div class="card-body nav-pastel">

                        <h5 class="card-title "><i class="fas fa-list fa-2x mr-4"></i>Line-up beheren</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-2">
            <a href="/festivals">
                <div class="card text-white bg-secondary mb-3 ">

                    <div class="card-body nav-pastel">

                        <h5 class="card-title "><i class="fas fa-campground fa-2x mr-4"></i>Festivals beheren</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-2">
            <a href="/employees">
                <div class="card text-white bg-secondary mb-3 ">

                    <div class="card-body nav-pastel">

                        <h5 class="card-title "><i class="fas fa-user-cog fa-2x mr-4"></i>Medewerkers beheren</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-2">
            <a href="/Uurrooster">
                <div class="card text-white bg-secondary mb-3 ">

                    <div class="card-body nav-pastel">

                        <h5 class="card-title "><i class="fas fa-user-clock fa-2x mr-4"></i>Uurrooster beheren</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-2">
            <a href="/tickets">
                <div class="card text-white bg-secondary mb-3 ">

                    <div class="card-body nav-pastel">

                        <h5 class="card-title "><i class="fas fa-ticket-alt fa-2x mr-4"></i>Tickets beheren</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-lg-6 mt-2">
            <a href="/news">
                <div class="card text-white bg-secondary mb-3 ">

                    <div class="card-body nav-pastel">

                        <h5 class="card-title "><i class="fas fa-newspaper fa-2x mr-4"> </i>Nieuws beheren</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        </div>
    </div>

@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(3,2)}}
@endsection
