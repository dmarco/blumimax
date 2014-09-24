@extends('layouts.main')

@section('content')

	<div class="container">

		<h1>Categorias</h1><hr>

		<p>Usted puede ver, borrar y crear nuevas Categorías.</p>

		<h2>Listado de Categorias existentes</h2><hr>

		<ul class="list-group">
			@foreach($categories as $category)
				<li class="list-group-item">
					{{ Form::open(array('url'=>'admin/categories/destroy', 'class'=>'form')) }}
					{{ Form::hidden('id', $category->id) }}
					<button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </button>
					{{ $category->name }}
					{{ Form::close() }}
				</li>
			@endforeach
		</ul>

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

		{{ Form::open(array('url'=>'admin/categories/create')) }}
		<p>
			{{ Form::label('nombre') }}
			{{ Form::text('name', null, array('class'=>'form-control')) }}
		</p>
		{{ Form::submit('Crear Categoría', array('class'=>'btn btn-success')) }}
		{{ Form::close() }}

	</div>


@stop