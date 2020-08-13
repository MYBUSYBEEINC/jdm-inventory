@extends('layouts.master')

@section('title', 'Brand Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Brand</span>
        </button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="content-panel">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>BRAND ID</th>
                        <th>BRAND NAME</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($brands as $item)
                        <tr>
                            <td class="font-weight-bold">{{$item->id}}</td>
                            <td>{{$item->brand_name}}</td>
                            <td class="text-right">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModalCenter-{{$item->id}}"><i class="fa fa-edit"></i></button>
                                    </div>
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                        <a href="#" data-name="" data-href="" class="btn btn-danger btn-sm deleteEmp" data-toggle="modal" data-target="#deleteModalCenter"><i class="fa fa-trash"></i></a>
                                    </div>
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
                <h5 class="modal-title" id="addModalCenterTitle">Add New Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('brand.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="country_name">BRAND NAME:</label>
                        <input type="text" name="brand_name" id="brand_name" class="form-control {{$errors->has('brand_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('brand_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('brand_name')}}</strong>
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

@foreach ($brands as $brand)
<div class="modal fade" id="editModalCenter-{{$brand->id}}"  tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('brand.update', $brand->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="brand_id">BRAND ID:</label>
                        <input type="text" name="brand_id" id="brand_id" value="{{ $brand->id }}" class="form-control col-3 {{$errors->has('brand_id') ? 'is-invalid' : ''}}" readonly>
                        @if($errors->has('brand_id'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('brand_id')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="brand_name">BRAND NAME:</label>
                        <input type="text" name="brand_name" id="brand_name" value="{{ $brand->brand_name }}" class="form-control {{$errors->has('category_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('brand_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('brand_name')}}</strong>
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

@endsection