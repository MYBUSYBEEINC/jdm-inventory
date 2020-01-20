@extends('layouts.master')

@section('title', 'Dashboard')
    
@section('content')
<div class="content">
    <div class="container box">
        @if(isset(Auth::user()->email))
        <div class="alert alert-success success-block">
            <strong>Welcome {{ Auth::user()->name }}!</strong>
        </div>
        @else
            <script>window.location="/main";</script>
        @endif
        <br>
    </div> 
</div>
@endsection