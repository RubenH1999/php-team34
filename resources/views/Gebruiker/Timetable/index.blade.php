
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
                    @foreach ($stages as $stage)
                    @foreach($timetable as $timetables)
                        @php

                        $test=false;
                            $color = App\Http\Controllers\Gebruiker\TimeTableController::rand_color();

                                foreach ($timetable as $timetables2)
                                {
                                if($timetables->performance->stage_id == $timetables2->performance->stage_id && $timetables->id != $timetables2->id)
                                {
                                    if ($timetables->performance->end_time <= $timetables2->performance->start_time)

                                                $test = true;


                                }


                                }


                        @endphp



                        @if($timetables->performance->stage_id == $stage->id)
                            @if($timetables->performance->start_time == $i)



                                    <td class="border border-dark zichtbaarheid " style="background-color: {{$color}}" rowspan="{{ $timetables->performance->end_time - $timetables->performance->start_time}}">
                                        <a href="#!"  data-id="{{$timetables->performance->id}}" class="btn btn-danger btn-delete" id="deleteArtist" data-toggle="tooltip" data-placement="top" title="verwijder {{$timetables->performance->artist->name}} van mijn personal timetable">
                                            <i class="fas fa-times"></i></a>
                                        <p>{{$timetables->performance->artist->name}}</p>
                                        <p>{{$timetables->performance->start_time}}:00 - {{$timetables->performance->end_time}}:00</p>
                                    </td>
@break
                                @elseif(!$test)
                                <td></td>


                                @endif
                        @endif






                    @endforeach
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

