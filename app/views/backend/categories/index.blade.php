@extends('layouts.main')

@section('content')

	<h1>Categorias</h1><hr>

	<p>Usted puede ver, borrar y crear nuevas Categorías.</p>

	<h2>Listado de Categorias existentes</h2><hr>

	{{ $list }}

	<h2>Crear Nueva Categoría</h2><hr>

	@if($errors->has())
	<div class="alert alert-danger" role="alert">
		<p>Ocurrieron los siguientes errores:</p>
		<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div><!-- end form-errors -->
	@endif


	{{ Form::open(array( 'url' => '/admin/categories/create' , 'method' => 'get' )) }}
	<p>
		<label for="nombre">Seleccione la Categoría padre:</label>
		{{ $select }}
		<!-- {{ Form::select('category_id', Category::lists('name','id'), array('class' => 'form-control')) }} -->
	</p>
	<p>
		<label for="nombre">Nombre</label>
		<input type="text" name="name" class="form-control" placeholder="Nombre de la Categoría">
	</p>
	{{ Form::submit('Crear Categoría', array('class'=>'btn btn-success')) }}
	{{ Form::close() }}


@stop