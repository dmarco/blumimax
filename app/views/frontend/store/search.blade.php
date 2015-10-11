@extends('frontend.layouts.main')

@section('search-keyword')
  
  <br>
  <h5>Resultado de búsqueda: <strong><em>{{ $keyword }}</em></strong></h5>
  <hr>
  
@stop

@section('content')

  <div class="row">
    @foreach($products as $product)
        <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <a href="/store/view/{{ $product->id }}">
          {{ HTML::image("//placehold.it/240x300/#fff", $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'300')) }}
        </a>
        <div class="caption">
          <h4 class="product-name-blue text-center">
              <a href="/store/view/{{ $product->id }}" title="{{ $product->title }}">{{ str_limit($product->title, 22) }}</a>
          </h4>
          <!-- <h5>
            Disponibilidad: 
            <span class="{{ Availability::displayClass($product->availability) }}">
              {{ Availability::display($product->availability) }}
            </span>
          </h5> -->
          <div class="row text-center space">
            <div class="col-xs-6 col-md-6">
                <h3 class="product-price-old">$ {{ $product->price }}</h3>
            </div>
            <div class="col-xs-6 col-md-6">
              <h3 class="product-price-new">$ {{ $product->price }}</h3>
            </div>
          </div>
          <div class="row space">
            <div class="col-md-7 text-center">
                <p class="product-price-quotas"><strong>$ {{ $product->price }}</strong> <span class="product-quotas">12 cuotas</span></p>
            </div>
            <div class="col-md-5">
                <img src="img/mercadopago-small.png" alt="" width="60">
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 text-center">
              <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id={{ $product->pref_id }}" class="btn btn-success" target="_blank">Comprar</a>
            </div>
            <div class="col-md-6 text-center">
                {{ Form::open(array('url'=>'/store/addtocart')) }}
                {{ Form::hidden('quantity', 1) }}
                {{ Form::hidden('id', $product->id) }}        
            @if( $product->availability == 1 )      
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

@section('pagination')

  <section id="pagination">
    {{ $products->links() }}
  </section><!-- end pagination -->

@stop
