<?php 
require_once 'php/core.php';
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

if (isset($_SESSION['is_admin'])) {
	if ($_SESSION['is_admin'] == 1) {
		header('Location: admin/index.php');
	}
} 	
?>
<?php require_once 'php/core.php'; ?>
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
			<div class="col-md-8">
				<div class="card mt-4">
					<div class="card-header"><h2>Make your request here</h2></div>
					<div class="card-body">
						<form action="php/votes.php">
							<label for="requestForVoteDescription">Description</label>
							<textarea class="form-control" name="requestForVoteDescription" placeholder="Why do you want to vote again?"></textarea>
							<input type="submit" class="btn btn-primary float-right mt-4">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>