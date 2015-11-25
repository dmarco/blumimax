@extends('frontend.layouts.main')

@section('content')

  <br>
  <ol class="breadcrumb">
    <li><a href="/home">Home</a></li>
    @foreach($breadcrumbs as $breadcrumb)
    <li><a href="{{ $breadcrumb->slug }}">{{ $breadcrumb->name }}</a></li>
    @endforeach
  </ol>
    
  <div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-5">
        <div class="row">
          <div class="col-md-12">
           {{ HTML::image($product->image, $product->title , ['heigth'=>'430','class'=>'img-responsive']) }}
           <br/>
           <br/>
          </div>
        </div>  
        <div class="row">
          <div class="col-md-4 text-left">
            {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'120', 'height'=>'120')) }}
          </div>  
          <div class="col-md-4 text-center">
            {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'120', 'height'=>'120')) }}
          </div>  
          <div class="col-md-4 text-right">
           {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'120', 'height'=>'120')) }}
          </div>  
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7 product-title">
          <h3 class="droid droid-bold">{{ $product->title }}</h3>
          <div class="row bottom-line">
            <div class="col-md-4 product-description ">
                  <h4 class="droid droid-bold blue">Prestaciones</h4>
            </div>
            <div class="col-md-offset-2 col-md-6 sharing-product">
                  <ul class="list-inline">
                    <li>{{ Shareable::facebook($options = array()) }}</li>
                    <li>{{ Shareable::googlePlus($options = array()) }}</li>
                    <li>{{ Shareable::twitter($options = array()) }}</li>
                 </ul>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 product-information">
              <p>Motor GCV160<br>
                 Chasis de acero<br>
                 Ancho de corte 21’’<br>
                 Altura de corte 3/4-3.25’’<br>
                 Cantidad de variaciones de altura 6<br>
                 Transmisión SmartDrive<br>
                 Velocidad de avance 0 a 4,8 km/h<br>
                 Arranque Bobina Transistorizada<br>
                 Cebador Automático<br>
                 Sistema de transmisión Correa<br>
                 Manillar 1’’ Tubo de acero<br>
                 Ruedas 8’’ Pásticas<br>
                 Rodamiento en las ruedas Traseras<br>
                 Funciones standard Recolección de bolsa / Triturador<br>
                 Bolsa recolectora Standard<br>
                 Cuchilla de corte Doble Cuchilla (QuadraCut)<br>
                 Control de cuchilla Flywheel brake<br>
                 Peso seco 38 kg.<br>
                 Peso de operación 39 kg</p>              
            </div>
          </div>
    </div>

  </div>
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12  product-description">
            <h4 class="droid droid-bold blue">Descripción</h4>
            <p>{{ $product->description }}</p>
        </div>
      </div>
      <div class="row row-buy-product">
        <div class="col-md-1  bottom-buy-product">
          <span class="stock-buy">En Stock</span>
        </div>
        <div class="col-md-3  bottom-buy-product">
          <span class="price-buy droid droid-bold blue"> $ {{$product->price}}</span>
        </div>
        <div class="col-md-3  bottom-buy-product">
          <div class="mp-buy">12 cuotas con  {{HTML::image('img/mercadopago-small.png',"Mercado Pago",['height'=>'40'])}}</div>
        </div>
        <div class="col-md-2 bottom-buy-product">
            <div class="envio-buy">
              <h4 class="droid blue">ENVIOS A TODO EL PAIS</h4>
              <p>Entregas en CABA y GBA <br> con vehículos propios.</p>
            </div>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-2 col-lg-3 bottom-buy-product">  
          <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id={{ $product->pref_id }}" class="btn btn-success button-gradient" target="_blank">Comprar</a>
          <button type="submit" class="btn btn-success button-gradient"><i class="fa fa-shopping-cart"></i></button>
          {{ Form::close() }}
        </div>
      </div>
  <div class="row">
    <h2 class="products-destacados">
      <strong>Productos recomendados</strong>
    </h2> 
    <hr>
  </div>
  <div class="row">
    @foreach($relateds as $related)
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <a href="{{url()}}/store/view/{{ $product->id }}">
          {{ HTML::image($related->image, $related->title, array('class'=>'feature', 'width'=>'400', 'height'=>'450')) }}

        </a>
      
        <div class="caption">
          <h4 class="product-name-blue text-center">
              <a href="/store/view/{{ $related->id }}" title="{{ $related->title }}">{{ str_limit($related->title, 22) }}</a>
          </h4>
          <!-- <h5>
            Disponibilidad: 
            <span class="{{ Availability::displayClass($product->availability) }}">
              {{ Availability::display($product->availability) }}
            </span>
          </h5> -->
          <div class="row text-center space">
            <div class="col-xs-6 col-md-6">
              <h3 class="product-price-old">$ {{ $related->price }}</h3>
            </div>
            <div class="col-xs-6 col-md-6">
              <h3 class="product-price-new">$ {{ $related->price }}</h3>
            </div>
          </div>
          <div class="row space">
            <div class="col-md-7 text-center">
                <p class="product-price-quotas"><strong>$ {{ $related->price }}</strong> <span class="product-quotas">12 cuotas</span></p>
            </div>
            <div class="col-md-5">
                {{Html::image('img/mercadopago-small.png','Mercado Pago',['width'=>'60'])}}
            </div>
          </div>
          <div class="row">
            <div class="col-md-offset-2 col-md-4 text-center">
              <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id={{ $related->pref_id }}" class="btn btn-success" target="_blank">Comprar</a>
            </div>
            <div class="col-md-4 text-center">
                {{ Form::open(array('url'=>'/store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $related->id) }}        
            @if( $related->availability == 1 )      
                <button type="submit" class="btn btn-success"><b>+</b> <i class="fa fa-shopping-cart"></i></button>
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

@stop