@extends('layouts.master')

@section('title', 'Terms Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-success btn-block" data-toggle="modal" data-target="#addModalCenter">
            <span>Add New Term</span>
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
                            <th>TERM CODE</th>
                            <th>TERM DESCRIPTION</th>
                            <th>TERM</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($terms as $item)
                            <tr>
                                <td class="font-weight-bold">{{$item->term_code}}</td>
                                <td>{{$item->term_description}}</td>
                                <td>{{$item->term}}</td>
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
                <h5 class="modal-title" id="addModalCenterTitle">Add New Term</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('term.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="term_code">TERM CODE:</label>
                        <input type="text" name="term_code" id="term_code" class="form-control {{$errors->has('term_code') ? 'is-invalid' : ''}}">
                        @if($errors->has('term_code'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('term_code')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="term_description">TERM DESCRIPTION:</label>
                        <input type="text" name="term_description" id="term_description" class="form-control {{$errors->has('term_description') ? 'is-invalid' : ''}}">
                        @if($errors->has('term_description'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('term_description')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="term">TERM:</label>
                        <input type="text" name="term" id="term" class="form-control {{$errors->has('term') ? 'is-invalid' : ''}}">
                        @if($errors->has('term'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('term')}}</strong>
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