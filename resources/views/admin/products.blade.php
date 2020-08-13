@extends('layouts.mastershop')

@section('title', 'Manage Products')

@section('content')

<div class="row mt-15 mb-3">
    <div class="col-sm">
        <h1>Manage Products</h1>
    </div>
    <div class="col-sm">
        <button type="button" class="btn btn-dark float-right" data-toggle="modal" data-target="#exampleModalCenter">
        Add Product
        </button>
    </div>
</div>
<!-- Button trigger modal -->


<table class="table">
    <thead class="thead-light">
        <tr>
            <th scope="col" colspan="1">Item</th>
            <th scope="col">Price</th>
            <th scope="col">Action</th>
        </tr>
            </thead>
    <tbody>
        @foreach($products as $product)
        <tr>
            <td>{{$product->title}}</td>
            <td>&#8369;{{$product->price}}.00</td>
            <td>
                <div class="row">
                    <a class="btn btn-dark btn-sm" href="{{route('product', $product->id)}}"><i class="fas fa-eye"></i></a>&nbsp;
                    <a class="btn btn-dark btn-sm" href="{{route('editProduct', $product->id)}}"><i class="fas fa-edit"></i></a>&nbsp;
                    <form action="{{route('deleteProduct', $product->id)}}" method="post">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-dark btn-sm"><i class="fas fa-trash-alt"></i></button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $products->links() }}

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="item">Item name</label>
                        <input type="text" name="title" id="" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{old('title')}}" autofocus>
                        @if($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('title')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="item">Price</label>
                        <input type="text" name="price" id="" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" value="{{old('price')}}">
                        @if($errors->has('price'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('price')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="item">Item Description</label>
                        <input type="text" name="desc" id="" class="form-control {{$errors->has('desc') ? 'is-invalid' : ''}}" value="{{old('desc')}}">
                        @if($errors->has('desc'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('desc')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="image" id="" class="form-control {{$errors->has('image') ? 'is-invalid' : ''}}">
                        @if($errors->has('image'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('image')}}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    <div class="field_wrapper form-group">
                        <label for="item">Add Attributes</label>
                        <div class="row">
                            <div class="col-5">
                                <input class="form-control {{$errors->has('size.0') ? 'is-invalid' : ''}}" type="text" name="size[]" value="" placeholder="Size">
                                @if($errors->has('size.0'))
                                    <span class="invalid-feedback">
                                        <strong>{{$errors->first('size.0')}}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-5">
                                <input class="form-control {{$errors->has('stock.0') ? 'is-invalid' : ''}}" type="text" name="stock[]" value="" placeholder="Stock">
                                @if($errors->has('stock.0'))
                                    <span class="invalid-feedback">
                                        <strong>{{$errors->first('stock.0')}}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-2 align-self-center">
                                <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus-circle"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-dark">Save changes</button>
                    </div>                    
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script type="text/javascript">
$(document).ready(function(){
    var maxField = 6; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
    var fieldHTML = '<div style="margin-top:1%;" class="form-group"><div class="row"><div class="col-5"><input class="form-control" type="text" name="size[]" value="" placeholder="Size"></div><div class="col-5"><input class="form-control" type="text" name="stock[]" value="" placeholder="Stock"></div><div class="col-2 align-self-center"><a href="javascript:void(0);" class="remove_button"><i class="fas fa-minus-circle"></i></a></div></div></div>';

    var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields  
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
</script>
@endsection