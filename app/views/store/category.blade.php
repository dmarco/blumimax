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
    
    <div class="col-xs-12 col-sm-3">
      
      <div class="list-group">
        <li class="list-group-item">
          <h4>{{ $category->name }}</h4>
        </li>
        @foreach($categories as $cat)
        <a href="{{ $cat->slug }}" class="list-group-item">{{ $cat->name }}</a>
        @endforeach
      </div>
      
      <br>
      
      <div class="list-group">
        <li class="list-group-item">
          <h4>Precios</h4>
        </li>
        <li class="list-group-item">
          {{ Form::open(array('url'=>'/'.$category->slug, 'method' => 'post')) }}
          {{ Form::hidden('catslug', $category->slug) }}          
          <input type="hidden" value="0"   name="min">
          <input type="hidden" value="1000000000000000000000000000000000" name="max">
          <button type="submit" class="btn btn-link btn-xs">Todos</button>
          {{ Form::close() }}  
        </li>
        <li class="list-group-item">
          {{ Form::open(array('url'=>'/'.$category->slug, 'method' => 'post')) }}
          {{ Form::hidden('catslug', $category->slug) }}          
          <input type="hidden" value="0"   name="min">
          <input type="hidden" value="500" name="max">
          <button type="submit" class="btn btn-link btn-xs">0 - 500</button>
          {{ Form::close() }}  
        </li>
        <li class="list-group-item">
          {{ Form::open(array('url'=>'/'.$category->slug, 'method' => 'post')) }}
          {{ Form::hidden('catslug', $category->slug) }}          
          <input type="hidden" value="501"  name="min">
          <input type="hidden" value="1000" name="max">
          <button type="submit" class="btn btn-link btn-xs">501 - 1000</button>
          {{ Form::close() }}  
        </li>
        <li class="list-group-item">
          {{ Form::open(array('url'=>'/'.$category->slug, 'method' => 'post')) }}
          {{ Form::hidden('catslug', $category->slug) }}          
          <input type="hidden" value="1001" name="min">
          <input type="hidden" value="1500" name="max">
          <button type="submit" class="btn btn-link btn-xs">1001 - 1500</button>
          {{ Form::close() }}
        </li>
        <li class="list-group-item">
          {{ Form::open(array('url'=>'/'.$category->slug, 'method' => 'post')) }}
          {{ Form::hidden('catslug', $category->slug) }}          
          <input type="hidden" value="1501" name="min">
          <input type="hidden" value="2000" name="max">
          <button type="submit" class="btn btn-link btn-xs">1501 - 2000</button>
          {{ Form::close() }}
        </li>
        <li class="list-group-item">
          {{ Form::open(array('url'=>'/'.$category->slug, 'method' => 'post')) }}
          {{ Form::hidden('catslug', $category->slug) }}          
          <input type="hidden" value="2001" name="min">
          <input type="hidden" value="2500" name="max">
          <button type="submit" class="btn btn-link btn-xs">2001 - 2500</button>
          {{ Form::close() }}
        </li>
        <li class="list-group-item">
          {{ Form::open(array('url'=>'/'.$category->slug, 'method' => 'post')) }}
          {{ Form::hidden('catslug', $category->slug) }}          
          <input type="hidden" value="2500" name="min">
          <input type="hidden" value=""     name="max">
          <button type="submit" class="btn btn-link btn-xs">> 2500</button>
          {{ Form::close() }}
        </li>
        <li class="list-group-item">
          {{ Form::open(array('url'=>'/'.$category->slug, 'method' => 'post')) }}
          {{ Form::hidden('catslug', $category->slug) }}
          <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <input type="text" class="form-control" name="min" placeholder="Min">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <input type="text" class="form-control" name="max" placeholder="Max">
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <button type="submit" class="btn btn-default"><i class="fa fa-chevron-right"></i></button>
            </div>
          </div>
          {{ Form::close() }}
        </li>
      </div>
      
      <br>
    
    </div>
    
    <div class="col-xs-12 col-sm-9 sidebar-offcanvas">
      
      @if( count($products) != 0 )
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
      @else
      <p>No hay resultados</p>
      @endif

    </div>

  </div>  

@stop

@section('pagination')

  <section id="pagination">
    {{ $products->links() }}
  </section><!-- end pagination -->

@stop