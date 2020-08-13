@extends('layouts.mastershop')

@section('title', 'My Cart')

@section('content')

@if(Session::has('cart'))

<a class="btn btn-outline-warning mt-15 btnblk" href="{{route('shop')}}"><i class="fas fa-angle-left"></i> Continue Shopping</a>

<div class="row mt-3 mt-14">
  <div class="col-sm-8 mb-3">
    <div class="card">
      <div class="card-body">
        <?php $total = 0; 
              $subtotal = 0;
        ?>
      @foreach(Session::get('cart') as $product)
        <?php $subtotal == $product['price_min'] * $product['quantity'];
              $total += $product['price_min'] * $product['quantity']; 
              
        ?>
        <div class="row">
          <div class="col-sm-3 d-flex align-items-center justify-content-center">
            <a href="{{route('viewprod', $product['id'])}}"><img class="" src="{{asset('images/'.$product['image'])}}" width="100px" height="100px" alt="Image" ></a>
          </div>
          <div class="col-sm mt-3 txtctr">
            <div class="row">
              <div class="col-sm">
                <a href="{{route('viewprod', $product['id'])}}"><p class="">{{$product['product_name']}}</p></a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-2">
                <a href="{{route('removeItem', $product['id'])}}" data-toggle="tooltip" data-placement="right" title="Remove from cart"><i class="fas fa-trash-alt fa-lg"></i></a>
              </div>
            </div>
          </div>
          <div class="col-sm-2 mt-3 txtctr">
            <p class="">&#8369; {{$product['price_min']}}</p>
          </div>
          <div class="col-sm-3 d-flex justify-content-center mt-2">
            <div class="d-flex bd-highlight">
              <div class="p-2 flex-fill bd-highlight"><a class="btn btn-dark btn-sm" href="{{route('minus', $product['id'])}}"><i class="fas fa-minus"></i></a></div>
              <div class="p-2 flex-fill bd-highlight">{{$product['quantity']}}</div>
              <div class="p-2 flex-fill bd-highlight"><a class="btn btn-dark btn-sm" href="{{route('add', $product['id'])}}"><i class="fas fa-plus"></i></a></div>
            </div>
          </div>
        </div>
        <hr>
      @endforeach
      </div>
    </div>  
  </div>

  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h4>Order Summary</h4>
        <div class="row ">
          <div class="col-sm">
            <p class="mt-3">Subtotal</p>
          </div>
          <div class="col-sm">
            @foreach(Session::get('cart') as $product)
            <p class="mt-3 d-flex justify-content-sm-end text-dark">&#8369; {{$product['price_min'] * $product['quantity']}}.00</p>
            @endforeach
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-sm">
            <p class="mt-3">Total</p>
          </div>
          <div class="col-sm">
            <p class="mt-3 d-flex justify-content-sm-end text-dark">&#8369; {{$total}}.00</p>          
          </div>
        </div>
        <div class="row">
          <div class="col-sm">
            <a href="{{route('checkout')}}" class="btn btn-dark btn-block">Checkout</a></td>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@else
<div class="mt-15">
<h1>No items in cart!</h1>
<a class="btn btn-outline-warning btnblk" href="/"><i class="fas fa-angle-left"></i> Back to Shopping</a>
</div>
@endif

@endsection