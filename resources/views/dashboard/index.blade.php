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
           <a class='btn btn-default' href='/logout'>&larr; Logout</a>
        @else
        @endif

    	<h1><dt>Dashboard</dt></h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>

        @if(sizeof($openTasks) == 0)
            You have not added any to-do tasks, you can <a href='/add'>add a task now to get started</a>.
        @else

            <div>
                <h2 class="bg-primary">Incomplete Tasks</h2>
                <div class='incompleteTasks'>
                    <table>
                          <tr>
                            <th>To-Do Task</th>
                            <th>Categories</th>
                            <th>Created At</th>
                            <th>Completed At</th>
                            <th>Update Task</th>
                          </tr>

                    @foreach($openTasks as $openTask)
                          <tr>
                              <td class="strong">{{ $openTask->task }}</td>
                              <td>
                                  @foreach($openTask->categories as $category)
                                    <div>{{ $category->category }}</div>
                                  @endforeach
                              </td>
                              <td>{{ $openTask->created_at }}</td>
                              <td>Not Complete</td>
                              <td>
                                   <a href='/edit/{{$openTask->id}}'><i class='fa fa-pencil'></i> Edit</a><br>
                                   <a href='/confirm-delete/{{$openTask->id}}'><i class='fa fa-trash'></i> Delete</a>
                              </td>
                          </tr>
                    @endforeach

                    </table>
                </div>
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
                                 <a href='/confirm-delete/{{$completeTask->id}}'><i class='fa fa-trash'></i> Delete</a>
                            </td>
                        </tr>
                    @endforeach

                    </table>
                </div>
            </div>

         @endif

    </div>
@stop


@section('body')
@stop
