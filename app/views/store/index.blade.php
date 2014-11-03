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
        {{ HTML::image('img/products/1414878328.EG5000.png', 'Promotional Ad')}}
        <div class="container">
          <div class="carousel-caption" style="right: 10%">
            <h1>EG5000</h1>
            <p>Note: If you're viewing this page via a <code>file://</code> URL, the "next" and "previous" Glyphicon buttons on the left and right might not load/display properly due to web browser security rules.</p>
            <p><a class="btn btn-lg btn-success" href="/store/view/40" role="button">Conocer más <i class="fa fa-angle-double-right"></i></a></p>
          </div>
        </div>
      </div>
      <div class="item active">
        {{ HTML::image('img/products/1414870551.Foto.png', 'Promotional Ad')}}
        <div class="container">
          <div class="carousel-caption" style="right: 10%">
            <h1>Producto ???</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-success" href="/store/view/25" role="button">Conocer más <i class="fa fa-angle-double-right"></i></a></p>
          </div>
        </div>
      </div>
      <div class="item">
        {{ HTML::image('img/products/1414877965.EG1000.png', 'Promotional Ad')}}
        <div class="container">
          <div class="carousel-caption" style="right: 10%">
            <h1>EG1000</h1>
            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
            <p><a class="btn btn-lg btn-success" href="/store/view/39" role="button">Conocer más <i class="fa fa-angle-double-right"></i></a></p>
          </div>
        </div>
      </div>
    </div>
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
  </div>

@stop

@section('content')

	<h2>Productos</h2>
    
  <hr>

  <div class="row">
    @foreach($products as $product)
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <a href="/store/view/{{ $product->id }}">
          {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}
        </a>
        <div class="caption">
          <h4><a href="/store/view/{{ $product->id }}" title="{{ $product->title }}">{{ str_limit($product->title, 22) }}</a></h4>
          <p>{{ str_limit($product->description, 80) }}</p>
          <!-- <h5>
            Disponibilidad: 
            <span class="{{ Availability::displayClass($product->availability) }}">
              {{ Availability::display($product->availability) }}
            </span>
          </h5> -->
          <h3>$ {{ $product->price }}</h3>
          <p>
            {{ Form::open(array('url'=>'/store/addtocart')) }}
            {{ Form::hidden('quantity', 1) }}
            {{ Form::hidden('id', $product->id) }}        
  
            @if( $product->availability == 1 )      
            <button type="submit" class="btn btn-success"><b>+</b> <i class="fa fa-shopping-cart"></i></button>
            <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id={{ $product->pref_id }}" class="btn btn-link success" target="_blank"><i class="fa fa-credit-card"></i> Comprar</a>
            @else
            <a class="btn btn-default" disabled="disabled"><b>+</b> <i class="fa fa-shopping-cart"></i></a>
            <a class="btn btn-link default" disabled="disabled"><i class="fa fa-credit-card"></i> Comprar</a>
            @endif

            {{ Form::close() }}           
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>

@stop

@section('pagination')

  <section id="pagination">
    {{ $products->links() }}
  </section><!-- end pagination -->

@stop
