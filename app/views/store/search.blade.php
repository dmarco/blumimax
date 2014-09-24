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
          <h3><a href="/store/view/{{ $product->id }}">{{ $product->title }}</a></h3>
          <p>{{ $product->description }}</p>
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
            {{ Form::close() }}           
          </p>
        </div>
      </div>
    </div>
    @endforeach
  </div>

@stop