@extends('layouts.master')

@section('title')
    Incomplete Tasks
@stop

@section('head')
@stop

@section('content')
    <div class="container welcome">

        <?php $user = Auth::user(); ?>

        @if($user)
            <a href='/logout'>&larr; Logout</a>
            <a href='/dashboard'>  | Dashboard</a>
        @else
        @endif



    	<h1>Incomplete Tasks</h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>

        <div class='task'>
            <div class='incompleteTasks'>
                @foreach($openTasks as $openTask)
                    <h4>{{ $openTask->task }}</h4><h5>Created at: {{ $openTask->created_at }}</h5>
                @endforeach
            </div>
        </div>

    </div>
@stop


@section('body')
@stop
