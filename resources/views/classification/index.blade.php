@extends('layouts.master')

@section('title', 'Classification Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Classification</span>
        </button>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="content-panel">
            <div class="table-responsive">
                <table class="table">
                    <thead class="text-primary">
                        <th>CLASS CODE</th>
                        <th>CLASS NAME</th>
                        <th>SUBCATEGORY NAME</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($classifications as $item)
                        <tr>
                            <td class="font-weight-bold">{{$item->classification_code}}</td>
                            <td>{{$item->classification_name}}</td>
                            <td>{{$item->subcategory->subcategory_name}}</td>
                            <td class="text-right">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                        <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"  data-target="#editModalCenter-{{$item->id}}"><i class="fa fa-edit"></i></button>
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
                <h5 class="modal-title" id="addModalCenterTitle">Add New Classification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('classification.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="classification_code">CLASSIFICATION CODE:</label>
                        <input type="text" name="classification_code" id="classification_code" class="form-control {{$errors->has('classification_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('classification_code'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('classification_code')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="classification_name">CLASSIFICATION NAME:</label>
                        <input type="text" name="classification_name" id="classification_name" class="form-control {{$errors->has('classification_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('classification_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('brand_name')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="subcategory_name">SUB CATEGORY:</label>
                        <select style="height:20%" name="subcategory_id" id="subcategory_id" class="form-control {{$errors->has('subcategory_id') ? 'is-invalid' : ''}}">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                            @endforeach
                        </select>
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

@foreach ($classifications as $classification)
<div class="modal fade" id="editModalCenter-{{$classification->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalCenterTitle">Edit Classification</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('classification.update', $classification->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="class_code">CLASSIFICATION CODE:</label>
                        <input type="text" name="class_code" id="class_code" value="{{ $classification->classification_code }}" class="form-control {{$errors->has('class_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('class_code'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('class_code')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="class_name">CLASSIFICATION NAME:</label>
                        <input type="text" name="class_name" id="class_name" value="{{ $classification->classification_name }}" class="form-control {{$errors->has('class_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('class_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('class_name')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="subcategory_id">SUB CATEGORY:</label>
                        <select style="height:20%" name="subcategory_id" id="subcategory_id" value="{{ $classification->subcategory_name }}" class="form-control {{$errors->has('subcategory_id') ? 'is-invalid' : ''}}">
                            <option style="display:none;" value="{{ $classification->subcategory_name }}">{{ $classification->subcategory->subcategory_name }}</option>
                            @foreach($subcategories as $subcategory)
                            <option value="{{ $subcategory->id }}">{{ $subcategory->subcategory_name }}</option>
                            @endforeach
                        </select>
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