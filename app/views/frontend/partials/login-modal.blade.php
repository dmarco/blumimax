
<div class="modal login-modal" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ingresa a tu cuenta <span class=""> No tengo cuenta, <a href="">Registrarme Ahora</a></span></h4>
      </div>
      <div class="modal-body">
          <div class="row">
            <div class="col-md-12">
            {{ Form::open(array('url'=>'users/signin', 'class'=>'form-signin')) }}
            <div class="form-group">
              <label>Email</label>
              {{Form::text('email', null, array('class'=>'form-control','placeholder'=>''))}}
            </div>
            <div class="form-group">
              <label>Contraseña</label>              
              {{Form::password('password', array('class'=>'form-control','placeholder'=>''))}}
            </div>
            <div class="form-group">
              <div class="row">
                <div class="col-md-7">
                  <a href="" class="login-forget">Olvidé mi contraseña</a>
                </div>
                <div class="col-md-5">
                  <div class="checkbox">
                    <label for="" class="login-remainder">
                      <input type="checkbox" value="remaind"> Recordarme
                    </label>
                  </div>
                </div>
              </div>
            </div>
            <div class="form-group">
              {{ Form::button('Ingresar', array('type'=>'submit', 'class'=>'btn btn-success')) }}
            </div>
            {{ Form::close() }}  
              
            </div>
          </div>
      </div>
    </div>
  </div>
</div>