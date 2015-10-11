@extends('frontend.layouts.main')

@section('content')
    <h1>Tengo una cuenta</h1>

    {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
    
    {{ Form::text('email', null, array('class'=>'form-control','placeholder'=>'Email')) }}
    
    {{ Form::password('password', array('class'=>'form-control','placeholder'=>'*************')) }}
    
    {{ Form::button('Sign In', array('type'=>'submit', 'class'=>'btn btn-success')) }}
    
    {{ Form::close() }}
    
    <h2>Soy un nuevo cliente</h2>
    
    <h3>Usted puede crear su cuenta en un simple paso.</h3>

    {{ HTML::link('users/newaccount', 'CREAR NUEVA CUENTA', array('class'=>'default-btn')) }}

@stop