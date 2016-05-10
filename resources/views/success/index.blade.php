@extends('layouts.master')

@section('title')
    Operation Successful
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



    	<h1 class="bg-success">Operation Successful!</h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>


    </div>
@stop


@section('body')
@stop
