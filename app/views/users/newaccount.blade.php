@extends('layouts.main')

@section('content')
	
	<div class="container">

		<h1>Crear Nueva Cuenta</h1>

		@if($errors->has())
		<div id="form-errors">
			<p>Ocurrieron los siguientes errores:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!-- end form-errors -->
		@endif

		
		{{ Form::open(array('url'=>'users/create', 'class'=>'form-horizontal')) }}

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Nombre</label>
			<div class="col-sm-10">
				{{ Form::text('firstname', null, array('class'=>'form-control')) }}
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Apellido</label>
			<div class="col-sm-10">
				{{ Form::text('lastname', null, array('class'=>'form-control')) }}
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
			<div class="col-sm-10">
				{{ Form::text('email', null, array('class'=>'form-control')) }}
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Password</label>
			<div class="col-sm-10">
				{{ Form::text('password', null, array('class'=>'form-control')) }}
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Confirmar Password</label>
			<div class="col-sm-10">
				{{ Form::text('password_confirmation', null, array('class'=>'form-control')) }}
			</div>
		</div>

		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Teléfono</label>
			<div class="col-sm-10">
				{{ Form::text('telephone', null, array('class'=>'form-control')) }}
			</div>
		</div>

		<div class="form-group">
	    <div class="col-sm-offset-2 col-sm-10">
	      {{ Form::submit('CREAR NUEVA CUENTA', array('class'=>'btn btn-success')) }}
	    </div>
	  </div>
		
		{{ Form::close() }}

	</div>


	




@stop