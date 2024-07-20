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
	<?php include 'includes/header.php'; ?>
	<title>Hello, world!</title>
	<style>
		.listOfCandidates > li:first-child {
			background-color: yellow;
		}
	</style>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card"></div>
			</div>
		</div>
	</div>

	<?php include 'includes/footer.php'; ?>
</body>
</html>