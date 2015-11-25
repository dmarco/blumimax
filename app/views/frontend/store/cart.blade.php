@extends('frontend.layouts.main')

@section('content')

  <br>

  <div class="panel panel-default">
    
    <div class="panel-heading">
      <h3>Carrito de compras & Comprar</h3>
    </div>
  
    <form target="MercadoPago" action="https://www.mercadopago.com/mla/cart" method="post">
      <div class="panel-body">
        <div class="row">
          <div class="col-12 col-lg-12">
              <table class="table table-striped">
                <tbody>
                 @foreach($cart as $cart_item)
                  <tr>
                    <td width="150">
                      {{ HTML::image($cart_item->image, $cart_item->name, array('width'=>'150', 'height'=>'160'))}} 
                    </td>
                    <td>
                        <h4 class="cart-name-blue">{{ $cart_item->name }}</h4>
                              {{ $cart_item->quantity }}
                    </td>
                    <td>
                        ${{ $cart_item->price }}
                    </td>
                    <td>
                      ${{ $cart_item->price * $cart_item->quantity }} 

                      <a href="/store/removeitem/{{ $cart_item->identifier }}">
                        {{ HTML::image('img/remove.gif', 'Remove product') }}
                      </a>
                    
                    </td>
                  </tr>
                  @endforeach
                  
                </tbody>
              </table>
              <hr>
              <dl class="dl-horizontal pull-right">
                <dt>Sub-total:</dt>
                <dd>${{ Cart::total() }}</dd>
                <dt>Total:</dt>
                <dd>${{ Cart::total() }}</dd>
              </dl>
              <div class="clearfix"></div>
          </div>
        </div>
      </div>

      <div class="panel-footer">
        <div class="row">
          <div class="col-lg-12">

            <input type="hidden" name="axn" value="ADD">
            <input type="hidden" name="acc_id" value="4750706">
            <input type="hidden" name="extraPar" value="">
            <input type="hidden" name="url_succesfull" value="http://www.blumimax.com/mp/exitoso">
            <input type="hidden" name="url_cancel" value="http://www.blumimax.com/mp/cancelado">
            <input type="hidden" name="url_process" value="http://www.blumimax.com/mp/enproceso">

            <input type="hidden" name="item_id" value="1">
            <input type="hidden" name="name" value="Carrito de Compras de Blumimax">
            <input type="hidden" name="currency" value="ARG">
            <input type="hidden" name="price" value="{{ Cart::total() }}">
            <input type="hidden" name="enc" value="8MwUvwu7%2F12JB1b0MsdKagkM8II%3D">

            <input type="hidden" name="ship_cost_mode" value="">
            <input type="hidden" name="op_retira" value="O">

            <div class="row">
              <div class="col-xs-12 col-sm-6">
                {{ HTML::link('/', 'Continuar comprando', array('class'=>'btn btn-default')) }}
              </div>
              <div class="col-xs-12 col-sm-6">
                <input type="submit" value="Comprar con MERCADO PAGO" class="btn btn-success pull-right hidden-xs">
                <input type="submit" value="Comprar con MERCADO PAGO" class="btn btn-success pull-left visible-xs">
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </form>

  </div>


@stop