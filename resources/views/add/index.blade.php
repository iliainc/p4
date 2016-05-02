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
        @else
        @endif



    	<h1>Dashboard</h1>

        <p>
            <input class='btn btn-default' href="/" value="View Complete Tasks">
            <input class='btn btn-default' href="/" value="View Incomplete Tasks">
            <input class='btn btn-default' href="/" value="Add To-Do Task">
        </p>

        <p>
            List of all to-do tasks here...  Also next to each task, Edit and Delete links
        </p>

        <!-- @if(count($errors) > 0)
            <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
            </ul>
        @endif

    	<form method='POST'>

    		<input name="_token" type="hidden" value="{{csrf_token()}}">
    		<label for="paragraphs">Paragraphs</label>
    		<input maxlength="2" name="paragraphs" type="text" value="{{old('paragraphs')}}" id="paragraphs"> (Max: 99)

    		<br><br>

    		<input class='btn btn-default' type="submit" value="Generate Lorem Ipsum">
        </form> -->

    </div>
@stop


@section('body')
@stop
