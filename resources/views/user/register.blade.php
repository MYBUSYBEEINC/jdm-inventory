@extends('layouts.master')

@section('title', 'Register')

@section('content')
<div class="col-md-6 px400">
    <h1>Sign Up!</h1>
    <br>
   <form method="post" action="{{route('register')}}">
   {{csrf_field()}}
      <div class="form-group">
         <label for="exampleInputEmail1">Name</label>
         <input type="text" name="name" class="form-control {{$errors->has('name') ? 'is-invalid' : ''}}" aria-describedby="" placeholder="Enter name" value="{{old('name')}}" autofocus>
         @if($errors->has('name'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('name')}}</strong>
            </span>
         @endif
      </div>
      <div class="form-group">
         <label for="exampleInputEmail1">Email address</label>
         <input type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
         @if($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('email')}}</strong>
            </span>
         @endif
         <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
      </div>
      <div class="form-group">
         <label for="exampleInputPassword1">Password</label>
         <input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Password">
         @if($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('password')}}</strong>
            </span>
         @endif
      </div>
      <p>Already have an account? <a href="{{route('login')}}">Login</a></p>
      <button type="submit" class="btn btn-outline-dark float-right btnblk">Signup</button>
   </form>
</div>
@endsection