@extends('layouts.main')

@section('content')

	<div class="container">

		<h1>Editar Producto</h1><hr>

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


		{{ Form::open(array( 'url' => '/admin/products/modify' , 'files'=>true )) }}
		<p>
			<label for="nombre">Categoría a la que pertenece el producto</label>
			{{ $select }}
		</p>
		<p>
			<label for="title">título</label>
			{{ Form::text('title', null, array('class'=>'form-control')) }}
		</p>
		<p>
			<label for="description">Descripción</label>
			{{ Form::textarea('description', null, array('class'=>'form-control')) }}
		</p>
		<p>
			<label for="price">Precio</label>
			{{ Form::text('price', null, array('class'=>'form-control')) }}
		</p>
		<p>
			<label for="image">Seleccionar imagen</label>
			{{ Form::file('image') }}
		</p>
		{{ Form::submit('Crear Producto', array('class'=>'btn btn-success')) }}
		{{ Form::close() }}

	</div>


@stop