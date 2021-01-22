@extends('layouts.template')

@section('main')
    <h1>Line-up beheren <a href="{!! url('/help#lineUpBeheren') !!}"><i class="fas fa-question-circle"></i></a></h1>
    <form method="get" action="/performances" id="searchForm">
        <div class="row">
            <div class="col-sm-6 mb-2">
                <input type="text" class="form-control" name="artist" id="artist"
                       value="{{old('artist')}}" placeholder="Filter Artist">
            </div>
            <div class="col-sm-4 mb-2">
                <select class="form-control" name="stage_id" id="stage_id">
                    <option value="%">All stages</option>
                    @foreach($stages as $stage)
                        <option value="{{ $stage->id }}"
                                {{ (request()->stage_id ==  $stage->id ? 'selected' : '') }}>{{ $stage->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2 mb-2">
                <button type="submit" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
    </form>
    @include('shared.alert')
    @if ($performances->count() == 0)
        <div class="alert alert-danger alert-dismissible fade show">
            Can't find any artist
            @foreach($artists as $artist)
                @if(request()->artist == $artist->id) with name <b> {{$artist->name}} </b>@endif
            @endforeach

            @foreach($stages as $stage)
                @if(request()->stage_id == $stage->id) with stage <b> {{$stage->name}} </b>@endif
            @endforeach
            <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif


    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Time</th>
            <th scope="col">Artist</th>
            <th scope="col">Stage</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($performances as $performance)

            <tr>
            <th scope="row">{{$performance->start_time . " - " .  $performance->end_time}}</th>
            <td>{{$performance->artist->name}}</td>
            <td>{{$performance->stage->name}}</td>
                <td data-id="{{$performance->id}}"
                    data-name="{{$performance->artist->name}}"
                    data-stage="{{$performance->stage->name}}">
                    <div class="btn-group btn-group-sm">
                        <a href="/performances/{{$performance->id}}/edit" class="btn btn-outline-dark btn-edit" data-toggle="tooltip" data-placement="top" title="edit {{$performance->artist->name}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="#!" class="btn btn-outline-danger btn-delete" data-toggle="tooltip"  data-placement="top" title="delete {{$performance->artist->name}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
        </tr>
        @endforeach
        <tr>
            <td class="text-center" colspan="3">Nieuwe artiest toevoegen <a href="/performances/create" class="btn btn-success btn-add" data-toggle="tooltip" data-placement="top" title="add a new artist">
                    <i class="fas fa-plus-circle"></i>
                </a></td>
        </tr>
        </tbody>
    </table>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(1,4)}}
@endsection
@section('script_after')
    <script>
        console.log(`test`);
        $(document).ready(
            $(function () {
                console.log(`test`);


                // Delete this user
                //need to add -> check for admin rights (verantwoordelijke)
                $('tbody').on('click', '.btn-delete', function () {
                    let id = $(this).closest('td').data('id');
                    let name = $(this).closest('td').data('name');
                    let stage = $(this).closest('td').data('stage');
                    console.log(`delete performance ${id}`);
                    // Show Noty
                    let modal = new Noty({
                        timeout: false,
                        layout: 'center',
                        modal: true,
                        type: 'warning',
                        text: `<p>Delete de performance met artiest <b>${name} en stage ${stage}</b>?</p>`,
                        buttons: [
                            Noty.button('Delete performance', 'btn btn-danger', function () {
                                // Delete record and close modal
                                let pars = {
                                    '_token': '{{ csrf_token() }}',
                                    '_method': 'delete'
                                };
                                $.post(`/performances/${id}`, pars, 'json')
                                    .done(function (data) {
                                        console.log('data', data);
                                        // Show toast
                                        new Noty({
                                            type: data.type,
                                            text: data.text
                                        }).show();
                                        // After 2 seconds, redirect to the public master page
                                        setTimeout(function () {
                                            $(location).attr('href', '/performances'); // jQuery
                                            // window.location = '/employees'; // JavaScript
                                        }, 2000);
                                    })
                                    .fail(function (e) {
                                        console.log('error', e);
                                    });
                                modal.close();
                            }),
                            Noty.button('Cancel', 'btn btn-secondary ml-2', function () {
                                modal.close();
                            })
                        ]
                    }).show();
                });
            })


        );

    </script>

@show
