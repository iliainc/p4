@extends('layouts.master')

@section('title')
    Dashboard
@stop

@section('head')
    <link href='/css/style.css' rel='stylesheet'>
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

        @if(sizeof($openTasks) == 0)
            You have not added any to-do tasks, you can <a href='/add'>add a task now to get started</a>.
        @else

            <div class='task'>
                <h3>Incomplete Tasks</h3>
                <div class='incompleteTasks'>
                    @foreach($openTasks as $openTask)
                        <h4>{{ $openTask->task }}</h4><h5>Created at: {{ $openTask->created_at }}</h5>
                        <a href='/edit/{{$openTask->id}}'><i class='fa fa-pencil'></i> Edit</a><br>
                        <a href='/edit/confirm-delete/{{$openTask->id}}'><i class='fa fa-trash'></i> Delete</a><br>
                        <div class='categories'>
                            @foreach($openTask->categories as $category)
                                <div class='category'>{{ $category->category }}</div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
                <h3>Complete Tasks</h3>
                <div class='completeTasks'>
                    @foreach($completeTasks as $completeTask)
                        <h4>{{ $completeTask->task }}</h4><h5>Created at: {{ $completeTask->created_at }}</h5><h5>Completed at: {{ $completeTask->updated_at }}</h5>
                        <a href='/edit/{{$completeTask->id}}'><i class='fa fa-pencil'></i> Edit</a><br>
                        <a href='/edit/confirm-delete/{{$completeTask->id}}'><i class='fa fa-trash'></i> Delete</a><br>
                        <div class='categories'>
                            @foreach($completeTask->categories as $category)
                                <div class='category'>{{ $category->category }}</div>
                            @endforeach
                        </div>
                    @endforeach
                </div>
            </div>

         @endif

    </div>
@stop


@section('body')
@stop
