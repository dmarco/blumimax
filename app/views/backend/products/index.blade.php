@extends('backend.layouts.main')

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
            <th>Modificar</th>
            <th>Eliminar</th>
            <th>Stock</th>
          </tr>
        </thead>
        <tbody>
        	@foreach($products as $product)
          <tr>

            <td>{{ HTML::image($product->image, $product->title, array('width'=>'50')) }} </td>
            <td>{{ $product->title }}</td>
            <td>{{ DB::table('categories')->where('id', '=', DB::table('products_categories')->where('product_id', '=', $product->id)->pluck('category_id'))->pluck('name') }}</td>
						
						{{ Form::open(array('url'=>'/admin/products/edit', 'class'=>'form-inline')) }}
	          {{ Form::hidden('product_id', $product->id) }}
	          <td><button type="submit" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></button></td>
            {{ Form::close() }}

          	{{ Form::open(array('url'=>'/admin/products/destroy', 'class'=>'form-inline')) }}
	          {{ Form::hidden('product_id', $product->id) }}
	          <td><button type="submit" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></td>
            {{ Form::close() }}

            {{ Form::open(array('url'=>'/admin/products/toggle-availability', 'class'=>'form-inline'))}}
						{{ Form::hidden('id', $product->id) }}
	          <td>{{ Form::select('availability', array('1'=>'Con Stock', '0'=>'Sin Stock'), $product->availability) }}
	          <button type="submit" class="btn btn-warning btn-xs"><i class="fa fa-pencil-square-o"></i></button></td>
            {{ Form::close() }}
            
          </tr>
          @endforeach
        </tbody>
        <tr>
        	<td>{{$products->links()}}</td>
        </tr>
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
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
					<label for="nombre">Categoría a la que pertenece el producto</label>
					{{ $select }}
				</div>
				<div class="form-group">
					<label for="title">Nombre</label>
					{{ Form::text('title', null, array('class'=>'form-control')) }}
				</div>
				<div class="form-group">
					<label for="description">Descripción</label>
					{{ Form::textarea('description', null, array('class'=>'form-control')) }}
				</div>
				<div class="form-group">
					<label for="price">Precio</label>
					{{ Form::text('price', null, array('class'=>'form-control')) }}
				</div>
				<div class="form-group">
					<label for="price">Precio Viejo</label>
					{{ Form::text('price_old', null, array('class'=>'form-control')) }}
				</div>
				<div class="form-group">
					<label for="tags">Tags</label>
					{{Form::select('tags[]',$tags,null,['id'=>'tags','multiple'=>'multiple','class'=>'form-control'])}}
				</div>
				<div class="form-group">
					<label for="pref_id">MercadoPago ID</label>
					{{ Form::text('pref_id', null, array('class'=>'form-control')) }}
				</div>
			</div>	
			<div class="col-md-6">
				<div class="form-group">
					<label for="image">Seleccionar Imagen</label>
					{{ Form::file('image', array('class'=>'form-control')) }}
				</div>
				<div class="form-group">
					<label for="image_2">Seleccionar Imagen</label>
					{{ Form::file('image_2', array('class'=>'form-control')) }}
				</div>
				<div class="form-group">
					<label for="image_4">Seleccionar Imagen</label>
					{{ Form::file('image_3', array('class'=>'form-control')) }}
				</div>
				<div class="form-group">
					<label for="image_4">Seleccionar Imagen</label>
					{{ Form::file('image_4', array('class'=>'form-control')) }}
				</div>
				<div class="form-group">
					<label for="manual">Seleccionar Manual</label>
					{{ Form::file('manual', array('class'=>'form-control')) }}
				</div>
				<div class="form-group">
					<label for="technical_data">Seleccionar Ficha Técnica</label>
					{{ Form::file('technical_data', array('class'=>'form-control')) }}
				</div>		
			</div>
			<div class="form-group">
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				{{ Form::submit('Crear Producto', array('class'=>'btn btn-success')) }}
			</div>
		</div>
		{{ Form::close() }}

	</div>
@stop

@section('script')
<script type="text/javascript">
	$('#tags').select2({tags:true});
</script>
@stop