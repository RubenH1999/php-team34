@extends('layouts.template')

@section('main')
    <h1 >Medewerkers beheren <a href="{!! url('/help#medewerkersBeheren') !!}"><i class="fas fa-question-circle"></i></a></h1>
    <form method="get" action="/employees" id="searchForm">
        <div class="row">
            <div class="col-sm-10 mb-2">
                <input type="text" class="form-control" name="naam" id="naam"
                       value="{{ request()->naam }}"
                       placeholder="Filter Naam Of Email">
            </div>
            <div class="col-sm-2 mb-2">
                <button type="submit" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
    </form>

    @include('shared.alert')
    @if ($users->count() == 0)
        <div class="alert alert-danger alert-dismissible fade show">
            Can't find any user named <b> {{request()->naam}} </b>
                     <button type="button" class="close" data-dismiss="alert">
                <span>&times;</span>
            </button>
        </div>
    @endif

    {{$users->links()}}
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Naam</th>
            <th scope="col">Email</th>
            <th scope="col">Telefoon nummer</th>
            <th scope="col">Adres</th>
            <th scope="col">Acties</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)

            <tr>
            <td>{{$user->first_name . " " . $user->last_name}}</td>
            <td>{{$user->email}}</td>
                <td>{{$user->phonenumber}}</td>
                <td>{{$user->adress}}, {{$user->city}}</td>
                <td data-id="{{$user->id}}"
                    data-name="{{$user->first_name . ' ' . $user->last_name}}">
                    <div class="btn-group btn-group-sm">
                        <a href="/employees/{{$user->id}}/edit" class="btn btn-outline-dark btn-edit" data-toggle="tooltip" data-placement="top" title="Edit {{$user->first_name . ' ' . $user->last_name}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a  href="#!" class="btn btn-outline-danger btn-delete" id="deleteUser" data-toggle="tooltip" data-placement="top" title="Delete {{$user->first_name . ' ' . $user->last_name}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
        </tr>
        @endforeach
        <tr>
            <td class="text-center" colspan="5">Nieuwe medewerker toevoegen <a href="/employees/create" class="btn btn-success btn-add" data-toggle="tooltip" data-placement="top" title="add a new employee">
                    <i class="fas fa-plus-circle"></i>
                </a></td>
        </tr>
        </tbody>
    </table>
    {{$users->links()}}



@endsection

@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(1,2)}}
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
                    console.log(`delete user ${id}`);
                    // Show Noty
                    let modal = new Noty({
                        timeout: false,
                        layout: 'center',
                        modal: true,
                        type: 'warning',
                        text: `<p>Delete de medewerker <b>${name} </b>?</p>`,

                        buttons: [
                            Noty.button('Delete Medewerker', 'btn btn-danger', function () {
                                // Delete record and close modal
                                let pars = {
                                    '_token': '{{ csrf_token() }}',
                                    '_method': 'delete'
                                };
                                $.post(`/employees/${id}`, pars, 'json')
                                    .done(function (data) {
                                        console.log('data', data);
                                        // Show toast
                                        new Noty({
                                            type: data.type,
                                            text: data.text
                                        }).show();
                                        // After 2 seconds, redirect to the public master page
                                        setTimeout(function () {
                                            $(location).attr('href', '/employees'); // jQuery
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

