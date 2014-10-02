@extends('layouts.main')

@section('content')

	<div class="container">

		<h1>Categorias</h1><hr>

		<p>Usted puede ver, borrar y crear nuevas Categorías.</p>

		<h2>Listado de Categorias existentes</h2><hr>

		<ul class="list-group">
			@foreach($categorias as $categoria)
				<li class="list-group-item">
					<!-- {{ Form::open(array('url'=>'delete', 'class'=>'form')) }} -->
					<!-- {{ Form::hidden('id', $categoria->id) }} -->
					<a href="/delete/{{ $categoria->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
					{{ $categoria->name }}
					<!-- {{ Form::close() }} -->
				</li>
			@endforeach
		</ul>

	</div>


@stop
