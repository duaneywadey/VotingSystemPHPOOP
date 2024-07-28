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
				<div class="card mt-4">
					<div class="card-header"><h2>All Messages</h2></div>
					<div class="card-body">
						<input type="text" class="form-control mt-4 mb-4" placeholder="Search for a user">
						<ul class="list-group list-group-flush">
							<li class="list-group-item"><a href="send-a-message.php"><h4>An item</h4></a></li>
							<li class="list-group-item"><h4>A second item</h4></li>
							<li class="list-group-item"><h4>A third item</h4></li>
							<li class="list-group-item"><h4>A fourth item</h4></li>
							<li class="list-group-item"><h4>And a fifth one</h4></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>