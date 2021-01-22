@foreach ($tasks as $task)

    @foreach ($medewerkershifts as $medewerkershift)
        @if($medewerkershift->shift->date == $date->date)


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
                @if ($medewerkershift->shift->start_time <=$i && $medewerkershift->shift->end_time >= $i)
                    <td class="col-2 " data-name="{{$task->name}}" data-locatie="{{$medewerkershift->shift->location}}" data-reden="{{$medewerkershift->reason_absence}}" data-task="{{$medewerkershift->shift->task->name}}"
                        data-departement="{{$medewerkershift->shift->department}}" data-employees="{{$medewerkershift->shift->number_of_employees}}" data-medewerkershiftID ="{{$medewerkershift->shift->id}}" data-absent="{{$medewerkershift->shift->is_absent ? "ja" : "nee"}}"
                        data-remark="{{$medewerkershift->shift->remark}}" data-names="{{$medewerkershift->user->first_name . " " . $medewerkershift->user->last_name . " " . $extraname}}" >
                        <p>
                            <a class="text-decoration-none text-white info-meer" href="#!">
                                <div class="{{$colors[$medewerkershift->shift->task_id]}} rounded" data-toggle="tooltip" data-placement="top" title="Klik voor meer informatie">
                        <p class="text-center"><span class="font-weight-bold">Date:</span> {{$medewerkershift->shift->date}}</p>
                        <p class="text-center"><span class="font-weight-bold">Medewerkers: </span> {{$medewerkershift->user->first_name . " " . $medewerkershift->user->last_name . " " . $extraname}}</p>
                        <p class="text-center"><span class="font-weight-bold">Afwezig: </span> {{$medewerkershift->shift->is_absent ? "ja" : "nee"}}</p>

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
                        </p>
                    </td>
                    @break
                @elseif($oudeshift == false)
                    <td class="col-2">
                        <p class="h5 text-center font-weight-bold">Geen {{$medewerkershift->shift->task->name }}</p>
                    </td>
                @endif
            @endif


        @endif
    @endforeach
@endforeach

{{--TODO: color randomizer gebruiker per stage zodat kleur per stage zelfde is--}}


@extends('layouts.template')

@section('main')


    <h1>Mijn persoonlijke Timetable <a href="{!! url('/help#personalTimetable') !!}"><i class="fas fa-question-circle"></i></a></h1>
    <form method="get" action="/personal-timetable" id="searchForm">
        <div class="row">
            <div class="col-sm-6 mb-2">
                <select name="date" id="date" class="form-control">
                    <option value="%">Selecteer een datum</option>
                    @foreach($performance->unique('date')->sortBy('date') as $performances)
                        <option value="{{ $performances->date }}">{{$performances->date}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-2 mb-2">
                <button type="submit" class="btn btn-success">Search</button>
            </div>
        </div>
    </form>


    @if(!$timetable->isEmpty())
        @if($date != "%")
            <p>Hier zijn de door u toegevoegde artiesten</p>
            <table class="table table-hover">
                <thead>
                <tr>
                    {{--foreach met de namen van elke stage--}}

                    <th scope="col">Tijdstip</th>

                    @foreach ($stages as $stage)
                        <th scope="col">{{$stage->name}}</th>
                    @endforeach
                </tr>
                </thead>
                <tbody>
                {{--Begin uur vroegste artiest Eind uur laatste artiest--}}

                @for ($i = $start; $i <= $end; $i++)
                    <tr>
                        <th scope="col">{{$i}} 00</th>
                        @foreach ($timetable as $timetables)

                            @php
                                $color = App\Http\Controllers\Gebruiker\TimeTableController::rand_color();

                            @endphp


                            @if($timetables->performance->start_time == $i && $timetables->performance->date == $date)
                                @for ($j = $stageBegin; $j <= $stageEnd; $j++)

                                    @if($timetables->performance->stage_id == $j)
                                        <td class="border border-dark zichtbaarheid " style="background-color: {{$color}}" rowspan="{{ $timetables->performance->end_time - $timetables->performance->start_time}}">
                                            <a href="#!"  data-id="{{$timetables->performance->id}}" class="btn btn-danger btn-delete" id="deleteArtist" data-toggle="tooltip" data-placement="top" title="verwijder {{$timetables->performance->artist->name}} van mijn personal timetable">
                                                <i class="fas fa-times"></i></a>
                                            <p>{{$timetables->performance->artist->name}}</p>
                                            <p>{{$timetables->performance->start_time}}:00 - {{$timetables->performance->end_time}}:00</p>
                                        </td>
                                    @else
                                        <td></td>
                                    @endif
                                @endfor
                            @endif






                        @endforeach

                    </tr>



                @endfor
                </tbody>
            </table>
        @else
            <p>Kies de gewenste datum</p>
        @endif
    @else
        <p>U hebt nog geen artiesten toegevoegd</p>

    @endif

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
                    let id = $(this).closest('a').data('id');

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
                                $.post(`/personal-timetable/${id}`, pars, 'json')
                                    .done(function (data) {
                                        console.log('data', data);
                                        // Show toast
                                        new Noty({
                                            type: data.type,
                                            text: data.text
                                        }).show();
                                        // After 2 seconds, redirect to the public master page
                                        setTimeout(function () {
                                            $(location).attr('href', '/personal-timetable'); // jQuery
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

