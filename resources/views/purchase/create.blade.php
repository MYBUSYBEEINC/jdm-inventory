@extends('layouts.master')

@section('title', 'Purchase Order')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form class="form-group" action="{{route('purchase.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="supplier_id">SUPPLIER NAME:</label>
                            <select style="height:20%" name="supplier_id" id="supplier_id" class="form-control {{$errors->has('supplier_id') ? 'is-invalid' : ''}}" required>
                                <option disabled selected value> -- select an option -- </option>
                                @foreach($suppliers as $supplier)
                                <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <div class="form-group">
                                <label for="req_branch">REQUESTED BRANCH:</label>
                            <select style="height:20%" name="req_branch" id="req_branch" class="form-control {{$errors->has('req_branch') ? 'is-invalid' : ''}}" required>
                                <option disabled selected value> -- select an option -- </option>
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            </div>     
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="del_branch">DELIVER TO BRANCH:</label>
                            <select style="height:20%" name="del_branch" id="del_branch" class="form-control {{$errors->has('del_branch') ? 'is-invalid' : ''}}" required>
                                <option disabled selected value> -- select an option -- </option>
                                @foreach($branches as $branch)
                                <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <div class="form-group">
                                <label for="requested_by">REQUESTED BY:</label>
                                <input type="text" name="requested_by" id="requested_by" class="form-control {{$errors->has('requested_by') ? 'is-invalid' : ''}}" value="{{ Auth::user()->name }}" readonly>
                                @if($errors->has('requested_by'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('requested_by')}}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <input type="hidden" name="count" id="inc" value="1">
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price Minimum</th>
                                        <th>Price Maximum</th>
                                        <th style="text-align: center"><a href="#" data-count="1" id="addForm" class="btn btn-info addRow"><i class="fas fa-plus-circle"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
                
            </div>
        </div>
    </div>
</div>



<script>

</script>
<script>
    $(document).on('change', '.product_name', function(e){
    
    $curr_count = $(this).data('count');
    var price = $(this).children('option:selected').data('price');
    var pricemax = $(this).children('option:selected').data('pricemax');
    $('#price_min'+$curr_count).val(price);
    $('#price_max'+$curr_count).val(pricemax);



});
    $(document).ready(function(){
        $(document).on('click', '#addForm', function(e){
        $curr_count = $('#inc').val();
        addRow($curr_count);
        $('#inc').val( +$curr_count+ 1)
        var row_counter = $curr_count;
        });

            function addRow($curr_count){
            var tr = '<tr class="product-row">'+
                            '<td>'+
                                '<select data-count="'+$curr_count+'" style="height:20%" name="product_name[]" id="product_name'+$curr_count+'" class="form-control product_name {{$errors->has('unit_id') ? 'is-invalid' : ''}}">'+
                                    '<option disabled selected value> -- select an option -- </option>'+
                                        @foreach($products as $product)
                                            '<option value="{{ $product->id }}" data-price="{{ $product->price_min }}" data-pricemax="{{ $product->price_max }}" >{{ $product->product_name }}</option>'+
                                        @endforeach
                                '</select>'+
                            '</td>'+
                            '<td><input type="number" class="form-control" id="quantity'+$curr_count+'" name="quantity[]"></td>'+
                            '<td><input type="number" class="form-control price_min" id="price_min'+$curr_count+'" name="price_min[]" readonly></td>'+
                            '<td><input type="number" class="form-control price_max" id="price_max'+$curr_count+'" name="price_max[]" readonly></td>'+
                            '<td style="text-align: center"><a href="#" class="btn btn-danger remove"><i class="fas fa-minus"></i></a></td>'+
                     '</tr>';
                $('tbody').append(tr);                          
            }                            
        $('tbody').on('click', '.remove', function(){
            $(this).parent().parent().remove();
        });
    });
</script>


@endsection