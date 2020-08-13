@extends('layouts.master')

@section('title', 'Customer Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Customer</span>
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
                            <th>CUSTOMER ID</th>
                            <th>CUSTOMER NAME</th>
                            <th>CONTACT NO</th>
                            <th>EMAIL ADDRESS</th>
                            <th>ADDRESS</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($customers as $customer)
                            <tr>
                                <td class="font-weight-bold">{{$customer->id}}</td>
                                <td>{{$customer->customer_name}}</td>
                                <td>{{$customer->address}}</td>
                                <td>{{$customer->contact_no}}</td>
                                <td>{{$customer->email_address}}</td>
                                <td>{{$customer->address}}</td>
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
                <form id="inventoryForm" action="{{route('customer.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="customer_name">CUSTOMER NAME:</label>
                        <input type="text" name="customer_name" id="customer_name" class="form-control {{$errors->has('customer_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('customer_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('customer_name')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="contact_no">CONTACT NO:</label>
                        <input type="text" name="contact_no" id="contact_no" class="form-control {{$errors->has('contact_no') ? 'is-invalid' : ''}}">
                        @if($errors->has('contact_no'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('contact_no')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email_adress">EMAIL ADDRESS:</label>
                        <input type="text" name="email_address" id="email_address" class="form-control {{$errors->has('email_address') ? 'is-invalid' : ''}}">
                        @if($errors->has('email_address'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('email_address')}}</strong>
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