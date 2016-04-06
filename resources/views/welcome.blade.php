@extends('layouts.master')

@section('title')
    Developer's Best Friend
@stop

@section('head')

@stop

@section('content')

   <div class="container welcome">
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
   </div>

@stop


@section('body')

@stop
