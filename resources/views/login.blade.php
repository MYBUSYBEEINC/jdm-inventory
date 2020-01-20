<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
</br>
</br>
</br>
</br>
<div class="container">
	<div class="d-flex justify-content-center align-self-center">
		<div class="col-sm-4">
			<div class="card">
				@if(isset(Auth::user()->email))
				<script>window.location="/dashboard";</script>
				@endif

				@if ($message = Session::get('error'))
				<div class="alert alert-danger alert-block">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<strong>{{ $message }}</strong>
				</div>
				@endif
				@if (count($errors) > 0)
					<div class="alert alert-danger">
						<ul>
							@foreach($errors->all() as $error)
								<li>{{ $error }}</li>
							@endforeach
						</ul>
					</div>
				@endif
				<div class="card-header text-center bg-dark text-white font-weight-bold">
					LOGIN TO JDM INVENTORY
				</div>
				<div class="card-body">
					<form action="{{ url('/login/checklogin')}}" method="post">

					{{ csrf_field() }}
						<div class="form-group">
							<label for="username">Username/Email</label>
							<input type="email" name="email" id="email" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input type="password" name="password" id="password" class="form-control">
						</div>
						<div class="row">
							<div class="col-sm">
								<div class="form-group">
									<button type="submit" name="login" value="Login" class="btn btn-success btn-block">Login</button>
								</div>
					
				</div>
				<div class="col-sm">
					<div class="mt-3 text-center">
						<h7><a href="http://">Forget Password?</a></h7>
					</div>
				</div>
			</div></form>
		</div>
		<div class="card-footer text-center bg-warning text-white">
			© BUSYBEE
		</div>
	</div>
</div></div>
</div>