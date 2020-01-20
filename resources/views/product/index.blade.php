@extends('layouts.master')

@section('title', 'Product Masterfile')

@section('content')

<div class="row">
    <div class="col"></div>
    <div class="col-sm-2">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#addModalCenter">
            
        </button>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead class=" text-primary">
                            <th>SMS ID</th>
                            <th>Provider ID</th>
                            <th>Route ID</th>
                            <th>Country ID</th>
                            <th>New Price</th>
                            <th>Old Price</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create Modal -->
@endsection