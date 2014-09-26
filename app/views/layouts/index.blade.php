<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html ng-app="blumimaxApp" class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Blumimax</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        {{ HTML::style('//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css') }}
        {{ HTML::style('components/normalize.css') }}
        {{ HTML::style('components/bootstrap.min.css') }}
        {{ HTML::style('css/main.css') }}

    </head>
    <body>

        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation" ng-controller="NavCtrl">
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
                    
                      <li ng-repeat="category in categories"><a href="#">@{{ category.name }}</a></li>
                    
                  </ul>
                </li>

                <!--{{ Form::open(array('url'=>'/store/search', 'method'=>'get', 'class'=>'navbar-form navbar-right')) }}
                <div class="input-group">
                  {{ Form::text('keyword', null, array('placeholder'=>'Buscar producto...', 'class'=>'form-control')) }}
                  <span class="input-group-btn">
                    {{ Form::submit('Buscar', array('class'=>'btn btn-default')) }}
                  </span>
                </div>
                {{ Form::close() }} /input-group -->
              </ul>

              <!-- Right 
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
                <li><a href="/store/cart"><i class="fa fa-shopping-cart"></i> Carrito</a></li>
              
              </ul>-->
              
              
            </div><!--/.nav-collapse -->
          </div>
        </div>
        
        <div ng-view></div>

        <script src="components/jquery.min.js"></script>
        <!-- <script>window.jQuery || document.write(" {{ HTML::script('components/jquery.min.js') }} ")</script> -->
        <script src="components/modernizr-2.6.2.min.js"></script>
        <script src="components/bootstrap.min.js"></script>
        <script src="components/angular.min.js"></script>
        <script src="components/angular-route.min.js"></script>
        
        <script src="js/app.js"></script>
        <script src="js/controllers.js"></script>


        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
        <script>
            var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']];
            (function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];
            g.src='//www.google-analytics.com/ga.js';
            s.parentNode.insertBefore(g,s)}(document,'script'));
        </script>
    </body>
</html>
