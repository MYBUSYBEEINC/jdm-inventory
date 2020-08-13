@extends('layouts.master')

@section('title', 'Pricing Masterfile')

@section('content')

<div class="row mt-5">
    <div class="col-sm-3 ml-auto">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Item</span>            
        </button>
    </div>  
</div>

<br>
<div class="row">
    <div class="col-sm-12">
        <div class="content-panel">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary text-warning">
                        <th>ID</th>
                        <th>Average Age</th>
                        <th>Quantity</th>
                        <th>Last Purchase Price</th>
                        <th>Ave Price</th>
                        <th>Margin Percentage</th>
                        <th>Margin Amount</th>
                        <th>Cash Price</th>
                        <th>RSP</th>
                        <th>Product Name</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($pricings as $item)
                        <tr>
                            <td class="font-weight-bold">{{$item->id}}</td>
                            <td>{{$item->ave_age}} Days</td>
                            <td>{{$item->quantity}}</td>
                            <td>&#8369; {{number_format($item->lpp, 2, '.', ',')}}</td>
                            <td>&#8369; {{number_format($item->ave_price, 2, '.', ',')}}</td>
                            <td>{{$item->margin_percent}}% 
                                <span>
                                    <a class="btn btn-warning btn-sm" data-toggle="modal" data-target="#percentModalCenter-{{$item->id}}"><i class="fa fa-percent"></i></a>
                                </span>
                            </td>
                            <td>&#8369; {{number_format($item->margin_amt, 2, '.', ',')}}</td>
                            <td>&#8369; {{number_format($item->cash_price, 2, '.', ',')}}</td>
                            <td>&#8369; {{number_format($item->reg_selling_price, 2, '.', ',')}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>
                                <div class="">
                                    <span>
                                        <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#stockModalCenter-{{$item->id}}"><i class="fa fa-plus"></i></a>
                                    </span>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
<div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="addModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Add New Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('pricing.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="product_name">Product Name:</label>
                        <input type="text" name="product_name" id="product_name" class="form-control {{$errors->has('product_name') ? 'is-invalid' : ''}}" autofocus>
                        @if($errors->has('product_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('product_name')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}" autofocus>
                        @if($errors->has('quantity'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('quantity')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" autofocus>
                        @if($errors->has('price'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('price')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                            <label for="margin_pct">Margin Percentage:(1%-100%)</label>
                            <input type="number" name="margin_pct" id="margin_pct" class="form-control {{$errors->has('margin_pct') ? 'is-invalid' : ''}}" autofocus>
                            @if($errors->has('margin_pct'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('margin_pct')}}</strong>
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">
                            <div class="form-group">
                            <label for="fdate">Date Bought</label>
                            <input type="date" name="fdate" id="fdate" class="form-control {{$errors->has('fdate') ? 'is-invalid' : ''}}" autofocus>
                            @if($errors->has('fdate'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('fdate')}}</strong>
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>


@foreach($pricings as $item)
<div class="modal fade" id="stockModalCenter-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="stockModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stockModalCenterTitle">Add New Stocks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('pricing.update', $item->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="product_id">Product Name:</label>
                        <input value="{{$item->product_name}}" type="text" name="product_id" id="product_id" class="form-control" autofocus readonly>
                        @if($errors->has('product_id'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('quantity')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity:</label>
                        <input type="number" name="quantity" id="quantity" class="form-control {{$errors->has('quantity') ? 'is-invalid' : ''}}" autofocus>
                        @if($errors->has('quantity'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('quantity')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="price">Price:</label>
                        <input type="number" name="price" id="price" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" autofocus>
                        @if($errors->has('price'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('price')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="fdate">Date Bought</label>
                        <input type="date" name="fdate" id="fdate" class="form-control {{$errors->has('fdate') ? 'is-invalid' : ''}}" autofocus>
                        @if($errors->has('fdate'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('fdate')}}</strong>
                        </span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@foreach($pricings as $item)
<div class="modal fade" id="percentModalCenter-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="stockModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="percentModalCenterTitle">Add New Stocks</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('pricing.updatepercent', $item->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="product_id">Product Name:</label>
                        <input value="{{$item->product_name}}" type="text" name="product_id" id="product_id" class="form-control" readonly>
                        @if($errors->has('product_id'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('quantity')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="percent">Margin Percentage:</label>
                        <input value="{{$item->margin_percent}}" type="number" name="percent" id="percent" class="form-control">
                        @if($errors->has('percent'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('percent')}}</strong>
                        </span>
                        @endif
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Update</button>
                </form>
            </div>
        </div>
    </div>














































































































