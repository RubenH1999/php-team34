@extends('layouts.template')

@section('main')

    <h1>Uuurrooster bekijken <a href="{!! url('/help#uurroosterBekijken') !!}"><i class="fas fa-question-circle"></i></a></h1>

    <form method="get" action="/shifts" id="searchForm">
        <div class="row">
            <div class="col-sm-4 mb-2">
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
        </div>
    </form>
    @include('shared.alert')
    <section>
        <div class="row">
            <div class="col">
                <H2>Rooster van {{request()->datum}}</H2>
            </div>
        </div>
        <table class="table table-striped">
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

                    <th class="col-2" scope="row">{{$i}} 00</th>

                    @foreach ($tasks as $task)
                        @foreach ($employeeShifts as $employeeShift)

                            @php
                                $extraname = '';
                                $dubbeleshift = false;
                                $oudeshift = false;


                                foreach ($employeeShifts as $employeeShift2)
                                {
                                if($employeeShift->shift->task_id == $employeeShift2->shift->task_id && $employeeShift->id != $employeeShift2->id)
                                {
                                if ($employeeShift->shift->end_time <= $employeeShift2->shift->start_time)
                                            {
                                                $oudeshift = true;
                                            }

                                }


                                    if($employeeShift->shift_id == $employeeShift2->shift_id && $employeeShift->id != $employeeShift2->id)
                                        {


                                            $extraname = "& \n" . $employeeShift2->user->first_name . " " . $employeeShift2->user->last_name;
                                            if ($employeeShift->id > $employeeShift2->id)
                                            {
                                            $dubbeleshift = true;
                                            }

                                        }
                                }

                               $colors = array(1 =>'bg-success', 2 =>'bg-primary', 3 =>'bg-secondary' , 4 =>'bg-info', 5 => 'bg-danger');
                            @endphp
                            @if ($task->id == $employeeShift->shift->task_id && $dubbeleshift == false)
                                @if ($employeeShift->shift->start_time <= $i && $employeeShift->shift->end_time >= $i )
                                    <td class="col-2 info-meer" data-name="{{$task->name}}" data-locatie="{{$employeeShift->shift->location}}" data-reden="{{$employeeShift->reason_absence}}"
                                        data-departement="{{$employeeShift->shift->department}}" data-employees="{{$employeeShift->shift->number_of_employees}}" data-absent="{{$employeeShift->shift->is_absent ? "ja" : "nee"}}"
                                        data-remark="{{$employeeShift->shift->remark}}" data-names="{{$employeeShift->user->first_name . " " . $employeeShift->user->last_name . " " . $extraname}}" >
                                        <a class="text-decoration-none text-white info-meer" href="#!">
                                            <div class="{{$colors[$employeeShift->shift->task_id]}} rounded" data-toggle="tooltip" data-placement="top" title="Klik voor meer informatie">
                                                <p class="text-center"><span class="font-weight-bold">Medewerkers: </span> {{$employeeShift->user->first_name . " " . $employeeShift->user->last_name . " " . $extraname}}</p>
                                                <p class="text-center"><span class="font-weight-bold">Afwezig: </span> {{$employeeShift->is_absent ? "ja" : "nee"}}</p>
                                            </div>
                                        </a>

                                    </td>
                                    @break
                                @elseif($oudeshift == false)
                                    <td class="col-2">
                                        <p class="h5 text-center font-weight-bold text-black">Geen {{$task->name }}</p>
                                    </td>
                                @endif
                            @endif



                        @endforeach
                    @endforeach


                </tr>
            @endfor
            </tbody>
        </table>

        @include('medewerker.modal')
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

                $('#modal-genre').modal('show');
            });

            $('#modal-genre form').submit(function (e) {
                $('#modal-genre').modal('close');
            });

        });

    </script>
@endsection
@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(1,3)}}
@endsection
