@extends('layouts.master')

@section('title')
    Lorem Ipsum Generator
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



    	<h1>My To-Do Dashboard</h1>

    	How many paragraphs do you want?

        @if(count($errors) > 0)
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
        </form>

    </div>
@stop


@section('body')
@stop
