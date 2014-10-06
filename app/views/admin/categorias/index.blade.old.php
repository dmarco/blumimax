@extends('layouts.main')

@section('content')

	<div class="container">

		<h1>Categorias</h1><hr>

		<p>Usted puede ver, borrar y crear nuevas Categorías.</p>

		<h2>Listado de Categorias existentes</h2><hr>

		{{ $html }}

		<!-- <ul class="list-group">
			@foreach($categorias as $categoria)

				<li class="list-group-item">
					<a href="/delete/{{ $categoria->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
					{{ $categoria->name }}
					
					@if($categoria->children)
						<ul class="list-group">
						@foreach($categoria->children as $subcategoria)
							<li class="list-group-item">
								<a href="/delete/{{ $subcategoria->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
								{{ $subcategoria->name }}

								@if($categoria->children)
									<ul class="list-group">
									@foreach($subcategoria->children as $subcategoria)
										<li class="list-group-item">
											<a href="/delete/{{ $subcategoria->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
											{{ $subcategoria->name }}

											@if($categoria->children)
												<ul class="list-group">
												@foreach($subcategoria->children as $subcategoria)
													<li class="list-group-item">
														<a href="/delete/{{ $subcategoria->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
														{{ $subcategoria->name }}
													</li>	
												@endforeach
												</ul>
											@else
							        	{{ $categoria->name }}
							        @endif

										</li>	
									@endforeach
									</ul>
								@else
				        	{{ $categoria->name }}
				        @endif

							</li>	
						@endforeach
						</ul>
					@else
	        	{{ $categoria->name }}
	        @endif
			
				</li>	
			
			@endforeach
		</ul> -->

		<!-- <ul class="list-group">
			@foreach($categorias as $categoria)
				<li class="list-group-item">
					<a href="/delete/{{ $categoria->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a>
					{{ $categoria->id }}
					{{ $categoria->parent_id }}
					@if($categoria->id == $categoria->parent_id)
						<ul class="list-group">
							@foreach($categorias as $categoria)
								<li class="list-group-item"><a href="/delete/{{ $categoria->id }}" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> </a></li>
								{{ $categoria->name }}
							@endforeach
						</ul>
					@else
           {{ $categoria->name }}
          @endif
				</li>
			@endforeach
		</ul> -->

	</div>


@stop
