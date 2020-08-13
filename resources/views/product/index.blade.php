@extends('layouts.master')

@section('title', 'Product Masterfile')

@section('content')

<div class="row">
    <div class="col-sm-12">
        <div class="d-flex bd-highlight">
            <div class="p-2 flex-shrink-1 bd-highlight">
                <input type="text" name="searchajax" id="searchajax" placeholder="Search" class="form-control">
            </div>
            <div class="p-2 flex-shrink-1 bd-highlight">
            </div>
            <div class="p-2 flex-shrink-1 bd-highlight">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalCenter">
                    <span>Add New Product</span>
                </button>


            </div>
            {{-- <div class="p-2 flex-shrink-1 bd-highlight">
                <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#addStockModal">
                    <span>Add Stock</span>
                </button>
            </div> --}}
            <div class="p-2 flex-shrink-1 bd-highlight">    
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Modal Header</h4>
        </div>
        <div class="modal-body">
          <p>Some text in the modal.</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="content-panel">
            <div class="table-responsive">
                <h3 align="center">Total Data: <span id="total_records"></span></h3>
                <table class="table table-bordered">
                    <thead class=" text-primary">
                        <th>PRODUCT CODE</th>
                        <th>PRODUCT NAME</th>
                        <th>BRAND</th>
                        <th>CATEGORY</th>
                        <th>SUBCATEGORY</th>
                        <th>SUBSUBCATEGORY</th>
                        <th>CLASSIFICATION</th>
                        <th>COLOR</th>
                        <th>UNIT</th>
                        <th>QUANTITY</th>
                        <th>PRICE MIN</th>
                        <th>PRICE MAX</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        @foreach($products as $item)
                        <tr>
                            <td class="font-weight-bold">{{$item->product_code}}</td>
                            <td>{{$item->product_name}}</td>
                            <td>{{$item->brand->brand_name}}</td>
                            <td>{{$item->category->category_name}}</td>
                            <td>{{$item->subcategory->subcategory_name}}</td>
                            <td>{{$item->subsubcategory->subsubcategory_name}}</td>
                            <td>{{$item->classification->classification_name}}</td>
                            <td>{{$item->color->color_name}}</td>
                            <td>{{$item->unit->unit_name}}</td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->price_min}}</td>
                            <td>{{$item->price_max}}</td>
                            <td class="text-right">
                                <div class="d-flex bd-highlight my-1">
                                    <div class="">
                                        <span>
                                            <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addStockModal-{{$item->id}}"><i class="fa fa-plus"></i></a>
                                        </span>
                                    </div>
                                    <div class="">
                                        <span>
                                            {{-- <button type="button" class="btn-sm btn-warning" data-toggle="modal" data-target="#editProductModal-'.$row->id.'"><i class="fas fa-edit"></button> --}}
                                            <a class="btn btn-warning btn-sm" href="{{route('editProduct', $item->id)}}"><i class="fa fa-edit"></i></a>&nbsp;
                                        </span>
                                    </div>
                                    <div class="">
                                        <span>
                                            <a href="#" data-name="" data-href="" class="btn btn-danger btn-sm deleteEmp" data-toggle="modal" data-target="#deleteModalCenter"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </div>
                                  </div>


                                {{-- <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                    <span>
                                        <button type="button" class="btn-sm btn-primary" data-toggle="modal" data-target="#addStockModal-{{$item->id}}"><i class="fas fa-plus"></i></button>
                                    </span>
                                    </div>
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                        <span>
                                            <button type="button" class="btn-sm btn-warning" data-toggle="modal" data-target="#editProductModal-'.$row->id.'"><i class="fas fa-edit"></button>
                                            <a class="btn btn-dark btn-sm" href="{{route('editProduct', $item->id)}}"><i class="fas fa-edit"></i></a>&nbsp;
                                        </span>
                                    </div>

                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                    </div>
                                </div> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ $products->links() }}
        </div>
    </div>
</div>

<!-- Create Modal -->

