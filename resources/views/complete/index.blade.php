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
            <a class='btn btn-default' href='/logout'>&larr; Logout</a>
            <a class='btn btn-default' href='/dashboard'> Dashboard</a>
        @else
        @endif



    	<h1><dt>Complete Tasks</dt></h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>


        <h2 class="bg-primary">Complete Tasks</h2>
            <table>
              <tr>
                <th>To-Do Task</th>
                <th>Categories</th>
                <th>Created At</th>
                <th>Completed At</th>
                <th>Delete Task</th>
              </tr>
        <div>
            @foreach($completeTasks as $completeTask)
                <tr class='grayout'>
                    <td class="strong">{{ $completeTask->task }}</td>
                    <td>
                        @foreach($completeTask->categories as $category)
                          <div>{{ $category->category }}</div>
                        @endforeach
                    </td>
                    <td>{{ $completeTask->created_at }}</td>
                    <td>{{ $completeTask->updated_at }}</td>
                    <td>
                         <a class="html5lightbox" href='/confirm-delete/{{$completeTask->id}}'><i class='fa fa-trash'></i> Delete</a>
                    </td>
                </tr>
            @endforeach

            </table>
        </div>

    </div>
@stop


@section('body')
@stop
