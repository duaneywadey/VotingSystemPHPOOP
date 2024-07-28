<?php 
require_once 'php/core.php'; 
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

if (isset($_SESSION['is_admin'])) {
	if ($_SESSION['is_admin'] == 0) {
		header('Location:login.php');
	}
}

?>
<html lang="en">
<head>    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Hello, world!</title>
	<?php include 'includes/header.php'; ?>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card mt-4" style="height: 600px;">
					<div class="card-header"><h2>Duane</h2></div>
					<div class="card-body overflow-auto">
						<ul class="list-group list-group-flush">
							<li class="list-group-item">
								<h4>An item</h4>
								<small><i>July 28, 2024</i></small>
								<p class="mt-2">Lorem ipsum dolor sit amet, consectetur, adipisicing elit. Labore amet eius ducimus porro expedita repudiandae odio molestias vel quod quam, sapiente aspernatur? Laudantium, eveniet deleniti vel. Eveniet nisi eos temporibus!</p>
							</li>
						</ul>
					</div>
					<div class="card-footer" style="background-color: white;">
						<form action="#">
							<div class="form-group">
								<textarea name="" id="" class="form-control"></textarea>
								<input type="submit" class="btn btn-primary float-right mt-2" name="sendMessageBtn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>