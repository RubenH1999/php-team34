@extends('layouts.template')

@section('main')

    <div class="row">
        <div class="col-sm-12 col-lg-6">

            <div class="row">
                <div class="col-12">
                    <div id="carouselExampleIndicators" class="carousel slide bg-dark" data-ride="carousel">
                        <ol class="carousel-indicators">

                            @foreach($artists as $artist)
                                @if ($artist->id == 1)
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$artist->id}}" class="active"></li>

                                @else
                                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$artist->id}}"></li>
                                @endif

                            @endforeach

                        </ol>
                        <div class="carousel-inner">
                            @foreach($artists as $artist)
                                <div class="carousel-item {{$artist->id == 1 ? "active" : ""}}">
                                    <a href="/line-up/{{$artist->id}}">
                                        <img src="{{$artist->img}}" class="d-block w-auto h-auto mx-auto" style="max-height: 300px" alt="{{$artist->name}}">

                                        <div class="carousel-caption d-none d-md-block">
                                            <h5>{{$artist->name}}</h5>
                                            <p>{{$artist->description}}</p>
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-12">


                        <h1>{{$festival->name}}</h1>
                        <p>{{$festival->description}}</p>
                        <p>Van {{date('Y-M-d', strtotime($festival->start_date))}} tot {{date('Y-M-d', strtotime($festival->end_date))}}</p>
                        <p>{{$festival->map}}</p>

                </div>
            </div>


        </div>

        <div class="col-sm-12 col-lg-6">
            <div class="row justify-content-center">
                <h3>Nieuws</h3>
            </div>



            @foreach($news as $newsItem)
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card w-100">
                            <img src="storage/upload/{{$newsItem->foto}}" alt="" class="card-img-top">

                            <div class="card-body">
                                <h5 class="card-title">{{$newsItem->title}}</h5>
                                <p class="card-text">{{$newsItem->description}}</p>
                            </div>
                        </div>
                    </div>

                </div>
                <br>
            @endforeach
        </div>
    </div>







{{--    <div class="row">--}}

{{--        <div class="col-4 ">--}}
{{--            <h1>{{$festival->name}}</h1>--}}
{{--            <h4>{{ date('j F', strtotime($festival->start_date)) }} - {{ date('j F', strtotime($festival->end_date)) }}</h4>--}}
{{--        </div>--}}
{{--        <div class="col-8 float-right">--}}
{{--            @foreach($news as $newsItem)--}}

{{--                <div class="card mb-3" style="max-width: 540px;">--}}
{{--                    <div class="row no-gutters">--}}
{{--                        <div class="col-md-4">--}}
{{--                            <img src="storage/upload/{{$newsItem->foto}}" class="card-img" alt="foto">--}}
{{--                        </div>--}}
{{--                        <div class="col-md-8">--}}
{{--                            <div class="card-body">--}}
{{--                                <h5 class="card-title">{{$newsItem->title}}</h5>--}}
{{--                                <p class="card-text">{{$newsItem->description}}</p>--}}


{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,2)}}
@endsection
