
@extends('layouts.template')


@section('main')
    <h1>Artiesten Beheren <a href="{!! url('/help#artiestenBeheren') !!}"><i class="fas fa-question-circle"></i></a></h1>
    @include('shared.alert')

    <form method="get" action="/artists" id="searchForm">
        <div class="row">
            <div class="col-sm-6 mb-2">
                <input type="text" class="form-control" name="artist" id="artist"
                       value="" placeholder="Zoek op naam artiest">
            </div>
            <div class="col-sm-2 mb-2">
                <button type="submit" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
    </form>


    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Artiesten</th>
            <th scope="col">Genre</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        {{$artists->links()}}
        @foreach($artists as $artist)

            <tr>

                <td>
                        {{$artist->name}}
                    </td>
                <td>{{$artist->genre}}</td>
                <td data-id="{{$artist->id}}"
                    data-name="{{$artist->name}}">
                    <div class="btn-group btn-group-sm">
                        <a href="/artists/{{$artist->id}}/edit" class="btn btn-outline-dark btn-edit" data-toggle="tooltip" data-placement="top" title="edit {{$artist->name}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a  href="#!" class="btn btn-outline-danger btn-delete" id="deleteArtist" data-toggle="tooltip" data-placement="top" title="delete {{$artist->name}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        <tr>
            <td class="text-center" colspan="5">Nieuwe artiest toevoegen <a href="/artists/create" class="btn btn-success btn-add" data-toggle="tooltip" data-placement="top" title="add a new task">
                    <i class="fas fa-plus-circle"></i>
                </a></td>
        </tr>

        </tbody>
    </table>
    {{$artists->links()}}


@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,1)}}
@endsection
@section('script_after')
    <script>
        console.log(`test`);
        $(document).ready(
            $(function () {
                console.log(`test`);



                $('tbody').on('click', '.btn-delete', function () {
                    let id = $(this).closest('td').data('id');
                    let name = $(this).closest('td').data('name');
                    console.log(`delete artist ${id}`);
                    // Show Noty
                    let modal = new Noty({
                        timeout: false,
                        layout: 'center',
                        modal: true,
                        type: 'warning',
                        {{-- toont niet de correcte naam, toont de naam van de laatste artiest --}}
                        text: `<p>Delete de artiest <b>${name} </b>?</p>`,
                        buttons: [
                            Noty.button('Delete artiest', 'btn btn-danger', function () {
                                // Delete record and close modal
                                let pars = {
                                    '_token': '{{ csrf_token() }}',
                                    '_method': 'delete'
                                };
                                $.post(`/artists/${id}`, pars, 'json')
                                    .done(function (data) {
                                        console.log('data', data);
                                        // Show toast
                                        new Noty({
                                            type: data.type,
                                            text: data.text
                                        }).show();
                                        // After 2 seconds, redirect to the public master page
                                        setTimeout(function () {
                                            $(location).attr('href', '/artists'); // jQuery
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





