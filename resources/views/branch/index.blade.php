@extends('layouts.master')

@section('title', 'Branch Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Branch</span>
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
                            <th>BRANCH ID</th>
                            <th>BRANCH NAME</th>
                            <th>ADDRESS</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($branches as $item)
                            <tr>
                                <td class="font-weight-bold">{{$item->id}}</td>
                                <td>{{$item->branch_name}}</td>
                                <td>{{$item->address}}</td>
                                <td class="text-right">
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-shrink-1 bd-highlight">
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"  data-target="#editModalCenter-{{$item->id}}"><i class="fas fa-edit"></i></button>
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
                <h5 class="modal-title" id="addModalCenterTitle">Add New Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('branch.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="branch_name">BRANCH NAME:</label>
                        <input type="text" name="branch_name" id="branch_name" class="form-control {{$errors->has('branch_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('branch_name'))
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
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>

@foreach ($branches as $branch)
<div class="modal fade" id="editModalCenter-{{$branch->id}}" tabindex="-1" role="dialog" aria-labelledby="addModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Add New Branch</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('branch.update', $branch->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="branch_id">ID:</label>
                        <input type="text" name="branch_id" id="branch_id" value="{{ $branch->id }}" class="form-control col-4 {{$errors->has('branch_id') ? 'is-invalid' : ''}}" readonly>
                        @if($errors->has('branch_id'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('branch_id')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="branch_name">BRANCH NAME:</label>
                        <input type="text" name="branch_name" id="branch_name" value="{{ $branch->branch_name }}" class="form-control {{$errors->has('branch_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('branch_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('brand_name')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="address">ADDRESS:</label>
                        <textarea class="form-control" name="address" id="address" cols="30" rows="5">{{ $branch->address }}</textarea>
                        @if($errors->has('address'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('address')}}</strong>
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