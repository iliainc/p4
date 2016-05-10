@extends('layouts.master')

@section('title')
    Edit To-Do Task
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



    	<h1>Edit To-Do Task</h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>

        <p>
            <h3>Edit Task:</h3>

            <form method='POST' action='/edit'>

                <input type='hidden' name='id' value='{{$task->id}}'>

                {{ csrf_field() }}

                <div class='form-group'>
                   <label>Task:</label>
                    <input
                        type='text'
                        id='task'
                        name='task'
                        value='{{ $task->task }}'
                    >
                   <div class='error'>{{ $errors->first('task') }}</div>
                </div>

                <div class='form-group'>
                   <label>Complete? (Enter 0 for Incomplete, 1 for Complete)</label>
                   <input
                       type='text'
                       id='complete'
                       name='complete'
                       value='{{ $task->complete }}'
                   >
                   <div class='error'>{{ $errors->first('complete') }}</div>
                </div>

                <div class='form-group'>
                    <fieldset>
                        <legend>Categories:</legend>
                        @foreach($categories_for_checkboxes as $category_id => $category_category)
                            <label>
                            <input
                                type='checkbox'
                                value='{{ $category_id }}'
                                name='categories[]'
                                {{ (in_array($category_id,$categories_for_this_task)) ? 'CHECKED' : '' }}
                            >
                            {{$category_category}}
                            </label>
                        @endforeach
                    </fieldset>
                </div>

                <div class='form-instructions'>
                    All fields are required
                </div>

                <button type="submit" class="btn btn-primary">Save Changes</button>

                <div class='error'>
                    @if(count($errors) > 0)
                        Please correct the errors above and try again.
                    @endif
                </div>

            </form>

        </p>

    </div>
@stop


@section('body')
@stop