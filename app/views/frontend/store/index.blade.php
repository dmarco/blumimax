@extends('frontend.layouts.main')

@section('promo')

<div class="page-header grey hidden-xs">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
      <div id="carousel-example-generic" class="carousel slide">

  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="..." alt="...">
      <div class="carousel-caption">
            <div class="col-md-4">
              
            </div>
      </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
    </div>
  </div>

  </div>

  </div>
</div>

@stop

@section('content')
  <div class="container">
    <div class="row seccion-informacion">
      <div class="col-md-4">
            <div class="newsletter-msg-box">
              <img class="pull-left" src="img/sobre.png">              
              <span class="newsletter-msg pull-right">Recibí nuestras<br> ofertas y precios especiales<br>vía mail</span>  
            </div>
            {{Form::open()}}
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Ingrese su e-mail">
              </div>
                <div class="col-md-4">
                  <div class="checkbox">
                    <label for="">
                      <input type="radio" name="sexo" value="H"> Hombre
                    </label>
                  </div>                
                </div>
                <div class="col-md-4">
                  <div class="checkbox">
                    <label for=""> 
                      <input type="radio" name="sexo" value="M"> Mujer
                    </label>
                  </div>        
                </div>
                <div class="form-group">
                  <input type="sumbit" class="btn btn-danger button-gradinet-red col-md-offset-1 col-md-3" value="Enviar">
                </div>
            {{Form::close()}}
      </div>
      <div class="col-md-4 text-center">
        <img src="img/mercadopago.png">
      </div>
      <div class="col-md-4 text-right">
         <img src="img/ocacorreo.png">
      </div>
    </div>
  </div>
  <div class="container hidden-xs hidden-sm">
      <div id="carousel-marcas" class="carousel slide">
        <div class="carousel-inner">
          <div class="item active">
            <img src="img/marcas.png" alt="">
          </div>
          <div class="item">
            <img src="img/marcas.png" alt="">
          </div>
        </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#carousel-marcas" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#carousel-marcas" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    </div>
  </div>
  <div class="container">
    <div class="row seccion-mercadopago">
      <div class="col-md-3">
        <img src="img/mercadopago-small.png" alt="">
      </div>
      <div class="col-md-6 text-center ">
          <p>Compras seguras y hasta <strong>12 cuotas sin interés</strong> con</p>
      </div>
      <div class="col-md-3">
          <img class="pull-right" src="img/tarjetas.png" alt="">
      </div>
    </div>
  </div>


<div class="container">
	<h2 class="products-destacados"><strong>Productos destacados</strong></h2> 
  <hr>

  <div class="row">
    @foreach($products as $product)
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <a href="{{url()}}/store/view/{{ $product->id }}">
          {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'300')) }}
        </a>
        <div class="caption">
          <h4 class="product-name-blue text-center">
              <a href="/store/view/{{ $product->id }}" title="{{ $product->title }}">{{ str_limit($product->title, 22) }}</a>
          </h4>
          <div class="row text-center space">
            <div class="col-xs-6 col-md-6">
                <h3 class="product-price-old">$ {{ $product->price }}</h3>
            </div>
            <div class="col-xs-6 col-md-6">
              <h3 class="product-price-new">$ {{ $product->price }}</h3>
            </div>
            <hr/>
          </div>
          <div class="row space">
            <div class="col-md-4 text-center">
                <p class="product-price-quotas"><strong>$ {{ $product->price }}</strong></p>
            </div>
            <div class="col-md-4">
               <span class="product-quotas">12 cuotas</span>
            </div>
            <div class="col-md-4">
                <img src="img/mercadopago-small.png" alt="" width="60">
            </div>
          </div>
          <div class="row">
            <p class="text-center">ENVIOS A TODO EL PAIS</p>
          </div>
          <div class="row">
            <div class="col-md-offset-2 col-md-4 text-center">
              <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id={{ $product->pref_id }}" class="btn btn-success button-gradient" target="_blank">Comprar</a>
            </div>
            <div class="col-md-3 text-center">
                {{ Form::open(array('url'=>'/store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $product->id) }}        
            @if( $product->availability == 1 )      
                <button type="submit" class="btn btn-success button-gradient"><b>+</b> <i class="fa fa-shopping-cart"></i></button>
            @endif
            </div>
          </div>
          <p>


            {{ Form::close() }}           
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>


@stop

@section('pagination')

  <section id="pagination">
    {{ $products->links() }}
  </section><!-- end pagination -->

@stop
