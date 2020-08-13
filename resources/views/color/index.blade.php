@extends('layouts.master')

@section('title', 'Color Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Color</span>            
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
                        <th>COLOR ID</th>
                        <th>COLOR NAME</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($colors as $item)
                        <tr>
                            <td class="font-weight-bold">{{$item->id}}</td>
                            <td>{{$item->color_name}}</td>
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
                <h5 class="modal-title" id="addModalCenterTitle">Add New Color</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('color.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="country_name">COLOR NAME:</label>
                        <input type="text" name="color_name" id="color_name" class="form-control {{$errors->has('color_name') ? 'is-invalid' : ''}}" autofocus>
                        @if($errors->has('color_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('color_name')}}</strong>
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

@foreach ($colors as $color)
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
                <form id="inventoryForm" action="{{route('color.update', $color->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="color_id">COLOR CODE:</label>
                        <input type="text" name="color_id" id="color_id" value="{{ $color->id }}" class="form-control {{$errors->has('unit_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('color_id'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('color_id')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="color_name">COLOR NAME:</label>
                        <input type="text" name="color_name" id="color_name" value="{{ $color->color_name }}" class="form-control {{$errors->has('unit_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('color_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('color_name')}}</strong>
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