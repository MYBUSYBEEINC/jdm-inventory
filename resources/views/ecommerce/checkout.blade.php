@extends('layouts.mastershop')

@section('title', 'Checkout')

@section('content')
<div class="row mt-15">
    <div class="col-sm">

    </div>
    <div class="col-sm-4 mt-3">
        <h2 class="txtctr">Checkout</h2>
        <form action="{{route('checkout')}}" method="post" id="checkout-form">
        {{csrf_field()}}
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" name="address" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="address" placeholder="" autofocus>
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <label for="">Card Holder Name</label>
            <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" id="chn" placeholder="">
            @if($errors->has('name'))
                <span class="invalid-feedback">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
        <div class="form-group">
            <div id="card-element">
                <!-- A Stripe Element will be inserted here. -->
            </div>
        </div>
        <button type="submit" class="btn btn-outline-dark btn-block">Purchase</button>
        </form>
    </div>
    <div class="col-sm">
        
    </div>
</div>


@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v3/"></script>
<script type="text/javascript" src="{{asset('js/checkout.js')}}"></script>
@endsection