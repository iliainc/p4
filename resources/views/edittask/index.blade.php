@extends('layouts.noheader')

@section('title')
    Edit To-Do Task
@stop


@section('head')
@stop

@section('content')
    <div>

    	<h1><dt>Edit To-Do Task</dt></h1>

        <p>

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
                    <input type="radio" name="complete" value="1"> Mark As Complete?<br>
                </div>

                <div class='form-group'>
                    <fieldset>
                        <legend>Categories:</legend>
                        @foreach($categories_for_checkboxes as $category_id => $category_category)
                            <label>
                            <input
                                type='checkbox'
                                id='categories'
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
