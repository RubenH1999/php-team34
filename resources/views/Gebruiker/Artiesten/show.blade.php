@extends('layouts.template')

@section('main')

    @include('shared.alert')


    <div class="container">
        <div class="row justify-content-center">
                <h1>{{$artist->name}}
                    @if($user != null)
                    <a  href="#!"  data-id="{{$performance->id}}" class="btn btn-success btn-add" id="addArtist" data-toggle="tooltip" data-placement="top" title="add {{$artist->name}} aan personal timetable">
                        <i class="fas fa-plus"></i>
                    </a>
                @endif</h1>

        </div>

    </div>
<div class="container">
    <div class="justify-content-center row">
        <div class="col-md-12 w100 text-center">

        <h4>Datum & uur</h4>
        <p>{{$performance->date}}</p>
        <p>{{$performance->start_time}} - {{$performance->end_time}}</p>
        </div>
        <div class="col-md-12 w100 text-center">
        <h4>Stage</h4>
        <p>{{$performance->stage->name}}</p>
    </div>
        <div class="col-md-12 w100 text-center">
        <h4>Omschrijving</h4>
        <p>{{$artist->description}}</p>
        </div>
    </div>

    <div class="row justify-content-center">
        <iframe src="https://open.spotify.com/embed/track/{{$artist->spotify}}" width="300" height="380" frameborder="0" allowtransparency="true" allow="encrypted-media"></iframe>
    </div>
</div>

@endsection
@section('script_after')
    <script>
        console.log(`test`);
        $(document).ready(
            $(function () {
                console.log(`test`);
                $('body').on('click', '.btn-add', function () {
                    let id = $(this).closest('a').data('id');
                    console.log(`add artist ${id}`);
                    let pars = {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'post'
                    };
                    $.post(`/add/${id}`, pars, 'json')
                        .done(function (data) {
                            console.log('data', data);
                            // Show toast
                            new Noty({
                                type: data.type,
                                text: data.text
                            }).show();
                            // After 2 seconds, redirect to the public master page
                            setTimeout(function () {
                                $(location).attr('href', `/line-up/{{$artist->id}}`); // jQuery
                                // window.location = '/employees'; // JavaScript
                            }, 2000);
                        })
                });
            })
        );
    </script>
@show
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,1)}}
@endsection
