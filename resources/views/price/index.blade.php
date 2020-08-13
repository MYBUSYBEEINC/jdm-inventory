@extends('layouts.master')

@section('title', 'Product Price List')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="d-flex bd-highlight">
        <div class="p-2 flex-shrink-1 bd-highlight">
            <input type="text" name="searchajax" id="searchajax" placeholder="Search" class="form-control">
        </div>
        <div class="p-2 flex-shrink-1 bd-highlight">
        </div>
        <div class="p-2 flex-shrink-1 bd-highlight">    
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <h3 align="center">Total Data: <span id="total_records"></span></h3>
                    <table class="table table-bordered">
                        <thead class=" text-primary">
                            <th>PRODUCT CODE</th>
                            <th>PRODUCT NAME</th>
                            <th>BRAND</th>
                            <th>CATEGORY</th>
                            <th>QUANTITY</th>
                            <th>PRICE MIN</th>
                            <th>PRICE MAX</th>
                            <th>ACTION</th>
                        </thead>
                        <tbody>
                            @foreach($prices as $item)
                            <tr>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $prices->links() }}
            </div>
        </div>
    </div>
</div>

{{-- Edit Modal --}}

@foreach($prices as $item)
<div class="modal fade" id="addStockModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="addStockModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockModalTitle">Update Prices</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="qtyForm" action="{{route('price.update', $item->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="price_min">PRICE MINIMUM:</label>
                        <input step="0.01" type="number" id="price_min" name="price_min" value="{{ $item->price_min }}" class="form-control {{$errors->has('price_min') ? 'is-invalid' : ''}}">
                            @if($errors->has('price_min'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('price_min')}}</strong>
                            </span>
                            @endif
                    </div>
                    <div class="form-group">
                        <label for="price_max">PRICE MAXIMUM:</label>
                            <input step="0.01" type="number" id="price_max" name="price_max" value="{{ $item->price_max }}" class="form-control {{$errors->has('price_max') ? 'is-invalid' : ''}}">
                            @if($errors->has('price_max'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('price_max')}}</strong>
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
</div>
@endforeach
<script>
    $(document).ready(function(){
        
        fetch_product_data();

        function fetch_product_data(query = '')
        {
            $.ajax({
                url:"{{ route('live_search_price.action') }}",
                method:'GET',
                data:{query:query},
                dataType:'json',
                success:function(data)
                {
                    $('tbody').html(data.table_data);
                    $('#total_records').text(data.total_data);
                }
            });
        }

        $(document).on('keyup', '#searchajax', function(){
        var query = $(this).val();
        fetch_product_data(query);
        });
    });
</script>
@endsection