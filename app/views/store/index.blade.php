@extends('layouts.main')

@section('promo')

  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class=""></li>
      <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="item">
        {{ HTML::image('img/promo.png', 'Promotional Ad')}}
        <!-- <div class="container">
          <div class="carousel-caption">
            <h1>Example headline.</h1>
            <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
          </div>
        </div> -->
      </div>
      <div class="item active">
        {{ HTML::image('img/promo.png', 'Promotional Ad')}}
        <!-- <div class="container">
          <div class="carousel-caption">
            <h1>Another example headline.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
          </div>
        </div> -->
      </div>
      <div class="item">
        {{ HTML::image('img/promo.png', 'Promotional Ad')}}
        <!-- <div class="container">
          <div class="carousel-caption">
            <h1>One more for good measure.</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-primary" href="#" role="button">Browse gallery</a></p>
          </div>
        </div> -->
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
  </div>

@stop

@section('content')

	<h2>Nuevos Productos</h2>
    
  <hr>

  <div class="row">
    @foreach($products as $product)
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <a href="/store/view/{{ $product->id }}">
          {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}
        </a>
        <div class="caption">
          <h3><a href="/store/view/{{ $product->id }}" title="{{ $product->title }}">{{ str_limit($product->title, 16) }}</a></h3>
          <p>{{ str_limit($product->description, 100) }}</p>
          <h5>
            Disponibilidad: 
            <span class="{{ Availability::displayClass($product->availability) }}">
              {{ Availability::display($product->availability) }}
            </span>
          </h5>
          <p>$ {{ $product->price }}</p>
          <p>
            {{ Form::open(array('url'=>'/store/addtocart')) }}
            {{ Form::hidden('quantity', 1) }}
            {{ Form::hidden('id', $product->id) }}        
            <button type="submit" class="btn btn-primary">AGREGAR</button>
            <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id={{ $product->pref_id }}" class="btn btn-primary" target="_blank">Comprar</a>
            {{ Form::close() }}           
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>

@stop