@extends('layouts.master')

@section('title', 'Category Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-3">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Category</span>
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
                        <th>CATEGORY CODE</th>
                        <th>CATEGORY NAME</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($categories as $item)
                        <tr>
                            <td class="font-weight-bold">{{$item->category_code}}</td>
                            <td>{{$item->category_name}}</td>
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
                <h5 class="modal-title" id="addModalCenterTitle">Add New Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('category.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="country_code">CATEGORY CODE:</label>
                        <input type="text" name="category_code" id="category_code" class="form-control {{$errors->has('category_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('category_code'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('category_code')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="country_name">CATEGORY NAME:</label>
                        <input type="text" name="category_name" id="category_name" class="form-control {{$errors->has('category_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('category_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('category_name')}}</strong>
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
@foreach ($categories as $category)
<div class="modal fade" id="editModalCenter-{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="editModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('category.update', $category->id)}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="country_code">CATEGORY CODE:</label>
                        <input type="text" name="category_code" id="category_code" value="{{ $category->category_code }}" class="form-control {{$errors->has('category_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('category_code'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('category_code')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="country_name">CATEGORY NAME:</label>
                        <input type="text" name="category_name" id="category_name" value="{{ $category->category_name }}" class="form-control {{$errors->has('category_name') ? 'is-invalid' : ''}}">
                        @if($errors->has('category_name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('category_name')}}</strong>
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