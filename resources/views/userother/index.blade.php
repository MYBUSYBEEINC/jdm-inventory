@extends('layouts.master')

@section('title', 'User Management')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="p-2 flex-shrink-1 bd-highlight">
        <span><a href="{{route('user.create')}}" class="btn btn-success btn-md">Create New User</a></span>
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
                            <th>USER ID</th>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th>USER ROLE</th>
                            <th>BRANCH</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($users as $item)
                            <tr>
                                <td class="font-weight-bold">{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->role->user_role}}</td>
                                <td>{{$item->branch->branch_name}}</td>
                                <td class="text-right">
                                    <div class="d-flex bd-highlight">
                                        <div class="p-2 flex-shrink-1 bd-highlight">
                                            <!-- <a href="#" data-name="" data-href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModalCenter"><i class="fas fa-edit"></i></a> -->
                                            <a href="" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
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

{{-- Create Modal --}}

<div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="addModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Create New User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('user.create')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name">NAME:</label>
                        <input type="text" name="name" id="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}">
                        @if($errors->has('name'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="email">EMAIL:</label>
                        <input type="text" name="email" id="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}">
                        @if($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('email')}}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="user_role">USER ROLE:</label>
                        <select style="height:20%" name="user_role" id="user_role" class="form-control {{$errors->has('user_role') ? 'is-invalid' : ''}}" required>
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($user_roles as $roles)
                            <option value="{{ $roles->id }}">{{ $roles->user_role }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="branch_id">BRANCH:</label>
                        <select style="height:20%" name="branch_id" id="userbranch_id_role" class="form-control {{$errors->has('branch_id') ? 'is-invalid' : ''}}">
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->name }}</option>
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
@endsection