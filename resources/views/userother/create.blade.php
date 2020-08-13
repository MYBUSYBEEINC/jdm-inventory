@extends('layouts.master')

@section('title', 'User Management')

@section('content')

<div class="row">
    <div class="col-sm"></div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <form id="inventoryForm" action="{{route('user.store')}}" method="post">
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
                        <label for="password">PASSWORD:</label>
                            <input type="password" name="password" id="password" class="form-control {{$errors->has('password') ? 'is-invalid' : ''}}" required>
                    </div>
                    <div class="form-group">
                        <label for="confirm_password">CONFIRM PASSWORD:</label>
                            <input type="password" name="confirm_password" id="confirm_password" class="form-control {{$errors->has('confirm_password') ? 'is-invalid' : ''}}" required>
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
                        <select style="height:20%" name="branch_id" id="branch_id" class="form-control {{$errors->has('branch_id') ? 'is-invalid' : ''}}" required>
                            <option disabled selected value> -- select an option -- </option>
                            @foreach($branches as $branch)
                            <option value="{{ $branch->id }}">{{ $branch->branch_name }}</option>
                            @endforeach
                        </select>
                    </div>
            </div>
            <div class="card-footer">
                <div class="row">
                    <div class="col-sm">
                        <a href="{{route('user')}}" class="btn btn-secondary btn-block">Cancel</a>
                    </div>
                    <div class="col-sm">
                        <button id="submit-btn" type="submit" class="btn btn-success btn-block">
                            Accept
                        </button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-sm"></div>
</div>
<script>
	$('#submit-btn').attr('disabled', true);
    $('#confirm_password').on('keyup', function(){
	var confirm = $(this).val();
	var pw = $('#password').val();

	if(confirm != pw){
		$(this).addClass('not-confirmed');
		$('#submit-btn').attr('disabled', true);
	} else {
		$(this).removeClass('not-confirmed');
		$(this).addClass('confirmed');
        $('#password').addClass('confirmed');
		$('#submit-btn').attr('disabled', false);
	}
});
</script>
@endsection