        <footer class="footer">
          
          <div class="container">
            <div class="row footer-links">          
              <div class="col-sm-6 col-md-3">
                <h4>{{HTML::image('img/empresa.jpg')}} Empresa</h4>
                <ul class="">
                  <li><a href="#">Quiénes somos</a></li>
                  <li><a href="#">Porque elegir Blumimax</a></li>
                  <li><a href="#">Garantía y respaldo</a></li>
                  <li><a href="#">Preguntas frecuentes</a></li>
                </ul>
              </div> 
              <div class="col-sm-6 col-md-3">
                <h4>{{HTML::image('img/interrogacion.jpg')}} Servicio al Cliente</h4>
                <ul class="">
                  <li><a href="#">Como comprar</a></li>
                  <li><a href="#">Método y costos de envío</a></li>
                  <li><a href="#">Politica de devolucion y cambios</a></li>
                  <li><a href="#">Servicio de instalaciones</a></li>
                  <li><a href="#">Términos y condiciones</a></li>
                  <li><a href="#">Privacidad y seguridad</a></li>
                  <li><a href="#">Mapa del sitio</a></li>
                </ul>
              </div>
              <div class="col-sm-6 col-md-3">
                <h4>{{HTML::image('img/cuenta.jpg')}} Mi Cuenta</h4>
                <ul class="">
                  <li><a href="#">Registrarme</a></li>
                  <li><a href="#">Actualizar datos</a></li>
                  <li><a href="#">Cambiar clave</a></li>
                  <li><a href="#">Recuperar clave</a></li>
                  <li><a href="#">Estado de compras</a></li>
                  <li><a href="#">Factura electónica</a></li>
                  <li><a href="#">Lista de productos</a></li>
                </ul>
              </div>
              <div class="col-sm-6 col-md-3">
                <h4>{{HTML::image('img/contacto.jpg')}}Contacto</h4>
                <ul>
                  <li>114397900 Lunes a Viernes 9 a 18hrs.</li>
                  <li>info@blumimax.com</li>
                  <li>Suscribite al newsletter</li>
                </ul>
              </div>           
            </div>

          </div>

        </footer>
        
        <div class="terminos">
          <div class="container">
            <div class="row">
              <div class="col-md-2">
                  <a href="">Términos y Condiciones</a>
              </div>
              <div class="col-md-2">
                  <a href="">Políticas de Privacidad</a>
              </div>
            </div>
          </div>
        </div>

        <div class="copy">
          <div class="container">
            <div class="row"> 
              <div class="col-sm-6 col-md-6">
                <p>© Copyright Blumimax.com 2014.&nbsp;</p>
              </div>
              <div class="col-sm-6 col-md-6">
                <p class="pull-right">Desarrollo Blumimax</p>
              </div>
            </div>
          </div>
        </div>


        @include("frontend.partials.login-modal")



        <!-- Javascripts -->
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- <script>window.jQuery || document.write(" {{ HTML::script('js/vendor/jquery-1.9.1.min.js') }} ")</script> -->
        {{ HTML::script('js/vendor/jquery-1.9.1.min.js') }}
        {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>


    </body>
</html>