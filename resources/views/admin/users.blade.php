@extends('layouts.mastershop')

@section('title', 'Manage Users')

@section('content')
<div class="row mt-15 mb-3">
    <div class="col">
        <h1 class="txtctr">Users</h1>
    </div>
    <div class="col d-flex justify-content-end">
        <a class="btn btn-outline-warning btnblk" href="{{route('admin.index')}}"><i class="fas fa-angle-left"></i> Dashboard</a>
    </div>
</div>

<div class="table-responsive">
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
            </tr>
                </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <th scope="row">{{$user->name}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection