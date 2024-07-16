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
		<div class="row mt-4 justify-content-center">
			<div class="col-md-6">
				<div class="card">
					<div class="card-header"><h3>Add New Election</h3></div>
					<div class="card-body">
						<form action="php/elections.php" method="POST">
							<div class="form-group">
								<label for="election">Name of Election</label>
								<input type="text" class="form-control" name="election_title">
							</div>
							<div class="form-group">
								<label for="exampleFormControlTextarea1">Description</label>
								<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="election_description"></textarea>
							</div>
							<div class="form-group">
								<input type="submit" name="submitElectionBtn" class="btn btn-primary">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>