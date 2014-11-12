<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" ng-app="blumimaxApp"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Blumimax</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        {{ HTML::style('css/normalize.css') }}
        {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}
        {{ HTML::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css') }}
        {{ HTML::style('css/main.css') }}
        <!-- {{ HTML::style('css/sticky-footer-navbar.css') }} -->

    </head>
    <body ng-controller="GblCtrl">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="top-header bg-Light-grey">
            <div class="container">

              <!-- Right -->
              <ul class="nav navbar-nav navbar-right">

                @if(Auth::check())
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{ Auth::user()->firstname }} <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    @if(Auth::user()->admin == 1)
                      <li>{{ HTML::link('/admin/categories', 'Admin Categorías') }}</li>
                      <li>{{ HTML::link('/admin/products', 'Admin Productos') }}</li>
                    @endif
                    <li>{{ HTML::link('/users/signout', 'Cerrar seción') }}</li>
                  </ul>
                </li>
                @else
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> Login <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    <li>{{ HTML::link('/users/signin', 'Login') }}</li>
                    <li>{{ HTML::link('/users/newaccount', 'Registrarse') }}</li>
                  </ul>
                </li>
                @endif
                <!-- Cart -->
                <li><a href="/store/cart"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
              
              </ul>

            </div>
          </div>
          <div class="top-header bg-dark-grey">
            <div class="container">
              <div class="row">
                <div class="col-md-5">

                  <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                      <span class="sr-only">Toggle navigation</span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/home"><img src="/css/img/logo.png" alt=""></a>
                  </div>
                  
                  <div class="collapse navbar-collapse">
                    
                    <!-- Left -->
                    <ul class="nav navbar-nav">
                      
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorías<b class="caret"></b></a>
                        <ul class="dropdown-menu">

                          @foreach($catnav as $cat)
                            @if ( ! $cat->children()->get()->isEmpty() )
                            <li class="dropdown dropdown-submenu">
                              {{ HTML::link('/'.$cat->slug, $cat->name) }}
                              <ul class="dropdown-menu">
                                @foreach($cat->children()->get() as $subcat)
                                <li>
                                  {{ HTML::link('/'.$subcat->slug, $subcat->name) }}
                                </li>
                                @endforeach
                              </ul>
                            </li>
                            @else
                            <li>
                              {{ HTML::link('/'.$cat->slug, $cat->name) }}
                            </li>
                            @endif
                          @endforeach

                        </ul>
                      </li>

                    </ul>
                    
                  </div><!--/.nav-collapse -->

                </div>
                <div class="col-md-7">
                  
                  {{ Form::open(array('url'=>'/store/search', 'method'=>'get', 'class'=>'navbar-form')) }}
                  <!-- <form class="navbar-form navbar-right"> -->
                    <div class="input-group">
                      {{ Form::text('keyword', null, array('placeholder'=>'Buscar producto...', 'class'=>'form-control', 'ng-model'=>'selected', 'typeahead'=>'suggestion for suggestion in autocomplete | filter:$viewValue | limitTo:8' )) }}
                      <span class="input-group-btn">
                        {{ Form::submit('Buscar', array('class'=>'btn btn-default', 'ng-click'=>'search()')) }}
                      </span>
                    </div>
                  <!-- </form> -->
                  {{ Form::close() }} 

                </div>
              </div>
            </div>
          </div>
        </div>


        <!-- Promo -->
        @yield('promo')


        <!-- Content -->
        <div class="container">

          @yield('search-keyword')

          @if (Session::has('message'))
            <br />
            <div class="alert {{ Session::get('alert-type') }}" role="alert">{{ Session::get('message') }}</div>
          @endif

          @yield('content')

          @yield('pagination')

        </div>


        <footer class="footer">
          
          <div class="container">
            <div class="row">          
              <div class="col-sm-6 col-md-4">
                <h4>La Empresa</h4>
                <ul class="">
                  <li><a href="#">Quiénes somos</a></li>
                  <li><a href="#">Preguntas Frecuentes</a></li>
                </ul>
              </div> 
              <div class="col-sm-6 col-md-4">
                <h4>Términos, Condiciones y Privacidad</h4>
                <ul class="">
                  <li><a href="#">Términos y Condiciones</a></li>
                  <li><a href="#">Privacidad</a></li>
                </ul>
              </div>
              <div class="col-sm-6 col-md-4">
                <h4>Contacto</h4>
                <p>Write you email to subscribe to our Newsletter service. Thanks!</p>
              </div>           
            </div>
            <div class="row"> 
              <div class="col-sm-6 col-md-6">
                <p>© Copyright Blumimax.com 2014.&nbsp;</p>
              </div>
              <div class="col-sm-6 col-md-6">
                <a class="pull-right" href="http://www.dmaianmarcote.com" target="_blank">Producido por DM</a>
              </div>
            </div>
          </div>

        </footer>




        <!-- Javascripts -->
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- <script>window.jQuery || document.write(" {{ HTML::script('js/vendor/jquery-1.9.1.min.js') }} ")</script> -->
        {{ HTML::script('js/vendor/jquery-1.9.1.min.js') }}
        {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
        
        <!-- Angular -->
        {{ HTML::script('//ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.js') }}
        {{ HTML::script('//angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.11.2.js') }}
        {{ HTML::script('js/app.js') }}

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>

    </body>
</html>
