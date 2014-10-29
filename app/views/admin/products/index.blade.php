@extends('layouts.main')

@section('content')

	<div class="container">

		<h1>Productos</h1><hr>

		<p>Usted puede ver, borrar y crear nuevas Productos.</p>

		<div class="panel panel-default">
		  <!-- Default panel contents -->
		  <div class="panel-heading">Listado de Productos existentes</div>

		  <!-- Table -->
		  <table class="table">
        <thead>
          <tr>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Categoría</th>
            <th>Eliminar Productos</th>
            <th>Estado</th>
            <th>Modificar Estado</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($products as $product)
          <tr>

          	{{ Form::open(array('url'=>'/admin/products/destroy', 'class'=>'form-inline')) }}
	          	{{ Form::hidden('product_id', $product->id) }}
	            <td>{{ HTML::image($product->image, $product->title, array('width'=>'50')) }} </td>
	            <td>{{ $product->title }}</td>
	            <td>{{ DB::table('categories')->where('id', '=', DB::table('products_categories')->where('product_id', '=', $product->id)->pluck('category_id'))->pluck('name') }}</td>
	            <td><button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td>
            {{ Form::close() }}

            {{ Form::open(array('url'=>'/admin/products/toggle-availability', 'class'=>'form-inline'))}}
							{{ Form::hidden('id', $product->id) }}
	            <td>{{ Form::select('availability', array('1'=>'In Stock', '0'=>'Out of Stock'), $product->availability) }}</td>
	            <td><button type="submit" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></button></td>
            {{ Form::close() }}
            
          </tr>
          @endforeach
        </tbody>
      </table>
		</div>

		<h2>Crear Nuevo Producto</h2><hr>

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


		{{ Form::open(array( 'url' => '/admin/products/create' , 'files'=>true )) }}
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
			<label for="pref_id">Id MercadoPago</label>
			{{ Form::text('pref_id', null, array('class'=>'form-control')) }}
		</p>
		<p>
			<label for="image">Seleccionar Imagen</label>
			{{ Form::file('image') }}
		</p>
		<p>
			<label for="manual">Seleccionar Manual</label>
			{{ Form::file('manual') }}
		</p>
		<p>
			<label for="technical_data">Seleccionar Ficha Técnica</label>
			{{ Form::file('technical_data') }}
		</p>
		{{ Form::submit('Crear Producto', array('class'=>'btn btn-success')) }}
		{{ Form::close() }}

	</div>


@stop