<div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="addModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Add New Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('product.create')}}" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="category_id">CATEGORY:</label>
                                    <select style="height:20%" name="category_id" id="category_id" class="form-control{{$errors->has('category_id') ? 'is-invalid' : ''}}">
                                        <option disabled selected value> -- select an option -- </option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7 ml-auto">
                                <div class="form-group">
                                    <label for="brand_id">BRAND:</label>
                                    <select style="height:20%" name="brand_id" id="brand_id" class="form-control {{$errors->has('brand_id') ? 'is-invalid' : ''}}">
                                        <option disabled selected value> -- select an option -- </option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_category">SUB CATEGORY:</label>
                                    <select style="height:20%" name="sub_category" id="sub_category" class="form-control{{$errors->has('sub_category') ? 'is-invalid' : ''}}">
                                        <option disabled selected value> -- select an option -- </option>
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="form-group">
                                    <label for="color_id">PRODUCT COLOR:</label>
                                    <select style="height:20%" name="color_id" id="color_id" class="form-control {{$errors->has('color_id') ? 'is-invalid' : ''}}">
                                        <option disabled selected value> -- select an option -- </option>
                                        @foreach($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="subsubcategory_id">SUB SUB CATEGORY:</label>
                                    <select style="height:20%" name="subsubcategory_id" id="subsubcategory_id" class="form-control{{$errors->has('subsubcategory_id') ? 'is-invalid' : ''}}">
                                        <option disabled selected value> -- select an option -- </option>
                                        @foreach($subsubcategories as $subsubcategory)
                                        <option value="{{ $subsubcategory->id }}">{{ $subsubcategory->subsubcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="classification_id">CLASSIFICATION:</label>
                                    <select style="height:20%" name="classification_id" id="classification_id" class="form-control {{$errors->has('classification_id') ? 'is-invalid' : ''}}">
                                        <option disabled selected value> -- select an option -- </option>
                                        @foreach($classifications as $classification)
                                        <option value="{{ $classification->id }}">{{ $classification->classification_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="form-group">
                                    <label for="unit_id">UNIT:</label>
                                    <select style="height:20%" name="unit_id" id="unit_id" class="form-control {{$errors->has('unit_id') ? 'is-invalid' : ''}}">
                                        <option disabled selected value> -- select an option -- </option>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_code">PRODUCT CODE:</label>
                                    <input type="text" name="product_code" id="product_code" class="form-control {{$errors->has('product_code') ? 'is-invalid' : ''}}">
                                    @if($errors->has('product_code'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('product_code')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label for="country_name">PRODUCT QUANTITY:</label>
                                <input type="number" name="product_qty" id="product_qty" class="form-control col-md-5 {{$errors->has('product_qty') ? 'is-invalid' : ''}}">
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
                                <input type="text" name="product_name" id="product_name" class="form-control {{$errors->has('product_name') ? 'is-invalid' : ''}}">
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
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10"></textarea>
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
                                <label for="length">LENGTH:</label>
                                <div class="input-group">
                                    <input type="number" name="length" id="length" class="form-control {{$errors->has('length') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2">
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
                                    <input type="number" name="width" id="width" class="form-control {{$errors->has('width') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2">
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
                                    <input type="number" name="weight" id="weight" class="form-control {{$errors->has('weight') ? 'is-invalid' : ''}}" aria-describedby="kg">
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
                                    <input type="number" name="height" id="height" class="form-control {{$errors->has('height') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2">
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
                            <div class="col-md-12">
                                <label for="">Image</label>
                                <input type="file" name="image" id="" class="form-control {{$errors->has('image') ? 'is-invalid' : ''}}">
                                @if($errors->has('image'))
                                    <span class="invalid-feedback">
                                        <strong>{{$errors->first('image')}}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <label for="price_min">PRICE MINIMUM:</label>
                                <input type="number" step="0.01" name="price_min" id="price_min" class="form-control {{$errors->has('price_min') ? 'is-invalid' : ''}}">
                                @if($errors->has('price_min'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('price_min')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label for="price_max">PRICE MAXIMUM:</label>
                                <input type="number" step="0.01" name="price_max" id="price_max" class="form-control  {{$errors->has('price_max') ? 'is-invalid' : ''}}">
                                @if($errors->has('price_max'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('price_max')}}</strong>
                                </span>
                                @endif
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

{{-- Add Stock Modal --}}

@foreach($products as $item)
<div class="modal fade" id="addStockModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="addStockModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addStockModalTitle">Add New Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="qtyForm" action="{{route('product.update', $item->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="product_qty">QUANTITY:</label>
                            <input type="number" id="product_qty" name="product_qty" class="form-control {{$errors->has('product_qty') ? 'is-invalid' : ''}}">
                            @if($errors->has('product_qty'))
                            <span class="invalid-feedback">
                                <strong>{{$errors->first('product_qty')}}</strong>
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
@foreach($products as $item)
<div class="modal fade" id="editProductModal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="editProductModalTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProductModalTitle">Edit Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('product.updateproduct', $item->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="category_id">CATEGORY:</label>
                                    <select style="height:20%" name="category_id" id="category_id" class="form-control{{$errors->has('category_id') ? 'is-invalid' : ''}}">
                                        <option style="display:none;" value="{{ $item->category_id }}">{{ $item->category->category_name }}</option>
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-7 ml-auto">
                                <div class="form-group">
                                    <label for="brand_id">BRAND:</label>
                                    <select style="height:20%" name="brand_id" id="brand_id" class="form-control {{$errors->has('brand_id') ? 'is-invalid' : ''}}">
                                        <option style="display:none;" value="{{ $item->brand_id }}">{{ $item->brand->brand_name }}</option>
                                        @foreach($brands as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="sub_category">SUB CATEGORY:</label>
                                    <select style="height:20%" name="sub_category" id="sub_category" class="form-control{{$errors->has('sub_category') ? 'is-invalid' : ''}}">
                                        <option style="display:none;" value="{{ $item->sub_category_id }}">{{ $item->subcategory->subcategory_name }}</option>
                                        @foreach($subcategories as $subcategory)
                                        <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="form-group">
                                    <label for="color_id">PRODUCT COLOR:</label>
                                    <select style="height:20%" name="color_id" id="color_id" class="form-control {{$errors->has('color_id') ? 'is-invalid' : ''}}">
                                        <option style="display:none;" value="{{ $item->color_id }}">{{ $item->color->color_name }}</option>
                                        @foreach($colors as $color)
                                        <option value="{{ $color->id }}">{{ $color->color_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="classification_id">CLASSIFICATION:</label>
                                    <select style="height:20%" name="classification_id" id="classification_id" class="form-control {{$errors->has('classification_id') ? 'is-invalid' : ''}}">
                                        <option style="display:none;" value="{{ $item->classification_id }}">{{ $item->classification->classification_name }}</option>
                                        @foreach($classifications as $classification)
                                        <option value="{{ $classification->id }}">{{ $classification->classification_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <div class="form-group">
                                    <label for="unit_id">UNIT:</label>
                                    <select style="height:20%" name="unit_id" id="unit_id" class="form-control {{$errors->has('unit_id') ? 'is-invalid' : ''}}">
                                        <option style="display:none;" value="{{ $item->unit_id }}">{{ $item->unit->unit_name }}</option>
                                        @foreach($units as $unit)
                                        <option value="{{ $unit->id }}">{{ $unit->unit_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="product_code">PRODUCT CODE:</label>
                                    <input type="text" name="product_code" id="product_code" value="{{ $item->product_code }}" class="form-control {{$errors->has('product_code') ? 'is-invalid' : ''}}">
                                    @if($errors->has('product_code'))
                                        <span class="invalid-feedback">
                                            <strong>{{$errors->first('product_code')}}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label for="country_name">PRODUCT QUANTITY:</label>
                                <input type="number" name="product_qty" id="product_qty" value="{{ $item->quantity }}" class="form-control col-md-5 {{$errors->has('product_qty') ? 'is-invalid' : ''}}">
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
                                <input type="text" name="product_name" id="product_name" value="{{ $item->product_name }}" class="form-control {{$errors->has('product_name') ? 'is-invalid' : ''}}">
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
                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{ $item->description }}</textarea>
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
                                <label for="length">LENGTH:</label>
                                <div class="input-group">
                                    <input type="number" name="length" id="length" value="{{ $item->length }}" class="form-control {{$errors->has('length') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2">
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
                                    <input type="number" name="width" id="width" value="{{ $item->width }}" class="form-control {{$errors->has('width') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2">
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
                                    <input type="number" name="weight" id="weight" value="{{ $item->weight }}" class="form-control {{$errors->has('weight') ? 'is-invalid' : ''}}" aria-describedby="kg">
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
                                    <input type="number" name="height" id="height" value="{{ $item->height }}" class="form-control {{$errors->has('height') ? 'is-invalid' : ''}}" aria-describedby="basic-addon2">
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
                        <div class="row">
                            <div class="col-md-6">
                                <label for="price_min">PRICE MINIMUM:</label>
                                <input type="number" step="0.01" name="price_min" id="price_min" value="{{ $item->price_min }}" class="form-control {{$errors->has('price_min') ? 'is-invalid' : ''}}">
                                @if($errors->has('price_min'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('price_min')}}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="col-md-6 ml-auto">
                                <label for="price_max">PRICE MAXIMUM:</label>
                                <input type="number" step="0.01" name="price_max" id="price_max" value="{{ $item->price_max }}" class="form-control  {{$errors->has('price_max') ? 'is-invalid' : ''}}">
                                @if($errors->has('price_max'))
                                <span class="invalid-feedback">
                                    <strong>{{$errors->first('price_max')}}</strong>
                                </span>
                                @endif
                            </div>
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


@endsection