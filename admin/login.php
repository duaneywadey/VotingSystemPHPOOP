<?php require_once 'php/core.php'; ?>
<html lang="en">
<head>    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include 'includes/header.php'; ?>
	<title>Hello, world!</title>
	<style>
		body {
			background-image: linear-gradient(359deg, rgba(25, 25, 25,0.02) 0%, rgba(25, 25, 25,0.02) 8%,transparent 8%, transparent 27%,rgba(152, 152, 152,0.02) 27%, rgba(152, 152, 152,0.02) 80%,rgba(142, 142, 142,0.02) 80%, rgba(142, 142, 142,0.02) 100%),linear-gradient(250deg, rgba(9, 9, 9,0.02) 0%, rgba(9, 9, 9,0.02) 33%,transparent 33%, transparent 40%,rgba(240, 240, 240,0.02) 40%, rgba(240, 240, 240,0.02) 68%,rgba(141, 141, 141,0.02) 68%, rgba(141, 141, 141,0.02) 100%),linear-gradient(107deg, rgba(229, 229, 229,0.02) 0%, rgba(229, 229, 229,0.02) 12%,transparent 12%, transparent 24%,rgba(89, 89, 89,0.02) 24%, rgba(89, 89, 89,0.02) 38%,rgba(206, 206, 206,0.02) 38%, rgba(206, 206, 206,0.02) 100%),linear-gradient(64deg, rgba(49, 49, 49,0.02) 0%, rgba(49, 49, 49,0.02) 33%,transparent 33%, transparent 73%,rgba(191, 191, 191,0.02) 73%, rgba(191, 191, 191,0.02) 78%,rgba(83, 83, 83,0.02) 78%, rgba(83, 83, 83,0.02) 100%),linear-gradient(90deg, rgb(255,255,255),rgb(255,255,255));
		}
	</style>
</head>
<body>
	<div class="container mt-4">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header"><h3>Welcome to the admin side! Login now!</h3></div>
					<div class="card-body">
						<form action="php/users.php" method="POST">
						  <div class="form-group">
						    <label for="exampleInputEmail1">Username</label>
						    <input type="text" class="form-control" name="username">
						  </div>
						  <div class="form-group">
						    <label for="exampleInputPassword1">Password</label>
						    <input type="password" class="form-control" name="password">
						  </div>
						  <div class="form-group">
						  	<p>Dont have an account yet? <a href="register.php">Register </a>now.</p>
						  </div>
						  <input type="submit" class="btn btn-primary float-right" name="loginBtn">
						</form>						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>