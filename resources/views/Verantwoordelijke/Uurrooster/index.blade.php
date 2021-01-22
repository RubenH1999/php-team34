@extends('layouts.template')

@section('main')
    <h1>Uuurrooster beheren</h1>

    <form method="get" action="/Uurrooster" id="searchForm">
        <div class="row">
            <div class="col-sm-4 col-6 mb-2">
                <select class="form-control" name="datum" id="datum">
                    <option value="%">All dates</option>
                    @foreach($datums as $date)
                        <option value="{{ $date->date }}"
                            {{ (request()->datum ==  $date->date ? 'selected' : '') }}>{{$date->date}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2 mb-2">
                <button type="submit" class="btn btn-success btn-block">Search</button>
            </div>
            <div class="col-3 text-right">
                <a href="/Uurrooster/create" class="btn btn-info"><i class="far fa-plus-square"></i>   Nieuwe shift aanmaken</a>
            </div>

        </div>

    </form>


    @include('shared.alert')
    <section>
        <div class="row">
            <div class="col">
                <H2>Rooster van {{request()->datum}}</H2>
            </div>
        </div>
        <table class="table table-striped table-light">
            <thead>
            <tr class="d-flex">
                <th class="col-2" scope="col">Tijdstip</th>
                @foreach ($tasks as $task)
                    <th class="col-2" scope="col">{{$task->name}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>

            @for ($i = 14; $i < 25; $i++)
                @php $colCounter = 1; $maxCols = count($tasks);@endphp

                <tr class="d-flex">

                    <th class="col-2" scope="row">{{$i}}:00</th>

                    @foreach ($tasks as $task)
                        @foreach ($medewerkershifts as $medewerkershift)

                            @php
                                $extraname = '';
                                $dubbeleshift = false;
                                $oudeshift = false;


                                foreach ($medewerkershifts as $medewerkershift2)
                                {
                                if($medewerkershift->shift->task_id == $medewerkershift2->shift->task_id && $medewerkershift->id != $medewerkershift2->id)
                                {
                                if ($medewerkershift->shift->end_time <= $medewerkershift2->shift->start_time)
                                            {
                                                $oudeshift = true;
                                            }

                                }


                                    if($medewerkershift->shift_id == $medewerkershift2->shift_id && $medewerkershift->id != $medewerkershift2->id)
                                        {


                                            $extraname = "& \n" . $medewerkershift2->user->first_name . " " . $medewerkershift2->user->last_name;
                                            if ($medewerkershift->id > $medewerkershift2->id)
                                            {
                                            $dubbeleshift = true;
                                            }

                                        }
                                }

                               $colors = array(1 =>'bg-success', 2 =>'bg-primary', 3 =>'bg-secondary' , 4 =>'bg-info', 5 => 'bg-danger');
                            @endphp
                            @if ($task->id == $medewerkershift->shift->task_id && $dubbeleshift == false)
                                @if ($medewerkershift->shift->start_time <= $i && $medewerkershift->shift->end_time >= $i )
                                    <td class="col-2 " data-name="{{$task->name}}" data-locatie="{{$medewerkershift->shift->location}}" data-reden="{{$medewerkershift->reason_absence}}"
                                        data-departement="{{$medewerkershift->shift->department}}" data-employees="{{$medewerkershift->shift->number_of_employees}}" data-absent="{{$medewerkershift->shift->is_absent ? "ja" : "nee"}}"
                                        data-remark="{{$medewerkershift->shift->remark}}" data-names="{{$medewerkershift->user->first_name . " " . $medewerkershift->user->last_name . " " . $extraname}}" >

                                        <a class="text-decoration-none text-white info-meer" href="#!">
                                            <div class="{{$colors[$medewerkershift->shift->task_id]}} rounded" data-toggle="tooltip" data-placement="top" title="Klik voor meer informatie">
                                                <p class="text-center"><span class="font-weight-bold">Datum </span> {{ date('j F, Y', strtotime($medewerkershift->shift->date)) }}</p>
                                                <p class="text-center"><span class="font-weight-bold">Medewerkers: </span> {{$medewerkershift->user->first_name . " " . $medewerkershift->user->last_name . " " . $extraname}}</p>
                                                <p class="text-center"><span class="font-weight-bold">Afwezig: </span> {{$medewerkershift->is_absent ? "ja" : "nee"}}</p>
                                            </div>
                                        </a>

                                        <form action="/Uurrooster/{{$medewerkershift->id}}" method="post" class="deleteForm">
                                            @csrf
                                            @method('delete')

                                            <div class="btn-group btn-group-sm text-right">
                                                <a href="/Uurrooster/{{$medewerkershift->id}}/edit" class="btn  btn-info "
                                                   data-toggle="tooltip"
                                                   title="Edit {{$medewerkershift->shift->task->name}}"><i class="fas fa-edit"></i></a>

                                                <button type="button" class="btn btn-danger btn-delete"
                                                        data-toggle="tooltip"
                                                        data-id="{{$medewerkershift->id}}"
                                                        title="Delete {{$medewerkershift->shift->task->name}}">
                                                    <i class="fas fa-trash-alt"></i>
                                                </button>
                                            </div>

                                        </form>

                                    </td>
                                    @break
                                @elseif($oudeshift == false)
                                    <td class="col-2">
                                        <p class="h5 text-center font-weight-bold">Geen {{$task->name }}</p>
                                    </td>
                                @endif
                            @endif



                        @endforeach
                    @endforeach


                </tr>
            @endfor
            </tbody>
        </table>

        @include('Verantwoordelijke/Uurrooster.modal')
    </section>





@endsection
@section('script_after')
    <script>
        $(function () {

            $('tbody').on('click', '.info-meer', function () {
                console.log('hahaha');
                let locatie = $(this).closest('td').data('locatie');
                let name = $(this).closest('td').data('name');
                let employees = $(this).closest('td').data('employees');
                let absent = $(this).closest('td').data('absent');
                let remark = $(this).closest('td').data('remark');
                let names = $(this).closest('td').data('names');
                let department = $(this).closest('td').data('departement');
                let reden = $(this).closest('td').data('reden');

                // Update the modal
                $('.modal-title').text(`De shift: ${name}`);
                $('#naam').text(`Naam: ${names}`);
                $('#locatie').text(`Locatie: ${locatie}`);
                $('#opmerking').text(`Opmerking: ${remark}`);
                $('#antal').text(`Aantal: ${employees}`);
                $('#afwezig').text(`Afwezig: ${absent}`);
                $('#departement').text(`Departement: ${department}`);
                $('#reden').text(`reden: ${reden}`);

                $('#modal-uurrooster').modal('show');
            });

            $('#modal-uurrooster form').submit(function (e) {
                $('#modal-uurrooster').modal('close');
            });
            $('tbody').on('click', '.btn-delete', function () {
                let id = '{{ $medewerkershift->id }}';
                let del = $(this).closest('form');
                let modal = new Noty({
                    timeout: false,
                    layout: 'center',
                    modal: true,
                    type: 'warning',
                    text: '<p>Delete de shift {{$medewerkershift->shift->task->name}}?</p>',
                    buttons: [
                        Noty.button('Delete shift', 'btn btn-danger', function () {
                            // Delete record and close modal
                            del.submit();
                            modal.close();}),
                        Noty.button('Cancel', 'btn btn-secondary ml-2', function () {
                            modal.close();
                        })
                    ]
                }).show();});

            $('#datum').change(function () {
                $('#searchForm').submit();
            });

        });

    </script>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(3,1)}}
@endsection
