{{--TODO: Klasse aanmaken voor info--}}
{{--TODO: mogelijkheid voor verantwoordelijke om info aan te passen--}}
@extends('layouts.template')

@section('main')
    @foreach ($info as $infos)
        <div>
        <h1>{{$infos->title}}</h1>
        <p>{{$infos->description}}</p>
        </div>

    @endforeach
    <div class="row justify-content-center">
        <img src="/storage/images/map.PNG" width="50%" height="50%">
    </div>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,3)}}
@endsection
