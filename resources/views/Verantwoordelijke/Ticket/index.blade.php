@extends('layouts.template')

@section('main')
    <h1>Tickets beheren <a href="{!! url('/help#ticketsBeheren') !!}"><i class="fas fa-question-circle"></i></a></h1>
    <div class="container row">

        <table class="table">
            <tr>
                <th>Ticketnaam</th>
                <th>Ticketprijs</th>
                <th>Aantal verkocht</th>
                <th>Max aantal</th>
            </tr>
            @foreach($ticket as $ticket)
            <tr>
                <td><a href="/tickets/{{$ticket->id}}">{{$ticket->ticket_name}}</a></td>
                <td>{{$ticket->price}}</td>
                <td >
                    @foreach($soldticket as $item)
                        @if($item->ticket_id == $ticket->id)
                        {{$item->total}}

                    @endif
                    @endforeach
                </td>
                <td>{{$ticket->max_available}}</td>

                <td data-id="{{$ticket->id}}"
                    data-name="{{$ticket->name}}"><div class="btn-group btn-group-sm" data-id="{{$ticket->id}}">
                        <a href="/tickets/{{$ticket->id}}/edit" class="btn btn-outline-dark btn-edit" data-toggle="tooltip" data-placement="top" title="edit {{$ticket->ticket_name}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a  href="#!" class="btn btn-outline-danger btn-delete" id="deleteTicket" data-toggle="tooltip" data-placement="top" title="delete {{$ticket->ticket_name}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div></td>
            </tr>
            @endforeach
        </table>

        <tr>
            <td class="text-center" colspan="5">Nieuw Ticket toevoegen <a href="/tickets/create" class="btn btn-success btn-add" data-toggle="tooltip" data-placement="top" title="add a new newsitem">
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
                    console.log(`delete ticket ${id}`);
                    // Show Noty
                    let modal = new Noty({
                        timeout: false,
                        layout: 'center',
                        modal: true,
                        type: 'warning',
                        text: `<p>Delete het Ticket <b>${name} </b>?</p>`,

                        buttons: [
                            Noty.button('Delete tickets', 'btn btn-danger', function () {
                                // Delete record and close modal
                                let pars = {
                                    '_token': '{{ csrf_token() }}',
                                    '_method': 'delete'
                                };
                                $.post(`/tickets/${id}`, pars, 'json')
                                    .done(function (data) {
                                        console.log('data', data);
                                        // Show toast
                                        new Noty({
                                            type: data.type,
                                            text: data.text
                                        }).show();
                                        // After 2 seconds, redirect to the public master page
                                        setTimeout(function () {
                                            $(location).attr('href', '/tickets'); // jQuery
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
