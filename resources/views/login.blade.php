<html lang="en">
<title>Omnis Agro</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="author" content="">

<link rel="icon" href="/assets/images/favicon.png" type="image/x-icon">

<link rel="stylesheet" href="/assets/css/style.css">
</head>

<body>
	<div class="auth-wrapper">
		<div class="auth-content text-center">

			<div class="card">
				<div class="row align-items-center">
					<div class="col-md-12">
						<img src="assets/images/logo.png" alt="Agro" class="img-fluid" align="center">
						<div class="card-body">

							<h4 class="mb-3 f-w-400">Signin</h4>
							<form name="login_info" method="post">
								@csrf
								
								<div class="input-group mb-3">
									<input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username" value="{{old('username')}}" required>
									@error('username')
									<label  class="error jquery-validation-error small form-text invalid-feedback" for="username">{{$errors->first('username')}}</label>
									@enderror
								</div>
								<div class="input-group mb-4">
									<input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
									@error('password')
									<label  class="error jquery-validation-error small form-text invalid-feedback" for="password">{{$errors->first('password')}}</label>
									@enderror
								</div>

								<button type="submit" name="submit" class="btn btn-block btn-primary mb-4 rounded-pill">Signin</button>
							</form>
							<p class="mb-2 text-muted">Want an account? <a href="register" class="f-w-400">Register</a></p>
							<!-- <p class="mb-2 text-muted">Forgot password? <a href="reset-password" class="f-w-400">Reset</a></p> -->
							
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
	<script>
		$('#feel-the-wave').wavify({
			height: 100,
			bones: 3,
			amplitude: 90,
			color: 'rgba(72, 134, 255, 4)',
			speed: .25
		});
		$('#feel-the-wave-two').wavify({
			height: 70,
			bones: 5,
			amplitude: 60,
			color: 'rgba(72, 134, 255, .3)',
			speed: .35
		});
		$('#feel-the-wave-three').wavify({
			height: 50,
			bones: 4,
			amplitude: 50,
			color: 'rgba(72, 134, 255, .2)',
			speed: .45
		});
	</script>
@if(session()->has('error'))
<script src="/assets/js/plugins/sweetalert.min.js"></script>
<script>
    swal("Error", "Incorrect password", "error");
</script>
@endif
</body>

</html>