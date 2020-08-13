@extends('layouts.master')

@section('title', 'Edit Product')

@section('content')


    <div class="content-panel">
        <form action="{{route('editProduct', $product->id)}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="mt-3 mb-3 ml-3 mr-3">
            <div class="">
                <div class="col">
                    <h1 class="txtctr">Edit product</h1>
                </div>
                <div class="col d-flex justify-content-end">
                    <a class="btn btn-warning btnblk" href="{{route('home')}}"><i class="fa fa-angle-left"></i> Dashboard</a>
                </div>
            </div>
            <div class="form-group">
                <label for="category_id">CATEGORY:</label>
                <select style="height:20%" name="category_id" id="category_id" class="form-control{{$errors->has('category_id') ? 'is-invalid' : ''}}">
                    <option style="display:none;" value="{{ $product->category_id }}">{{ $product->category->category_name }}</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="brand_id">BRAND:</label>
                <select style="height:20%" name="brand_id" id="brand_id" class="form-control {{$errors->has('brand_id') ? 'is-invalid' : ''}}">
                    <option style="display:none;" value="{{ $product->brand_id }}">{{ $product->brand->brand_name }}</option>
                    @foreach($brands as $brand)
                    <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subcategory_id">SUB CATEGORY:</label>
                <select style="height:20%" name="subcategory_id" id="subcategory_id" class="form-control{{$errors->has('subcategory_id') ? 'is-invalid' : ''}}">
                    <option style="display:none;" value="{{ $product->sub_category_id }}">{{ $product->subcategory->subcategory_name }}</option>
                    @foreach($subcategories as $subcategory)
                    <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="subsubcategory_id">SUB SUB CATEGORY:</label>
                <select style="height:20%" name="subsubcategory_id" id="subsubcategory_id" class="form-control{{$errors->has('subsubcategory_id') ? 'is-invalid' : ''}}">
                    <option style="display:none;" value="{{ $product->subsubcategory_id }}">{{ $product->subsubcategory->subsubcategory_name }}</option>
                    @foreach($subsubcategories as $subsubcategory)
                    <option value="{{ $subsubcategory->id }}">{{ $subsubcategory->subsubcategory_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="color_id">PRODUCT COLOR:</label>
                <select style="height:20%" name="color_id" id="color_id" class="form-control {{$errors->has('color_id') ? 'is-invalid' : ''}}">
                    <option style="display:none;" value="{{ $product->color_id }}">{{ $product->color->color_name }}</option>
                    @foreach($colors as $color)
                    <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="classification_id">CLASSIFICATION:</label>
                <select style="height:20%" name="classification_id" id="classification_id" class="form-control {{$errors->has('classification_id') ? 'is-invalid' : ''}}">
                    <option style="display:none;" value="{{ $product->classification_id }}">{{ $product->classification->classification_name }}</option>
                    @foreach($classifications as $classification)
                    <option value="{{ $classification->id }}">{{ $classification->classification_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="unit_id">UNIT:</label>
                <select style="height:20%" name="unit_id" id="unit_id" class="form-control {{$errors->has('unit_id') ? 'is-invalid' : ''}}">
                    <option style="display:none;" value="{{ $product->unit_id }}">{{ $product->unit->unit_name }}</option>
                    @foreach($units as $unit)
                    <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                    @endforeach
                </select>
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
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="product_code">PRODUCT CODE:</label>
                        <input type="text" name="product_code" id="product_code" value="{{ $product->product_code }}" class="form-control {{$errors->has('product_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('product_code'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('product_code')}}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <div class="col-md-6 ml-auto">
                    <label for="country_name">PRODUCT QUANTITY:</label>
                    <input type="number" name="product_qty" id="product_qty" value="{{ $product->quantity }}" class="form-control col-md-8 {{$errors->has('product_qty') ? 'is-invalid' : ''}}">
                    @if($errors->has('product_qty'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('product_qty')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div>
                <label for="product_name">PRODUCT NAME:</label>
                <input type="text" name="product_name" id="product_name" value="{{ $product->product_name }}" class="form-control {{$errors->has('product_name') ? 'is-invalid' : ''}}">
                @if($errors->has('product_name'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('product_name')}}</strong>
                    </span>
                @endif
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="price_min">PRICE MINIMUM:</label>
                    <input type="number" step="0.01" name="price_min" id="price_min" value="{{ $product->price_min }}" class="form-control {{$errors->has('price_min') ? 'is-invalid' : ''}}">
                    @if($errors->has('price_min'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('price_min')}}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-md-6 ml-auto">
                    <label for="price_max">PRICE MAXIMUM:</label>
                    <input type="number" step="0.01" name="price_max" id="price_max" value="{{ $product->price_max }}" class="form-control  {{$errors->has('price_max') ? 'is-invalid' : ''}}">
                    @if($errors->has('price_max'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('price_max')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="length">LENGTH:</label>
                    <div class="input-group">
                        <input type="number" name="length" id="length" value="{{ $product->length }}" class="form-control {{$errors->has('length') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                    @if($errors->has('length'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('length')}}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-md-6 ml-auto">
                    <label for="width">WIDTH:</label>
                    <div class="input-group">
                        <input type="number" name="width" id="width" value="{{ $product->width }}" class="form-control {{$errors->has('width') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                    @if($errors->has('width'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('width')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="weight">WEIGHT:</label>
                    <div class="input-group">
                        <input type="number" name="weight" id="weight" value="{{ $product->weight }}" class="form-control {{$errors->has('weight') ? 'is-invalid' : ''}}" aria-describedby="kg">
                        <select style="height:20%" name="scale" id="scale" class="form-control col-md-3 {{$errors->has('scale') ? 'is-invalid' : ''}}">
                            <option value="kg">kg</option>
                            <option value="g">g</option>
                            <option value="lbs">lbs</option>
                        </select>
                    </div>
                    @if($errors->has('length'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('length')}}</strong>
                    </span>
                    @endif
                </div>
                <div class="col-md-6 ml-auto">
                    <label for="height">HEIGHT:</label>
                    <div class="input-group">
                        <input type="number" name="height" id="height" value="{{ $product->height }}" class="form-control {{$errors->has('height') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <span class="input-group-text" id="basic-addon2">cm</span>
                        </div>
                    </div>
                    @if($errors->has('height'))
                    <span class="invalid-feedback">
                        <strong>{{$errors->first('height')}}</strong>
                    </span>
                    @endif
                </div>
            </div>
            <hr>
            <div class="">
                <label for="description">DESCRIPTION:</label>
                    <textarea name="description" class="form-control" id="description" cols="10" rows="10">{{ $product->description }}</textarea>
                @if($errors->has('description'))
                <span class="invalid-feedback">
                    <strong>{{$errors->first('description')}}</strong>
                </span>
                @endif
            </div>
            <button type="submit" class="btn mt-2 btn-success btn-block">Save Changes</button>
        </div>
        
    </div>
</form>

<div class="content-panel">
    <div class="mt-3 mb-3 ml-3 mr-3">
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
            <button type="submit" class="btn btn-success btn-block">Add Image</button>
        </form>
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
                            <button class="btn btn-dark btn-block" type="submit"><i class="fa fa-trash fa-lg"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection