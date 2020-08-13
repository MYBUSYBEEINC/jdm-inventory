@extends('layouts.master')

@section('title', 'Supplier Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Supplier</span>
        </button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>SUPPLIER ID</th>
                            <th>SUPPLIER NAME</th>
                            <th>ADDRESS</th>
                            <th>SALES NAME</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $item)
                            <tr>
                                <td class="font-weight-bold">{{$item->id}}</td>
                                <td>{{$item->supplier_name}}</td>
                                <td>{{$item->address}}</td>
                                <td>{{$item->sales_name}}</td>
                                <td class="text-right">
                                    <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                            <!-- <a href="#" data-name="" data-href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-edit"></i></a> -->
                                            <a href="" class="btn btn-default btn-sm"><i class="far fa-eye"></i></a>
                                        </div>
                                        <div class="p-2 flex-shrink-1 bd-highlight">
                                            <!-- <a href="#" data-name="" data-href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-edit"></i></a> -->
                                            <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                        </div>
                                        <div class="p-2 flex-shrink-1 bd-highlight">
                                            <a href="#" data-name="" data-href="" class="btn btn-danger btn-sm deleteEmp" data-toggle="modal" data-target="#deleteModalCenter"><i class="fas fa-trash"></i></a>
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
</div>

<!-- Create Modal -->

<div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="addModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Add New Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('supplier.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="supplier_name">SUPPLIER NAME:</label>
                        <input type="text" name="supplier_name" id="supplier_name" class="form-control {{$errors->has('supplier_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('supplier_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('brand_name')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">ADDRESS:</label>
                        <input type="text" name="address" id="address" class="form-control {{$errors->has('address') ? 'is-invalid' : ''}}">
                        @if($errors->has('address'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('address')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="sales_name">SALES NAME:</label>
                        <input type="text" name="sales_name" id="sales_name" class="form-control {{$errors->has('sales_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('sales_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('sales_name')}}</strong>
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
@endsection