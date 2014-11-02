@extends('layouts.main')

@section('search-keyword')

  <div class="page-header">
    <h5>Resultado de búsqueda: <strong><em>{{ $keyword }}</em></strong></h5>
  </div>

@stop

@section('content')

  <div class="row">
    @foreach($products as $product)
    <div class="col-sm-6 col-md-3">
      <div class="thumbnail">
        <a href="/store/view/{{ $product->id }}">
          {{ HTML::image($product->image, $product->title, array('class'=>'feature', 'width'=>'240', 'height'=>'127')) }}
        </a>
        <div class="caption">
          <h4><a href="/store/view/{{ $product->id }}">{{ str_limit($product->title, 36) }}</a></h4>
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
