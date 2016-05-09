@extends('layouts.master')

@section('title')
    Add To-Do Task
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



    	<h1>Add a To-Do Task</h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>


    </div>
@stop


@section('body')
@stop
