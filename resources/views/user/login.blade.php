@extends('layouts.mastershop')

@section('title', 'Login')

@section('content')

@if (session('status'))
    <div class="alert alert-warning alert-dismissible fade show">
        {{ session('status') }}
    </div>
@endif

<div class="col-sm-6 px400">
   <h1>Login</h1>
   <br>
   <form method="post">
   {{csrf_field()}}
      <div class="form-group">
         <label for="">Email address</label>
         <input type="text" name="email" class="form-control {{$errors->has('email') ? 'is-invalid' : ''}}" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}" autofocus>
         @if($errors->has('email'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('email')}}</strong>
            </span>
         @endif
      </div>
      <div class="form-group">
         <label for="">Password</label>
         <input type="password" name="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" placeholder="Password">
         @if($errors->has('password'))
            <span class="invalid-feedback">
                <strong>{{$errors->first('password')}}</strong>
            </span>
         @endif
      </div>

      <p>Don't have an account yet? <a href="{{route('register')}}">Sign Up</a></p>
      <button type="submit" class="btn btn-outline-dark float-right btnblk">Login</button>
   </form>
</div>
@endsection