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
            <a class='btn btn-default' href='/logout'>&larr; Logout</a>
            <a class='btn btn-default' href='/dashboard'> Dashboard</a>
        @else
        @endif



    	<h1><dt>Add To-Do Task</dt></h1>

        <p>
            <a class='btn btn-default' href="/complete">View Complete Tasks</a>
            <a class='btn btn-default' href="/incomplete">View Incomplete Tasks</a>
            <a class='btn btn-default' href="/add">Add To-Do Task</a>
        </p>

        <p>
        <h3 class="bg-primary">Add a Task:</h3>
        <form method='POST' action='/add'>

            {{ csrf_field() }}

            <div class='form-group'>
               <table>
                  <tr>
                      <td class="strong"><h4><label>To-Do Task:</label></h4></td>
                      <td>
                          <input class="task"
                              type='text'
                              id='task'
                              name='task'
                              value='{{ old('task') }}'
                          >
                      </td>
                      <td>
                          <input
                              type='hidden'
                              id='complete'
                              name='complete'
                              value='0'
                          >
                      </td>
                      <div class="bg-danger">{{ $errors->first('task') }}</div>
                      <td>
                          <div class='form-group'>
                              <fieldset>
                                  <h4>Select Categories:</h4>
                                  @foreach($categories_for_checkboxes as $category_id => $category_category)
                                      <label>
                                          <input
                                              type='checkbox'
                                              value='{{ $category_id }}'
                                              id='categories'
                                              name='categories[]'
                                          >
                                          {{$category_category}}
                                      </label>
                                  </br>
                                  @endforeach
                              </fieldset>
                          </div>
                      </td>
                      <td>
                          <div>
                              *All fields are required*
                          </div>

                          <button type="submit" class="btn btn-primary">Add Task</button>
                      </td>
                  </tr>
              </table>
            </div>

            {{--
            <ul class="bg-danger">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            --}}

            <div class="bg-danger">
                @if(count($errors) > 0)
                    All fields are required, please make a selection.
                @endif
            </div>

        </form>
    </p>

    </div>
@stop


@section('body')
@stop
