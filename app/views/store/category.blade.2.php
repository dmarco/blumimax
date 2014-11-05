@extends('layouts.main')

@section('content')

  <div class="row row-offcanvas row-offcanvas-right">

    <br>
    <ol class="breadcrumb">
      <li><a href="/home">Home</a></li>
      @foreach($breadcrumbs as $breadcrumb)
      <li><a href="{{ $breadcrumb->slug }}">{{ $breadcrumb->name }}</a></li>
      @endforeach
    </ol>
    
    @if( ! $category->children()->get()->isEmpty() )
    <div class="col-xs-12 col-sm-3">
      
      <!-- {{ $categories }} -->
      <div class="list-group">
        <li class="list-group-item">
          <h4>Subcategorías</h4>
        </li>
        @foreach($categories as $cat)
        <a href="{{ $cat->slug }}" class="list-group-item">{{ $cat->name }} <!-- <span class="badge">14</span> --></a>
        @endforeach
      </div>
      
      <br>
      
      <div class="list-group">
        {{ Form::open(array('url'=>'/store/CategoryPriceFilter')) }}
          <li class="list-group-item">
            <h4>Precios</h4>
          </li>
          <li class="list-group-item"><button type="submit" class="btn btn-link btn-xs">0 - 500</button></li>
          <li class="list-group-item"><button type="submit" class="btn btn-link btn-xs">501 - 1000</button></li>
          <li class="list-group-item"><button type="submit" class="btn btn-link btn-xs">1001 - 1500</button></li>
          <li class="list-group-item"><button type="submit" class="btn btn-link btn-xs">1501 - 2000</button></li>
          <li class="list-group-item"><button type="submit" class="btn btn-link btn-xs">2001 - 2500</button></li>
          <li class="list-group-item"><button type="submit" class="btn btn-link btn-xs">Más de 2500</button></li>
          <li class="list-group-item">
            <div class="row">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <input type="text" class="form-control" placeholder="Min">
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <input type="text" class="form-control" placeholder="Max">
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <button type="submit" class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
              </div>
            </div>
          </li>
        {{ Form::close() }}
      </div>
      
      <br>
    
    </div>
    @endif
    
    @if( ! $category->children()->get()->isEmpty() )
    <div class="col-xs-12 col-sm-9 sidebar-offcanvas">
    @else
    <div class="col-xs-12 col-sm-12 sidebar-offcanvas">
    @endif
      
      <div class="row">
        {{ Form::open(array('url'=>'/store/CategoryOrderBy')) }}
        <div class="col-sm-6 col-md-6">
          <h4 class="pull-left">{{ $category->name }}</h4>
        </div>
        <div class="col-sm-6 col-md-6">
          <div class="btn-group pull-right">
            <button type="button" class="btn btn-link default">Relevancia</button>
            <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
              <span class="caret"></span>
              <span class="sr-only">Toggle Dropdown</span>
            </button>
            <ul class="dropdown-menu" role="menu">
              <li><a href="#">Menor Precio</a></li>
              <li><a href="#">Mayor Precio</a></li>
              <li><a href="#">Relevancia</a></li>
            </ul>
          </div>
        </div>
        {{ Form::close() }}
      </div>

      <br>

      <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4">
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

    </div>

  </div>  

@stop

@section('pagination')

	<section id="pagination">
		{{ $products->links() }}
	</section><!-- end pagination -->

@stop