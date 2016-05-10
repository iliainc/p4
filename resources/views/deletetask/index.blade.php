@extends('layouts.noheader')

@section('title')
    Delete Task
@stop

@section('head')
@stop

@section('content')
    <div>

    	<h1><dt>Confirm Delete Task</dt></h1>

        <p>
            <p>Are you sure you want to delete <em>{{$task->task}}</em>?</p>
            <p><strong><a href='/delete/{{$task->id}}'>Yes, delete it!</a></strong></p>
        </p>

    </div>
@stop


@section('body')
@stop
