@extends('layouts.master')

@section('title', 'Manage Orders')

@section('content')
<div class="content-panel">
    <div class="row-responsive ml-2">
        <div class="col">
            <h1 class="txtctr">Orders</h1>
        </div>
        <div class="col">
            <a class="btn btn-warning" href="{{route('shop')}}"><i class="fa fa-angle-left"></i> Dashboard</a>
        </div>
    </div>
    
    <table class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Order number</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <th scope="row">{{$order->name}}</th>
                    <td>{{$order->payment_id}}</td>
                    <td>&#8369; {{$order->total}}.00</td>
                    @if($order->status == 0)
                        <td class="status-for-pending text-white">Pending</td>
                    @elseif($order->status == 1)
                        <td class="status-for-verified">Verified</td>
                    @elseif($order->status == 2)
                        <td class="status-for-delivering text-white">Delivering</td>
                    @elseif($order->status == 3)
                        <td class="status-for-cancelled text-white">Cancelled</td>
                    @else
                        <td class="status-for-delivered text-white">Delivered</td>
                    @endif
                    <td>
                        <div class="col">
                            <form action="{{route('orderStatus', $order->id)}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                <select class="form-control form-control-sm" name="status">
                                    <option value="0">Pending</option>
                                    <option value="1">Verified</option>
                                    <option value="2">Delivering</option>
                                    <option value="4">Delivered</option>
                                    <option value="3">Cancelled</option>
                                </select>
                                </div>
                        </div>
                        <div class="col">
                                <button class="btn btn-dark btn-sm" type="submit">Update</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </table>
</div>
@endsection