@extends('frontend.layouts.main')

@section('content')
<div class="container margin-top">
	<div class="row">
		<div class="col-md-4">
			<form action="{{ action('RemindersController@postReset') }}" method="POST">
					<h3>Recuperacion de Contraseña</h3>
			    <input type="hidden" name="token" value="{{ $token }}">
			    <div class="form-group">
			    	<label for="password">Correo Electrónico</label>			    
			    	<input type="email" name="email" class="form-control">
			    </div>
			    <div class="form-group">
			    	<label for="password">Contraseña</label>			    
			    	<input type="password" name="password" class="form-control">
			    </div>		
			    <div class="form-group">
						<label for="password">Confirmar Contraseña</label>			    
			    	<input type="password" name="password_confirmation" class="form-control">
			    </div>
			    <div class="from-group">
			    	<input type="submit" value="Recuperar Contraseña">
			    </div>
		</form>
		</div>
	</div>
</div>
@stop