
@extends('layouts.template')

@section('main')
    <h1>Nieuws beheren <a href="{!! url('/help#nieuwsBeheren') !!}"><i class="fas fa-question-circle"></i></a></h1>
    <div class="container row">
        {{$newsitems->links()}}
        <div class="col-sm-12 col-md-12 col-lg-12 mb-12">
            @foreach($newsitems as $newsitem)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{$newsitem->title}}</h5>
                    <p class="card-text">{{$newsitem->description}}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="/news/{{$newsitem->id}}/edit" class="btn btn-outline-info btn-sm " data-toggle="tooltip" data-placement="top" title="edit {{$newsitem->title}}"><i class="fas fa-edit"></i></a>
                    <form action="/news/{{ $newsitem->id }}" method="post" class="deleteForm">
                        @csrf
                        @method('delete')
                        <div class="btn-group btn-group-sm">
                            <button type="button" class="btn btn-outline-danger"
                                    data-toggle="tooltip"
                                    title="Delete {{ $newsitem->title }}">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
                @endforeach

                <tr>
                    <td class="text-center" colspan="5">Nieuw nieuwsitem toevoegen <a href="/news/create" class="btn btn-success btn-add" data-toggle="tooltip" data-placement="top" title="add a new newsitem">
                            <i class="fas fa-plus-circle"></i>
                        </a></td>
                </tr>
        </div>
    </div>
    {{$newsitems->links()}}
@endsection

@section('script_after')
    <script>
        $(function () {
            $('.deleteForm button').click(function () {

                    $(this).closest('form').submit();
                }
            })
        });
    </script>
@endsection

@section('footer-content')
    {{\App\Http\Controllers\Auth\FooterController::displayfooter(2,3)}}
@endsection
