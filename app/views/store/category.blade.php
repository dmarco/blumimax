@extends('layouts.main')

@section('content')

	<h2>{{ $category->name }}</h2>
  <hr>

  <div class="row row-offcanvas row-offcanvas-right">
  
    <div class="col-xs-6 col-sm-3">
      
      <div class="list-group">
        <a href="#" class="list-group-item active">Subcategoría <span class="badge">14</span></a>
        <a href="#" class="list-group-item">Subcategoría <span class="badge">7</span></a>
        <a href="#" class="list-group-item">Subcategoría <span class="badge">4</span></a>
        <a href="#" class="list-group-item">Subcategoría <span class="badge">32</span></a>
        <a href="#" class="list-group-item">Subcategoría <span class="badge">21</span></a>
        <a href="#" class="list-group-item">Subcategoría <span class="badge">35</span></a>
        <a href="#" class="list-group-item">Subcategoría <span class="badge">12</span></a>
        <a href="#" class="list-group-item">Subcategoría <span class="badge">8</span></a>
        <a href="#" class="list-group-item">Subcategoría <span class="badge">3</span></a>
      </div>

    </div>
    
    <div class="col-xs-12 col-sm-9 sidebar-offcanvas">
      
      <div class="row">
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4">
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

    </div>

  </div>  

@stop

@section('pagination')

	<section id="pagination">
		{{ $products->links() }}
	</section><!-- end pagination -->

@stop