@extends('frontend.layouts.main')

@section('content')

  <br>
  <ol class="breadcrumb">
    <li><a href="/home">Home</a></li>
    @foreach($breadcrumbs as $breadcrumb)
    <li><a href="{{ $breadcrumb->slug }}">{{ $breadcrumb->name }}</a></li>
    @endforeach
  </ol>
    
  <div class="row">
    
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-5">
        {{ HTML::image($product->image, $product->title) }}
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-7">
          <h3>{{ $product->title }}</h3>
          <div class="row">
            <div class="col-md-4 product-description">
                  <h4>Prestaciones</h4>
            </div>
            <div class="col-md-offset-2 col-md-6">
                  <!--ul class="list-inline">
                    <li>{{ Shareable::facebook($options = array()) }}</li>
                    <li>{{ Shareable::googlePlus($options = array()) }}</li>
                    <li>{{ Shareable::twitter($options = array()) }}</li>
                 </ul-->
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <p>Motor GCV160<br>
                 Chasis de acero<br>
                 Ancho de corte 21’’<br>
                 Altura de corte 3/4-3.25’’<br>
                 Cantidad de variaciones de altura 6<br>
                 Transmisión SmartDrive<br>
                 Velocidad de avance 0 a 4,8 km/h<br>
                 Arranque Bobina Transistorizada<br>
                 Cebador Automático<br>
                 Sistema de transmisión Correa<br>
                 Manillar 1’’ Tubo de acero<br>
                 Ruedas 8’’ Pásticas<br>
                 Rodamiento en las ruedas Traseras<br>
                 Funciones standard Recolección de bolsa / Triturador<br>
                 Bolsa recolectora Standard<br>
                 Cuchilla de corte Doble Cuchilla (QuadraCut)<br>
                 Control de cuchilla Flywheel brake<br>
                 Peso seco 38 kg.<br>
                 Peso de operación 39 kg</p>              
            </div>
          </div>
    </div>        


        
        <!--div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          Disponibilidad: 
          <span class="{{ Availability::displayClass($product->availability) }}">
            <b>{{ Availability::display($product->availability) }}</b> 
          </span>
          <br /><br />   
        </div-!>
        
        <!--div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          <h2>${{ $product->price }}</h2>
        </div-->
        
        <!--div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
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
        </div-->

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  
          <hr>
          <button type="submit" class="btn btn-success"><i class="fa fa-shopping-cart"></i> AGREGAR</button>
          <a href="https://www.mercadopago.com/mla/checkout/pay?pref_id={{ $product->pref_id }}" class="btn btn-link success" target="_blank"><i class="fa fa-credit-card"></i> Comprar</a>
          {{ Form::close() }}
        </div>
      
      </div>
 
@stop