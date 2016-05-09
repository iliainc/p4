@extends('layouts.master')

@section('title')
    Dashboard
@stop

@section('head')
@stop

@section('content')
    <div class="container welcome">

        <?php $user = Auth::user(); ?>

        @if($user)
           <a href='/logout'>&larr; Logout</a>
        @else
        @endif



    	<h1>Dashboard</h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>

        <div class='task'>
            <h3>Incomplete Tasks</h3>
            <div class='incompleteTasks'>
                @foreach($openTasks as $openTask)
                    <h4>{{ $openTask->task }}</h4><h5>Created at: {{ $openTask->created_at }}</h5>
                @endforeach
            </div>
            <h3>Complete Tasks</h3>
            <div class='completeTasks'>
                @foreach($completeTasks as $completeTask)
                    <h4>{{ $completeTask->task }}</h4><h5>Created at: {{ $completeTask->created_at }}</h5><h5>Completed at: {{ $completeTask->updated_at }}</h5>
                @endforeach
            </div>
        </div>

    </div>
@stop


@section('body')
@stop
