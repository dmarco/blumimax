@extends('layouts.main')

@section('content')

  <br>
  <ol class="breadcrumb">
    <li><a href="/home">Home</a></li>
    @foreach($breadcrumbs as $breadcrumb)
    <li><a href="{{ $breadcrumb->slug }}">{{ $breadcrumb->name }}</a></li>
    @endforeach
  </ol>
    
  <div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      
      <div id="myCarousel" class="carousel slide">
          <!-- <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class=""></li>
            <li data-target="#myCarousel" data-slide-to="1" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="2" class=""></li>
          </ol> -->
          <div class="carousel-inner">
            <div class="item active">
              {{ HTML::image($product->image, $product->title) }}
            </div>
          </div>
          <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev"><span class="icon-prev"></span></a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next"><span class="icon-next"></span></a> -->
      </div>

      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
        <br />
        
        @if( $product->manual )       
        <a href="/{{ $product->manual }}" class="btn btn-link default" target="_blank">
          <i class="fa fa-file-pdf-o fa-2x"></i> 
          <h4>Manual</h4>
        </a>
        @else
        <a class="btn btn-link default" disabled="disabled">
          <i class="fa fa-file-pdf-o fa-2x"></i> 
          <h4>Manual</h4>
        </a>
        @endif

        @if( $product->technical_data )       
        <a href="/{{ $product->technical_data }}" class="btn btn-link default" target="_blank">
          <i class="fa fa-file-pdf-o fa-2x"></i> 
          <h4>Ficha Técnica</h4>
        </a>
        @else
        <a class="btn btn-link default" disabled="disabled">
          <i class="fa fa-file-pdf-o fa-2x"></i> 
          <h4>Ficha Técnica</h4>
        </a>
        @endif

      </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
      <div class="row">
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          <h1>{{ $product->title }}</h1>
        </div>

        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          <p>{{ $product->description }}</p>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          Disponibilidad: 
          <span class="{{ Availability::displayClass($product->availability) }}">
            <b>{{ Availability::display($product->availability) }}</b> 
          </span>
          <br /><br />   
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          <h2>${{ $product->price }}</h2>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          {{ Form::open(array('url'=>'/store/addtocart')) }}
          <div class="row">
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
              {{ Form::label('quantity', 'Cantidad') }}
            </div>
            <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
              {{ Form::text('quantity', 1, array('maxlength'=>'2', 'class'=>'form-control')) }}
            </div>
          </div>
          {{ Form::hidden('id', $product->id) }}
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          <hr>    
          <ul class="list-inline">
            <li>{{ Shareable::facebook($options = array()) }}</li>
            <li>{{ Shareable::googlePlus($options = array()) }}</li>
            <li>{{ Shareable::twitter($options = array()) }}</li>
          </ul>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          <hr>
          <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> AGREGAR</button>
          <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id={{ $product->pref_id }}" class="btn btn-link success" target="_blank"><i class="fa fa-credit-card"></i> Comprar</a>
          {{ Form::close() }}
        </div>
      
      </div>
    </div>


    <!-- <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

      <br><br>
      
      <ul id="myTab" class="nav nav-tabs">
        <li class="active"><a href="#home" data-toggle="tab">INFO &amp; CARE</a></li>
        <li class=""><a href="#profile" data-toggle="tab">DELIVERY</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">RETURN<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li class=""><a href="#dropdown1" data-toggle="tab">@fat</a></li>
            <li><a href="#dropdown2" data-toggle="tab">@mdo</a></li>
          </ul>
        </li>
      </ul>
      
      <div id="myTabContent" class="tab-content" style="margin-bottom:20px;">
        <div class="tab-pane fade active in" id="home">
          <br>
          <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor, williamsburg carles vegan helvetica. Reprehenderit butcher retro keffiyeh dreamcatcher synth. Cosby sweater eu banh mi, qui irure terry richardson ex squid. Aliquip placeat salvia cillum iphone. Seitan aliquip quis cardigan american apparel, butcher voluptate nisi qui.</p>
        </div>
        <div class="tab-pane fade" id="profile">
          <br>
          <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
        </div>
        <div class="tab-pane fade" id="dropdown1">
          <br>
          <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
        </div>
        <div class="tab-pane fade" id="dropdown2">
          <br>
          <p>Trust fund seitan letterpress, keytar raw denim keffiyeh etsy art party before they sold out master cleanse gluten-free squid scenester freegan cosby sweater. Fanny pack portland seitan DIY, art party locavore wolf cliche high life echo park Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before they sold out farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral, mustache readymade thundercats keffiyeh craft beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh echo park vegan.</p>
        </div>
      </div>

    </div> -->
  
  </div>
 

@stop