@extends('layouts.template')

@section('main')

    <div class="row">

<div class="col-4 ">
    <h1>{{$festival->name}}</h1>
    <h4>{{ date('j F', strtotime($festival->start_date)) }} - {{ date('j F', strtotime($festival->end_date)) }}</h4>
</div>
<div class="col-8 float-right">
        @foreach($news as $newsItem)

            <div class="card mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="storage/upload/{{$newsItem->foto}}" class="card-img" alt="foto">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">{{$newsItem->title}}</h5>
                            <p class="card-text">{{$newsItem->description}}</p>


                    </div>
                </div>
            </div>
            </div>
        @endforeach
</div>
    </div>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(3,4)}}
@endsection
