@extends('layouts.master')

@section('title', 'SubCategory Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-2">
        <span>
        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModalCenter">
            Add New SubCategory
        </button>
        </span>
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="content-panel">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>CATEGORY NAME</th>
                        <th>SUBCATEGORY CODE</th>
                        <th>SUBCATEGORY NAME</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($subcategories as $item)
                        <tr>
                            <td>{{$item->category->category_name}}</td>
                            <td>{{$item->subcategory_code}}</td>
                            <td>{{$item->subcategory_name}}</td>
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
                <h5 class="modal-title" id="addModalCenterTitle">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('subcategory.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="">Category</label>
                        <select class="form-control" name="category_id" id="">
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="subcategory_code">SUBCATEGORY CODE:</label>
                        <input type="text" name="subcategory_code" id="subcategory_code" class="form-control {{$errors->has('subcategory_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('subcategory_code'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('subcategory_code')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="subcategory_name">SUBCATEGORY NAME:</label>
                        <input type="text" name="subcategory_name" id="subcategory_name" class="form-control {{$errors->has('subcategory_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('subcategory_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('subcategory_name')}}</strong>
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

{{-- Edit Modal --}}
@foreach ($subcategories as $subcategory)
<div class="modal fade" id="editModalCenter-{{$subcategory->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Edit Sub Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('subcategory.update', $subcategory->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="subcategory_code">SUB CATEGORY CODE:</label>
                        <input type="text" name="subcategory_code" id="subcategory_code" value="{{ $subcategory->subcategory_code }}" class="form-control {{$errors->has('class_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('subcategory_code'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('subcategory_code')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="subcategory_name">SUB CATEGORY NAME:</label>
                        <input type="text" name="subcategory_name" id="subcategory_name" value="{{ $subcategory->subcategory_name }}" class="form-control {{$errors->has('class_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('subcategory_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('subcategory_name')}}</strong>
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