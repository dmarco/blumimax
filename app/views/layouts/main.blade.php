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
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
        

        {{ HTML::script('https://code.angularjs.org/1.2.25/angular.min.js') }}
        {{ HTML::script('js/app.js') }}

    </head>
    <body ng-controller="GblCtrl">
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->

        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="/home">Blumimax</a>
            </div>
            
            <div class="collapse navbar-collapse">
              
              <!-- Left -->
              <ul class="nav navbar-nav">
                <!-- <li class="active"><a href="#">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li> -->
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categorías <b class="caret"></b></a>
                  <ul class="dropdown-menu">
                    @foreach($catnav as $cat)
                      <li>{{ HTML::link('/store/category/'.$cat->id, $cat->name) }}</li>
                    @endforeach
                  </ul>
                </li>

                {{ Form::open(array('url'=>'/store/search', 'method'=>'get', 'class'=>'navbar-form navbar-right')) }}
                <!-- <form class="navbar-form navbar-right"> -->
                  <div class="input-group">
                    {{ Form::text('keyword', null, array('placeholder'=>'Buscar producto...', 'class'=>'form-control', 'ng-model'=>'searchInput')) }}
                    <span class="input-group-btn">
                      {{ Form::submit('Buscar', array('class'=>'btn btn-default', 'ng-click'=>'search()')) }}
                    </span>
                  </div>
                <!-- </form> -->
                {{ Form::close() }} 

              </ul>

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
              
              
            </div><!--/.nav-collapse -->
          </div>
        </div>

        @yield('promo')

        <!-- Begin page content -->
        <div class="container">

          <!-- <h4>:: @{{ searchInput }}</h4> -->
          <!-- <h4>:: @{{ users }}</h4> -->

          @yield('search-keyword')

          @if (Session::has('message'))
            <br />
            <div class="alert {{ Session::get('alert-type') }}" role="alert">{{ Session::get('message') }}</div>
          @endif

          @yield('content')

          @yield('pagination')

        </div>


        <footer id="footer">
          
          <div class="container">
            <div class="row">
            
              <div class="col-sm-6 col-md-4">
                <h4>Info</h4>
                <ul class="nav nav-stacked">
                  <li><a href="#">Sell Conditions</a>
                  </li><li><a href="#">Shipping Costs</a>
                  </li><li><a href="#">Shipping Conditions</a>
                  </li><li><a href="#">Returns</a>
                  </li><li><a href="#">About Us</a>
                </li></ul>
              </div> 

              <div class="col-sm-6 col-md-4">
                <h4>Location and Contacts</h4>
                <p><i class="icon-map-marker"></i>&nbsp;I do not Know Avenue, A City</p>
                <p><i class="icon-phone"></i>&nbsp;Phone: 234 739.126.72</p>
                <p><i class="icon-print"></i>&nbsp;Fax: 213 123.12.090</p>
                <p><i class="icon-envelope"></i>&nbsp;Email: info@mydomain.com</p>
                <p><i class="icon-globe"></i>&nbsp;Web: http://www.mydomain.com</p>
              </div>

              <div class="col-sm-6 col-md-4">
                <h4>Newsletter</h4>
                <p>Write you email to subscribe to our Newsletter service. Thanks!</p>
                <form class="form-newsletter">
                  <div class="input-append">
                    <input type="email" class="span2" placeholder="your email">
                    <button type="submit" class="btn">Subscribe</button>
                  </div>
                </form>
              </div>
            
            </div>

            <div class="row">
            
              <div class="col-sm-6 col-md-6">
                <p>© Copyright Blumimax.com 2014.&nbsp;<a href="#">Privacy</a>&nbsp;&amp;&nbsp;<a href="#">Terms and Conditions</a></p>
              </div>
            
              <div class="col-sm-6 col-md-6">
                <a class="pull-right" href="http://www.dmaianmarcote.com" target="_blank">Producido por DM</a>
              </div>
            
            </div>
          
          </div>
        </footer>





        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <!-- <script>window.jQuery || document.write(" {{ HTML::script('js/vendor/jquery-1.9.1.min.js') }} ")</script> -->
        {{ HTML::script('js/vendor/jquery-1.9.1.min.js') }}
        {{ HTML::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js') }}
        {{ HTML::script('js/plugins.js') }}
        {{ HTML::script('js/main.js') }}

        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
