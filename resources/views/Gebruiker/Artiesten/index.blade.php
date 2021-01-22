{{--TODO: Performances van enkel dit festival--}}
@extends('layouts.template')

@section('main')
    <h1>Line-up</h1>
    <div class="row">
        @foreach($artists as $artist)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-3 ">
            <div class="card shadow-lg" data-id="{{$artist->artist_id}}">
                <img src="{{$artist->artist->img}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title artist">{{$artist->artist->name}}</h5>
                    <p>{{$artist->artist->description}}</p>
                    <a href="/line-up/{{$artist->artist_id}}">meer info</a>

                </div>
            </div>
        </div>
            @endforeach
    </div>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,1)}}
@endsection
