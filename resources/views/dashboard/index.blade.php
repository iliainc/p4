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

        @if(sizeof($openTasks) == 0)
            You have not added any to-do tasks, you can <a href='/add'>add a task now to get started</a>.
        @else

            <div class='task'>
                <h2>Incomplete Tasks</h2>
                <div class='incompleteTasks'>
                    @foreach($openTasks as $openTask)
                        <h3 class="strong">{{ $openTask->task }}</h3>
                        <div class='categories'>
                            <h4>Categories:</h4>
                            @foreach($openTask->categories as $category)
                                <div class='category'>{{ $category->category }}</div>
                            @endforeach
                        </div>
                        <h5>Created at: {{ $openTask->created_at }}</h5>
                        <a href='/edit/{{$openTask->id}}'><i class='fa fa-pencil'></i> Edit</a><br>
                        <a href='/confirm-delete/{{$openTask->id}}'><i class='fa fa-trash'></i> Delete</a><br>
                    @endforeach
                </div>
                <h2>Complete Tasks</h2>
                <div class='grayout'>
                    @foreach($completeTasks as $completeTask)
                        <h3>{{ $completeTask->task }}</h3>
                        <div class='categories'>
                            <h4>Categories:</h4>
                            @foreach($openTask->categories as $category)
                                <div class='category'>{{ $category->category }}</div>
                            @endforeach
                        </div>
                        <h5>Created at: {{ $completeTask->created_at }}</h5><h5>Completed at: {{ $completeTask->updated_at }}</h5>
                        <a href='/edit/{{$completeTask->id}}'><i class='fa fa-pencil'></i> Edit</a><br>
                        <a href='/confirm-delete/{{$completeTask->id}}'><i class='fa fa-trash'></i> Delete</a><br>
                    @endforeach
                </div>
            </div>

         @endif

    </div>
@stop


@section('body')
@stop
