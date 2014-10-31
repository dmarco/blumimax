@extends('layouts.main')

@section('content')

  <div class="row row-offcanvas row-offcanvas-right">
    
    <br>
    {{ Breadcrumbs::setDivider(NULL); }}
    {{ Breadcrumbs::addCssClasses('breadcrumb') }}
    {{ Breadcrumbs::addCrumb('Home', '/home') }}
    {{ $breadcrumbs }}
    {{ Breadcrumbs::render() }}
    <br>
    
    <div class="col-xs-6 col-sm-3">

      <!-- {{ $categories }} -->
      <div class="list-group">
        <li class="list-group-item">
          <h4>{{ $category->name }}</h4>
        </li>
        @foreach($categories as $cat)
        <a href="{{ $cat->slug }}" class="list-group-item">{{ $cat->name }} <!-- <span class="badge">14</span> --></a>
        @endforeach
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