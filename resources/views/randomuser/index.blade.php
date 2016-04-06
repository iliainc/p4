@extends('layouts.master')

@section('title')
    Random User Generator
@stop

@section('head')
@stop

@section('content')
    <div class='container'>

    	<a href='/'>&larr; Home</a>

    	<h1>User Generator</h1>

        @if(count($errors) > 0)
            <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
            </ul>
        @endif
        
    	<form method="POST">
    		<label for="users">How many users?</label>		<input maxlength="2" name="users" type="text" value="{{old('users')}}" id="users"> (Max: 99)
    		<br>

    		<input name="email" id="email" type="checkbox">		<label for="email">Include Email?</label>		<br>

    		<input name="_token" type="hidden" value="{{csrf_token()}}">
    		<input type="submit" value="Generate Random User Info">
        </form>
    </div>
@stop


@section('body')
@stop
