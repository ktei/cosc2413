@extends('layouts.master')

@section('content')
{{ Form::open(array('action' => 'SessionsController@store', 'class' => 'form-signin')) }}

<h2 class="form-signin-heading">Please log in</h2>
{{ Form::email('email', '', array('class' => 'form-control', 'autofocus' => '', 'placeholder' => 'Email')) }}
{{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
<button type="submit" class="btn btn-lg btn-primary btn-block">Log in</button>

{{ Form::close() }}
@stop