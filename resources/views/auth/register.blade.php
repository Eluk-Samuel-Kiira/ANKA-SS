
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="author" content="Kodinger">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>ANKA | Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/my-login.css">
</head>
<body class="my-login-page">
	<section class="h-100">
		<div class="container h-100">
			<div class="row justify-content-md-center h-100">
				<div class="card-wrapper">
					<h3 class="mt-5 pb-2 text-center">ANKA BUSSINESS SUPPORT SERVICES</h3>
					<div class="card fat">
						<div class="card-body">
							<h4 class="card-title">Register</h4>
							<form method="POST" class="my-login-validation" novalidate="" action="{{ route('register') }}">
                                @if (Session::get('success'))
                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                    </div>
                                @endif
                                @if (Session::get('errr'))
                                    <div class="alert alert-danger">
                                        {{ Session::get('error') }}
                                    </div>
                                @endif
								@csrf
                                <div class="form-group">
									<label for="name">Name</label>
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
                                    <span class="text-danger">@error('name'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<label for="email">E-Mail Address</label>
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
                                    <span class="text-danger">@error('email'){{ $message }}@enderror</span>
								</div>

								<div class="form-group">
									<label for="password">Password</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                    <span class="text-danger">@error('password'){{ $message }}@enderror</span>
                                </div>

                                <div class="form-group">
									<label for="password-confirm"> Confirm Password</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation">
								</div>

								<div class="form-group m-0">
									<button type="submit" class="btn btn-primary btn-block">
										Register
									</button>
								</div>
								<div class="mt-4 text-center">
									Already have an account? <a href="{{ route('login') }}">Login</a>
								</div>
							</form>
						</div>
					</div>
					<div class="footer">
						Copyright &copy; 2017 &mdash; ANKA BUSSINESS SUPPORT SERVICES
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<script src="js/my-login.js"></script>
</body>
</html>
