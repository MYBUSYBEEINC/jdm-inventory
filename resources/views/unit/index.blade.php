@extends('layouts.master')

@section('title', 'Unit Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Unit</span>
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
                        <th>UNIT CODE</th>
                        <th>UNIT NAME</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($units as $item)
                        <tr>
                            <td class="font-weight-bold">{{$item->unit_code}}</td>
                            <td>{{$item->unit_name}}</td>
                            <td class="text-right">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editModalCenter"><i class="fa fa-edit"></i></button>
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
                <h5 class="modal-title" id="addModalCenterTitle">Add New Unit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('unit.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="unit_code">UNIT CODE:</label>
                        <input type="text" name="unit_code" id="unit_code" class="form-control {{$errors->has('unit_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('unit_code'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('unit_code')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="unit_name">UNIT NAME:</label>
                        <input type="text" name="unit_name" id="unit_name" class="form-control {{$errors->has('unit_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('unit_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('unit_name')}}</strong>
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

@foreach ($units as $unit)
<div class="modal fade" id="editModalCenter" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Edit Brand</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('unit.update', $unit->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="unit_code">UNIT CODE:</label>
                        <input type="text" name="unit_code" id="unit_code" value="{{ $unit->unit_code }}" class="form-control {{$errors->has('unit_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('unit_code'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('unit_code')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="unit_name">UNIT NAME:</label>
                        <input type="text" name="unit_name" id="unit_name" value="{{ $unit->unit_name }}" class="form-control {{$errors->has('unit_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('unit_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('unit_name')}}</strong>
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