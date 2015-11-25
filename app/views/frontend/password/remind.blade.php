@extends('frontend.layouts.main')

@section('content')
<div class="container margin-top">
	<div class="row">
		<div class="col-md-4">
			<form action="{{ action('RemindersController@postRemind') }}" method="POST" class="form">
				<h3>Recuperacion de Contraseña</h3>
				<div class="form-group">
					<label for="email">Ingrese su email</label>
			    <input type="email" name="email" class="form-control">
				</div>
				<div class="form-group">
			    <input type="submit" value="Recuperar" class="btn btn-success">
				</div>
				<div class="form-group">
						@if (Session::get('errors'))
						  <div class="alert alert-dismissable alert-warning">
						    <h4>Uwaga!</h4>
						    <ul>
						          <li>{{ $errors }}</li>
						    </ul>
						    </div>
						@endif
						@if (Session::get('status'))
						  <div class="alert alert-dismissable alert-succes">
						    <ul>
						          <li>{{ $status }}</li>
						    </ul>
					    </div>
						@endif
				</div>
			</form>
		</div>
	</div>
</div>
@stop