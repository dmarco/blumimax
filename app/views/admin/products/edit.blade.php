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

		<!-- {{ $test }} -->
		{{ Form::open(array( 'url' => '/admin/products/modify' , 'files'=>true )) }}
		{{ Form::hidden('id', $product->id) }}
		<div class="form-group">
			<label for="nombre">Categoría a la que pertenece el producto</label>
			{{ $select }}
		</div>
		<div class="form-group">
			<label for="title">título</label>
			{{ Form::text('title', $product->title, array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			<label for="description">Descripción</label>
			{{ Form::textarea('description', $product->description, array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			<label for="price">Precio</label>
			{{ Form::text('price', $product->price, array('class'=>'form-control')) }}
		</div>
		<div class="form-group">
			<label for="pref_id">Id MercadoPago</label>
			{{ Form::text('pref_id', $product->pref_id, array('class'=>'form-control')) }}
		</div>


		<div class="form-group">
			@if( $product->image )
			<a href="/{{ $product->image }}" target="_blank">
				{{ HTML::image($product->image, $product->title, array('width'=>'30')) }} 
			</a>
			<label for="image">Modificar Imagen</label>
			@else
			<label for="image">Cargar Imagen</label>
			@endif
			{{ Form::file('image') }}
		</div>
		
		<div class="form-group">
			@if( $product->manual )
			<a href="/{{ $product->manual }}" target="_blank">
				<i class="fa fa-file-pdf-o"></i>
			</a>
			<label for="manual">Modificar Manual</label>
			@else
			<label for="manual">Cargar Manual</label>
			@endif
			{{ Form::file('manual') }}
		</div>
		
		<div class="form-group">
			@if( $product->technical_data )
			<a href="/{{ $product->technical_data }}" target="_blank">
				<i class="fa fa-file-pdf-o"></i>
			</a>
			<label for="technical_data">Modificar Ficha Técnica</label>
			@else
			<label for="technical_data">Cargar Ficha Técnica</label>
			@endif
			{{ Form::file('technical_data') }}
		</div>
		
		{{ Form::submit('Modificar Producto', array('class'=>'btn btn-success')) }}
		{{ Form::close() }}

	</div>


@stop