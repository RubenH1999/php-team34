@extends('layouts.template')



@section('title', "Edit taak: $task->name")

@section('main')
    <h1>Update task</h1>
    <form action="/tasks/{{$task->id}}" method="post">
        @method('put')
        @include('Verantwoordelijke.Taken.form')
    </form>
@endsection
