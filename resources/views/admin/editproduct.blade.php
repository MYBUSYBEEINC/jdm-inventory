@extends('layouts.mastershop')

@section('title', 'Edit Product')

@section('content')
<div class="row mt-15 mb-3">
    <div class="col">
        <h1 class="txtctr">Edit product</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <a class="btn btn-outline-warning btnblk" href="{{route('admin.index')}}"><i class="fas fa-angle-left"></i> Dashboard</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route('editProduct', $product->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Item name</label>
                        <input type="text" name="title" id="" class="form-control {{$errors->has('title') ? 'is-invalid' : ''}}" value="{{$product->title}}" placeholder="Item name" autofocus>
                        @if($errors->has('title'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('title')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Item description</label>
                        <input type="text" name="desc" id="" class="form-control {{$errors->has('desc') ? 'is-invalid' : ''}}" value="{{$product->desc}}" placeholder="Item description">
                        @if($errors->has('desc'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('desc')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Item price</label>
                        <input type="text" name="price" id="" class="form-control {{$errors->has('price') ? 'is-invalid' : ''}}" value="{{$product->price}}" placeholder="Item price">
                        @if($errors->has('price'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('price')}}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="imageEdit" id="" class="form-control {{$errors->has('imageEdit') ? 'is-invalid' : ''}}">
                        @if($errors->has('imageEdit'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('imageEdit')}}</strong>
                            </span>
                        @endif
                    </div>
                    <hr>
                    @foreach($product['attributes'] as $atts)
                    <div class="form-group">
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="colFormLabel" class="">Size</label>
                                    <input type="text" name="size[]" id="" class="form-control" value="{{$atts->size}}" placeholder="Size">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="colFormLabel" class="">Stock</label>
                                    <input type="text" name="stock[]" id="" class="form-control" value="{{$atts->stock}}" placeholder="Stock">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="idAtts[]" value="{{$atts->id}}">
                    @endforeach
                    <button type="submit" class="btn btn-outline-dark btn-block">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="card">
            <div class="card-body">
                <form action="{{route('addProductImage', $product->id)}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Image</label>
                        <input type="file" name="imageAdd" id="" class="form-control {{$errors->has('imageAdd') ? 'is-invalid' : ''}}">
                        @if($errors->has('imageAdd'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('imageAdd')}}</strong>
                            </span>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-outline-dark btn-block">Add Image</button>
                </form>
            </div>
        </div>
    </div>
</div>
<table class="table">
    <thead>
        <tr>
            <th colspan="1" scope="col">Image</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($productImages as $img)
        <tr>
            <th colspan="1" scope="row"><img src="{{asset('/images/'.$img->image)}}" height="35%" alt=""></th>
            <td>
                <form action="{{route('deleteProductImage', $img->id)}}" method="post">
                    {{csrf_field()}}
                    <button class="btn btn-dark btn-block" type="submit"><i class="fas fa-trash-alt fa-lg"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection