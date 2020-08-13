@extends('layouts.master')

@section('title', 'Show Product')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <form class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">CATEGORY:</label>
                                <select style="height:20%" name="category_id" id="category_id" class="form-control{{$errors->has('category_id') ? 'is-invalid' : ''}}" disabled>
                                    <option value="{{ $data->category_id }}">{{ $data->category->category_name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <div class="form-group">
                                <label for="brand_id">BRAND:</label>
                                <select style="height:20%" name="brand_id" id="brand_id" class="form-control {{$errors->has('brand_id') ? 'is-invalid' : ''}}" disabled>
                                    <option value="{{ $data->brand_id }}">{{ $data->brand->brand_name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="sub_category">SUB CATEGORY:</label>
                                <select style="height:20%" name="sub_category" id="sub_category" class="form-control{{$errors->has('sub_category') ? 'is-invalid' : ''}}" disabled>
                                    <option value="{{ $data->sub_category_id }}">{{ $data->subcategory->subcategory_name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <div class="form-group">
                                <label for="color_id">PRODUCT COLOR:</label>
                                <select style="height:20%" name="color_id" id="color_id" class="form-control {{$errors->has('color_id') ? 'is-invalid' : ''}}" disabled>
                                    <option value="{{ $data->color_id }}">{{ $data->color->color_name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="classification_id">CLASSIFICATION:</label>
                                <select style="height:20%" name="classification_id" id="classification_id" class="form-control {{$errors->has('classification_id') ? 'is-invalid' : ''}}" disabled>
                                    <option value="{{ $data->classification_id }}">{{ $data->classification->classification_name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <div class="form-group">
                                <label for="unit_id">UNIT:</label>
                                <select style="height:20%" name="unit_id" id="unit_id" class="form-control {{$errors->has('unit_id') ? 'is-invalid' : ''}}" disabled>
                                    <option value="{{ $data->unit_id }}">{{ $data->unit->unit_name }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="product_code">PRODUCT CODE:</label>
                                <input type="text" name="product_code" id="product_code" value={{ $data->product_code }} class="form-control {{$errors->has('product_code') ? 'is-invalid' : ''}}" disabled>
                                @if($errors->has('product_code'))
                                    <span class="invalid-feedback">
                                        <strong>{{$errors->first('product_code')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-6 ml-auto">
                            <label for="country_name">PRODUCT QUANTITY:</label>
                            <input type="number" name="product_qty" id="product_qty" value="{{ $data->quantity }}" class="form-control col-md-5 {{$errors->has('product_qty') ? 'is-invalid' : ''}}" disabled>
                            @if($errors->has('product_qty'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('product_qty')}}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="product_name">PRODUCT NAME:</label>
                            <input type="text" name="product_name" id="product_name" value="{{ $data->product_name }}"class="form-control {{$errors->has('product_name') ? 'is-invalid' : ''}}" disabled>
                            @if($errors->has('product_name'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('product_name')}}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="description">DESCRIPTION:</label>
                            <textarea name="description" class="form-control" id="description" cols="30" rows="10" disabled>{{ $data->description }}</textarea>
                            @if($errors->has('description'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('description')}}</strong>
                            </span>
                            @endif
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="length" class="col-md-5">LENGTH:</label>
                            <div class="input-group col-md-5">
                                <input type="number" name="length" id="length" value="{{ $data->length }}" class="form-control {{$errors->has('length') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2" disabled>
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
                            <label for="width" class="col-md-5">WIDTH:</label>
                            <div class="input-group col-md-5">
                                <input type="number" name="width" id="width" value="{{ $data->width }}" class="form-control {{$errors->has('width') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2" disabled>
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
                            <label for="weight" class="col-md-5">WEIGHT:</label>
                            <div class="input-group col-md-5">
                                <input type="number" name="weight" id="weight" value="{{ $data->weight }}" class="form-control {{$errors->has('weight') ? 'is-invalid' : ''}}" aria-describedby="kg" disabled>
                                <select style="height:20%" name="scale" id="scale" class="form-control col-md-3 {{$errors->has('scale') ? 'is-invalid' : ''}}" disabled>
                                    <option value="{{ $data->scale }}">{{ $data->scale }}</option>
                                </select>
                            </div>
                            @if($errors->has('length'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('length')}}</strong>
                            </span>
                            @endif
                        </div>
                        <div class="col-md-6 ml-auto">
                            <label for="height" class="col-md-5">HEIGHT:</label>
                            <div class="input-group col-md-5">
                                <input type="number" name="height" id="height" value="{{ $data->height }}" class="form-control {{$errors->has('height') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2" disabled>
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
                            <label for="price_min" class="col-md-5">PRICE MINIMUM:</label>
                            <div class="input-group col-md-5">
                                <input type="number" step="0.01" value="{{ $data->price_min }}" name="price_min" id="price_min" class="form-control {{$errors->has('price_min') ? 'is-invalid' : ''}}" disabled>
                            @if($errors->has('price_min'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('price_min')}}</strong>
                            </span>
                            @endif
                            </div> 
                        </div>
                        <div class="col-md-6 ml-auto">
                            <label for="price_max" class="col-md-5">PRICE MAXIMUM:</label>
                            <div class="input-group col-md-5">
                                <input type="number" step="0.01" value="{{ $data->price_max }}" name="price_max" id="price_max" class="form-control {{$errors->has('price_max') ? 'is-invalid' : ''}}" disabled>
                            @if($errors->has('price_max'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('price_max')}}</strong>
                            </span>
                            @endif
                            </div>       
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
    
@endsection