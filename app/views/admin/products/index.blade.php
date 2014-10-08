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
          	{{ Form::hidden('id', $product->id) }}
            <td>{{ HTML::image($product->image, $product->title, array('width'=>'50')) }} </td>
            <td>{{ $product->title }}</td>
            
            @if( Category::find($product->category_id) )
            <td>{{ Category::find($product->category_id)->name }}</td>
            @else
            <td>NULL</td>
            @endif

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

		{{ Form::open(array('url'=>'/admin/products/create', 'files'=>true)) }}
		<p>
			{{ Form::label('category_id', 'Categoría') }}
			{{ Form::select('category_id', $categories, array('class'=>'form-control')) }}
		</p>
		<p>
			{{ Form::label('título') }}
			{{ Form::text('title', null, array('class'=>'form-control')) }}
		</p>
		<p>
			{{ Form::label('descripción') }}
			{{ Form::textarea('description', null, array('class'=>'form-control')) }}
		</p>
		<p>
			{{ Form::label('precio') }}
			{{ Form::text('price', null, array('class'=>'form-control')) }}
		</p>
		<p>
			{{ Form::label('image', 'Elegir imagen') }}
			{{ Form::file('image') }}
		</p>
		{{ Form::submit('Crear Producto', array('class'=>'btn btn-success')) }}
		{{ Form::close() }}

	</div>


@stop