<!-- Fixed navbar -->
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
          <div class="bottom-header bg-dark-grey">
            
            <div class="container">
            
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

                {{ Form::open(array('url'=>'/store/search', 'method'=>'get', 'class'=>'navbar-form')) }}
                <!-- <form class="navbar-form navbar-right"> -->
                  <div class="input-group">
                    {{ Form::text('keyword', null, array('placeholder'=>'Buscar producto...', 'class'=>'form-control', 'ng-model'=>'searchInput')) }}
                    <span class="input-group-btn">
                      {{ Form::submit('Buscar', array('class'=>'btn btn-default', 'ng-click'=>'search()')) }}
                    </span>
                  </div>
                <!-- </form> -->
                {{ Form::close() }} 
                
              </div><!--/.nav-collapse -->
            </div>

          </div>

          
        </div>