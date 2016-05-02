@extends('layouts.master')

@section('title')
    Lorem Ipsum Generator
@stop

@section('head')
@stop

@section('content')
    <div class='container'>

    	<a href='/'>&larr; Home</a>

    	<h1>Lorem Ipsum Generator</h1>

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

    		<input type="submit" value="Generate Lorem Ipsum">
        </form>

    </div>
@stop


@section('body')
@stop
