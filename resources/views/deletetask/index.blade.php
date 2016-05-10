@extends('layouts.master')

@section('title')
    Delete Task
@stop

@section('head')
@stop

@section('content')
    <div class="container welcome">

        <?php $user = Auth::user(); ?>

        @if($user)
            <a class='btn btn-default' href='/logout'>&larr; Logout</a>
            <a class='btn btn-default' href='/dashboard'> Dashboard</a>
        @else
        @endif



    	<h1><dt>Confirm Delete Task</dt></h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>

        <p>
            <p>Are you sure you want to delete <em>{{$task->task}}</em>?</p>
            <p><strong><a href='/delete/{{$task->id}}'>Yes, delete it!</a></strong></p>
            <p><a href='/dashboard'>No, I changed my mind.</a></p>
        </p>

    </div>
@stop


@section('body')
@stop
