@extends('layouts.main')

@section('content')

	<div class="row">
	  <div class="col-xs-12 col-md-12">
			<h1>Categorías <small>Usted puede ver, borrar y crear nuevas Categorías.</small></h1><hr>
	  </div>
	  <div class="col-xs-12 col-md-12">
			<div class="row">
			  <div class="col-xs-8 col-md-8">
			  	<h3>Listado de Categorías - Eliminar</h3>
			  </div>
			  <div class="col-xs-4 col-md-4">
					<br><a href="/admin/categories/create/list" class="btn btn-success pull-right">Crear Categoría</a>
			  </div>
			</div>
			<hr>
	  </div>
	  <div class="col-xs-12 col-md-12">
			{{ $list }}
	  </div>
	  <div class="col-xs-12 col-md-12">
	  	
	  	<h3>Crear Nueva Categoría</h3><hr>
			
			@if($errors->has())
			<div class="alert alert-danger" role="alert">
				<p>Ocurrieron los siguientes errores:</p>
				<ul>
					@foreach($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
			@endif

			{{ Form::open(array( 'url' => '/admin/categories/create' , 'method' => 'get' )) }}
			<p>
				<label for="nombre">Nombre</label>
				<input type="text" name="name" class="form-control" placeholder="Nombre de la nueva Categoría">
			</p>
			<p>
				<label for="nombre">Seleccione la pertenencia de la nueva categoría. Si no selecciona ninguna opción, creará una Categoría Padre.</label>
				{{ $select }}
			</p>
			{{ Form::submit('Crear Categoría', array('class'=>'btn btn-success')) }}
			{{ Form::close() }}
			
	  </div>
	</div>

@stop