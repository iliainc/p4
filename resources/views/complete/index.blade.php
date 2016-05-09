@extends('layouts.master')

@section('title')
    Complete Tasks
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



    	<h1>Complete Tasks</h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>

        <div class='task'>
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
