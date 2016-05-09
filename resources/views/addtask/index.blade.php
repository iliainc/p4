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

        <p>
            <h3>Add a Task:</h3>
       <form method='POST' action='/add'>

            {{ csrf_field() }}

            <div class='form-group'>
               <label>To-Do Task:</label>
                <input
                    type='text'
                    id='task'
                    name='task'
                    value='{{ old('task') }}'
                >
                <input
                    type='hidden'
                    id='complete'
                    name='complete'
                    value='0'
                >
               <div class='error'>{{ $errors->first('task') }}</div>
            </div>

            <div class='form-group'>
                <fieldset>
                    <h4>Select Categories:</h4>
                    @foreach($categories_for_checkboxes as $category_id => $category_category)
                        <label>
                            <input
                                type='checkbox'
                                value='{{ $category_id }}'
                                name='categories[]'
                            >
                            {{$category_category}}
                        </label>
                    </br>
                    @endforeach
                </fieldset>
            </div>

            <div class='form-instructions'>
                All fields are required
            </div>

            <button type="submit" class="btn btn-primary">Add Task</button>

            {{--
            <ul class=''>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            --}}

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
