{{--TODO: Pagination--}}

@extends('layouts.template')


@section('main')
    <h1>Taken Beheren <a href="{!! url('/help#takenBeheren') !!}"><i class="fas fa-question-circle"></i></a></h1>
    @include('shared.alert')
    <form method="get" action="/tasks" id="searchForm">
        <div class="row">
            <div class="col-sm-6 mb-2">
                <input type="text" class="form-control" name="task" id="task"
                       value="" placeholder="Zoek op naam van de taak">
            </div>
            <div class="col-sm-2 mb-2">
                <button type="submit" class="btn btn-success btn-block">Search</button>
            </div>
        </div>
    </form>


    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
        </tr>
        </thead>

        <tbody>

        {{$tasks->links()}}
        @foreach($tasks as $task)

            <tr>
                <td>{{$task->name}}</td>
                <td data-id="{{$task->id}}"
                    data-name="{{$task->name}}">
                    <div class="btn-group btn-group-sm">
                        <a href="/tasks/{{$task->id}}/edit" class="btn btn-outline-dark btn-edit" data-toggle="tooltip" data-placement="top" title="edit {{$task->name}}">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a  href="#!" class="btn btn-outline-danger btn-delete" id="deleteTask" data-toggle="tooltip" data-placement="top" title="delete {{$task->name}}">
                            <i class="fas fa-trash"></i>
                        </a>
                    </div>
                </td>
            </tr>
        @endforeach
        <tr>
            <td class="text-center" colspan="5">Nieuwe taak toevoegen <a href="/tasks/create" class="btn btn-success btn-add" data-toggle="tooltip" data-placement="top" title="add a new task">
                    <i class="fas fa-plus-circle"></i>
                </a></td>
        </tr>
        </div>
        </tbody>
    </table>
    {{$tasks->links()}}


@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(4,2)}}
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
                    console.log(`delete task ${id}`);
                    // Show Noty
                    let modal = new Noty({
                        timeout: false,
                        layout: 'center',
                        modal: true,
                        type: 'warning',
                        text: `<p>Delete de taak <b>${name} </b>?</p>`,
                        buttons: [



                            Noty.button('Delete taak', 'btn btn-danger', function () {

                                // Delete record and close modal
                                let pars = {
                                    '_token': '{{ csrf_token() }}',
                                    '_method': 'delete'
                                };
                                $.post(`/tasks/${id}`, pars, 'json')
                                    .done(function (data) {
                                        console.log('data', data);
                                        // Show toast
                                        new Noty({
                                            type: data.type,
                                            text: data.text
                                        }).show();
                                        // After 2 seconds, redirect to the public master page
                                        setTimeout(function () {
                                            $(location).attr('href', '/tasks'); // jQuery
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
@show




