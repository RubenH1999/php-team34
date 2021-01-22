@extends('layouts.template')

@section('main')
    <h1>Festivals beheren <a href="{!! url('/help#festivalsBeheren') !!}"><i class="fas fa-question-circle"></i></a></h1>
    <table class="container row">
        <table class="table">
            <tr>
            <th>Festivalnaam</th>
            <th>begindatum</th>
            <th>einddatum</th>
                <th>status</th>
            </tr>
            @foreach($festival as $festival)
                <tr>
                <td>{{$festival->name}}</td>
                <td>{{date('d-M-Y', strtotime($festival->start_date))}}</td>
                <td>{{date('d-M-Y', strtotime($festival->end_date))}}</td>
                    @if($festival->end_date < Carbon\Carbon::now())
                        <td class="p-3 mb-2 bg-danger text-white">voorbij</td>
                        @elseif($festival->start_date < Carbon\Carbon::now())
                            <td class="p-3 mb-2 bg-warning text-dark">bezig</td>

                        @else
                        <td class="p-3 mb-2 bg-success text-white">gepland</td>
                    @endif
                    <td data-id="{{$festival->id}}"
                        data-name="{{$festival->name}}">

                    <div class="btn-group btn-group-sm" data-id="{{$festival->id}}">
                        <a href="/festivals/{{$festival->id}}/edit" class="btn btn-outline-dark btn-edit" data-toggle="tooltip" data-placement="top" title="edit {{$festival->name}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a  href="#!" class="btn btn-outline-danger btn-delete" id="deleteFestival" data-toggle="tooltip" data-placement="top" title="delete {{$festival->name}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>

                    </td>

                </tr>
            @endforeach

        </table>
        <tr>
            <td class="text-center" colspan="5">Nieuw Festival toevoegen <a href="/festivals/create" class="btn btn-success btn-add" data-toggle="tooltip" data-placement="top" title="add a new festival">
                    <i class="fas fa-plus-circle"></i>
                </a></td>
        </tr>
    </div>

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
                            console.log(`delete festival ${id}`);
                            // Show Noty
                            let modal = new Noty({
                                timeout: false,
                                layout: 'center',
                                modal: true,
                                type: 'warning',
                                text: `<p>Delete het festival <b>${name} </b>?</p>`,

                                buttons: [
                                    Noty.button('Delete festival', 'btn btn-danger', function () {
                                        // Delete record and close modal
                                        let pars = {
                                            '_token': '{{ csrf_token() }}',
                                            '_method': 'delete'
                                        };
                                        $.post(`/festivals/${id}`, pars, 'json')
                                            .done(function (data) {
                                                console.log('data', data);
                                                // Show toast
                                                new Noty({
                                                    type: data.type,
                                                    text: data.text
                                                }).show();
                                                // After 2 seconds, redirect to the public master page
                                                setTimeout(function () {
                                                    $(location).attr('href', '/festivals'); // jQuery
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

@endsection

@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(2,3)}}
@endsection
