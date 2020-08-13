@extends('layouts.mastershop')

@section('title', 'Home - JDM Techno Computer Center')

@section('content')
<a class="btn btn-outline-warning mt-15 btnblk mb-3" href="{{route('shop')}}"><i class="fas fa-angle-left"></i> Continue Shopping</a>


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm align-self-center d-flex justify-content-center">
                <div class="exzoom hidden" id="exzoom">
                    <div class="exzoom_img_box">
                        <ul class='exzoom_img_ul'>
                            @foreach($productImages as $image)
                                <li><img src="{{asset('images/'.$image->image)}}" class=""/></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="exzoom_nav"></div>
                    <p class="exzoom_btn">
                        <a href="javascript:void(0);" class="exzoom_prev_btn btn btn-dark btn-sm"><i class="fas fa-angle-left"></i></a>
                        <a href="javascript:void(0);" class="exzoom_next_btn btn btn-dark btn-sm"><i class="fas fa-angle-right"></i></a>
                    </p>
                </div>
            </div>
            <div class="col-sm">
                <h3 class="mt-3 text-info">{{$product->product_name}}</h3>
                <p>{{$product->description}}</p>
                <hr>
                <p>{{$product->category->category_name}}</p>
                <p>{{$product->subcategory->subcategory_name}}</p>
                <p>{{$product->subsubcategory->subsubcategory_name}}</p>
                <hr>                
                <h4>&#8369; {{number_format($product->price_min, 2, '.', ',')}}</h4>
                <hr>
                <div class="form-inline">
                    <h6>Quantity</h6>            
                </div>
                <form action="{{route('atc', $product->id)}}" method="post">
                    <div class="form-inline">
                    {{csrf_field()}}
                        <button type="button" id="minus" class="btn btn-dark btn-sm"><i class="fas fa-minus"></i></button>
                        <input type="text" name="quantity" id="qtyy" class="form-control form-control-sm col-1" value="1" style="margin:0px 10px 0px 10px; padding:5px 0px 5px 0px; text-align:center">
                        <button type="button" id="plus" class="btn btn-dark btn-sm"><i class="fas fa-plus"></i></button>        
                    </div>
                <hr>
                <div class="row">
                    <div class="col-sm mb-1">
                        <button type="submit" class="btn btn-outline-success btn-block">Add to cart</button>
                    </div>
                </form>          
                    <div class="col-sm">
                        @if($status == 0)
                        <a href="" class="btn btn-outline-danger btn-block">Add to Wishlist</a>
                        @else
                        <form action="" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="dwlProduct">
                            <button type="submit" class="btn btn-outline-dark btn-block"><i class="fas fa-heart fa-lg"></i></button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<h2 class="my-5 ml-3">You may also like</h2>

@foreach($suggested->chunk(3) as $prodChunk)
<div class="mt-5 mx-0 row">
    @foreach($prodChunk as $product)
    <div class="col-sm-4 mb-2">
        <div class="card h-100">
            <img src="{{asset('/images/'.$product->image)}}" class="card-img-top" alt="image">
            <div class="card-body">
                <h5 class="card-title text-info">{{$product->product_name}}</h5>
            </div>
            <div class="card-footer bg-white">
                <div class="row">
                    <div class="col-sm d-flex text-dark font-weight-bold mt-3 jus-con-cen">
                        <p class=" txtctr"><strong>&#8369; {{number_format($product->price_min, 2, '.', ',')}}</strong></p>
                    </div>
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end">
                            <a href="{{route('viewprod', $product->id)}}" class="btn btn-outline-info btn-block"><i class="fas fa-eye"></i>View</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endforeach
{{ $suggested->links() }}

@endsection

@section('scripts')
<script>
$(document).ready(function(){
    var quantity = $('#qtyy').val();

    if(quantity == 1)
    {
        document.getElementById('minus').disabled = true;
    }

    $('#plus').click(function(){
        var quantity = $('#qtyy').val();
        quantity++;
        if(quantity == 10)
        {
            document.getElementById('plus').disabled = true;
        }
        else
        {
            document.getElementById('plus').disabled = false;
            document.getElementById('minus').disabled = false;
        }
        document.getElementById('qtyy').value = quantity;
    });

    $('#minus').click(function(){
        var quantity = $('#qtyy').val();
        quantity--;
        if(quantity == 1)
        {
            document.getElementById('minus').disabled = true;
        }
        else
        {
            document.getElementById('minus').disabled = false;
            document.getElementById('plus').disabled = false;
        }
        document.getElementById('qtyy').value = quantity;
    });
})
</script>

<script>
$(document).ready(function(){
    $('.container').imagesLoaded( function() {
        $("#exzoom").exzoom({
            autoPlay: false,
        });
        $("#exzoom").removeClass('hidden')
    });
})
</script>
@endsection