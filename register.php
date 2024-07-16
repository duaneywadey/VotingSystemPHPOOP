<?php require_once 'php/core.php'; ?>
<html lang="en">
<head>    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include 'includes/header.php'; ?>
	<title>Hello, world!</title>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center ">
			<div class="col-md-6">
				<div class="card mt-4">
					<div class="card-header"><h3>Welcome to the voting system! Register here</h3></div>
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
						    <label for="exampleInputPassword1">Confirm Password</label>
						    <input type="password" class="form-control" name="confirmPassword">
						  </div>
						  <div class="form-group">
						  	<p>Go back to <a href="login.php">login page</a></p>
						  </div>
						  <input type="submit" class="btn btn-primary float-right" name="registerBtn">
						</form>						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>