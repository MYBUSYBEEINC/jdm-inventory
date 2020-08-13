@extends('layouts.master')

@section('title', 'Purchase Order')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-2">
        @if(Auth::user()->user_role == 1 || Auth::user()->user_role == 2)
            <span>
                <a class="btn btn-success" href="{{ route('purchase.create') }}">Create New Purchase</a>
                {{-- <button type="button" class="btn-sm btn-success" data-toggle="modal" data-target="#addModalCenter">
                    Add New Purchase Order
                </button> --}}
            </span>
        @endif
    </div>
</div>
<br>
<div class="row">
    <div class="col-sm-12">
        <div class="content-panel">
            <div class="table-responsive">
                <table class="table">
                    <thead class=" text-primary">
                        <th>PO NUMBER</th>
                        <th>PO DATE</th>
                        <th>SUPPLIER NAME</th>
                        <th>REQUESTED BRANCH</th>
                        <th>DELIVER TO BRANCH</th>
                        <th>REQUESTED BY</th>
                        <th>APPROVED BY</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </thead>
                    <tbody>
                        @foreach($purchases as $purchase)
                        <tr>
                            <td class="font-weight-bold">{{$purchase->po_number}}</td>
                            <td>{{$purchase->po_date}}</td>
                            <td>{{$purchase->supplier->supplier_name}}</td>
                            <td>{{$purchase->reqbranch->branch_name}}</td>
                            <td>{{$purchase->delbranch->branch_name}}</td>
                            <td>{{$purchase->requested_by}}</td>
                            <td>{{$purchase->approved_by}}</td>
                            @if($purchase->status == 'Requested')
                                <td class="status-for-purchase-requested">{{ $purchase->status }}</td>
                            @elseif($purchase->status == 'Approved')
                                <td class="status-for-purchase-approval">{{ $purchase->status }}</td>
                            @else
                                <td>{{ $purchase->status }}</td>
                            @endif
                            @if(Auth::user()->user_role == 1)
                            <td class="text-right">
                                <div class="d-flex bd-highlight">
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                        <a href="{{ route('purchase.show', $purchase->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                    </div>
                                    <div class="p-2 flex-shrink-1 bd-highlight">
                                        <a href="{{ route('purchase.edit', $purchase->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                    </div>
                                </div>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- Create Modal --}}

<div class="modal fade" id="addModalCenter" tabindex="-1" role="dialog" aria-labelledby="addModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalCenterTitle">Add New Purchase Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="inventoryForm" action="{{route('purchase.store')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="supplier_id">SUPPLIER NAME:</label>
                        <select style="height:20%" name="supplier_id" id="supplier_id" class="form-control {{$errors->has('supplier_id') ? 'is-invalid' : ''}}" required>
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($suppliers as $supplier)
                            <option value="{{ $supplier->id }}">{{ $supplier->supplier_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="req_branch">REQUESTED BRANCH:</label>
                        <select style="height:20%" name="req_branch" id="req_branch" class="form-control {{$errors->has('req_branch') ? 'is-invalid' : ''}}" required>
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="del_branch">DELIVER TO BRANCH:</label>
                        <select style="height:20%" name="del_branch" id="del_branch" class="form-control {{$errors->has('del_branch') ? 'is-invalid' : ''}}" required>
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="requested_by">REQUESTED BY:</label>
                        <input type="text" name="requested_by" id="requested_by" class="form-control {{$errors->has('requested_by') ? 'is-invalid' : ''}}" value="{{ Auth::user()->name }}" readonly>
                        @if($errors->has('requested_by'))
                        <span class="invalid-feedback">
                            <strong>{{$errors->first('requested_by')}}</strong>
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