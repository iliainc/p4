@extends('layouts.master')

@section('title')
    Gofer To-Do Tracker
@stop

@section('head')

@stop

@section('content')
    <div class="container welcome">
        <p>Don't have an account? <a href='/register'>Register here...</a></p>

        <h1>Login</h1>

        @if(count($errors) > 0)
            <ul class='errors'>
                @foreach ($errors->all() as $error)
                    <li><span class='fa fa-exclamation-circle'></span> {{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form method='POST' action='/login'>

            {!! csrf_field() !!}

            <div class='form-group'>
                <label for='email'>Email</label>
                <input type='text' name='email' id='email' value='{{ old('email') }}'>
            </div>

            <div class='form-group'>
                <label for='password'>Password</label>
                <input type='password' name='password' id='password' value='{{ old('password') }}'>
            </div>

            <div class='form-group'>
                <input type='checkbox' name='remember' id='remember'>
                <label for='remember' class='checkboxLabel'>Remember me</label>
            </div>

            <button type='submit' class='btn btn-default'>Login</button>

        </form>
    </div>
   <!-- <div class="container welcome">
     <div>
       <div class="col-xs-6">
         <img class="img-circle" src="images/loremipsum.png" alt="Lorem Ipsum image" width="140" height="140">
         <h3 id="loremipsum">Lorem Ipsum Generator</h3>
         <p>Generate random filler text to use with your web apps; focus on design, not content.</p>
         <p><a class="btn btn-default" href="/loremipsum" role="button">Generate Lorem Ipsum Text &raquo;</a></p>
       </div>
       <div class="col-xs-6">
         <img class="img-circle" src="images/randomuser.png" alt="Random User image" width="140" height="140">
         <h3 id="randomuser">Random User Generator</h3>
         <p>Generate random user information to test your web applications with fake users.</p>
         <p><a class="btn btn-default" href="/randomuser" role="button">Generate Random Users &raquo;</a></p>
       </div>
     </div>
   </div> -->

@stop


@section('body')

@stop
