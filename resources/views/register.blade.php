<html lang="en">
<title>Omnis Agro</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">

<link rel="icon" href="assets/images/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
	<div class="auth-wrapper">
		<div class="auth-content text-center">

			<div class="card">
				<div class="row align-items-center">
					<div class="col-md-12">
						<img src="assets/images/logo.png" alt="Agro" class="img-fluid" align="center">
						<div class="card-body">

							<h4 class="mb-3 f-w-400">Register</h4>
							<form name="login_info" method="post">
								@csrf
								<div class="input-group mb-3">
									<input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{old('name')}}" required>
									@error('name')
									<label class="error jquery-validation-error small form-text invalid-feedback" for="name">{{$errors->first('name')}}</label>
									@enderror
								</div>
								<div class="input-group mb-3">
									<input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{old('username')}}" required>
									@error('username')
									<label class="error jquery-validation-error small form-text invalid-feedback" for="username">{{$errors->first('username')}}</label>
									@enderror
								</div>
								<div class="input-group mb-4">
									<input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
									@error('password')
									<label class="error jquery-validation-error small form-text invalid-feedback" for="password">{{$errors->first('password')}}</label>
									@enderror
								</div>
								<div class="input-group mb-4">
									<input type="password" id="repassword" name="repassword" class="form-control @error('repassword') is-invalid @enderror" placeholder="Confirm password" required>
									@error('repassword')
									<label class="error jquery-validation-error small form-text invalid-feedback" for="repassword">Passwords do not match</label>
									@enderror
								</div>

								<button type="submit" name="submit" class="btn btn-block btn-primary mb-4 rounded-pill">Register</button>
							</form>
							<p class="mb-2 text-muted">Have an account? <a href="/" class="f-w-400">Login</a></p>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>


	<script src="assets/js/vendor-all.min.js"></script>
	<script src="assets/js/plugins/bootstrap.min.js"></script>
	<script src="assets/js/waves.min.js"></script>
	<script src="assets/js/pages/TweenMax.min.js"></script>
	<script src="assets/js/pages/jquery.wavify.js"></script>
	<script src="/assets/js/plugins/sweetalert.min.js"></script>

	@if(session()->has('status'))
	<script>
		swal("Account created", "Please login to continue", "success");
	</script>
	@endif
</body>

</html>