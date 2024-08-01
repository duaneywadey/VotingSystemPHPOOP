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
					<div class="card-header"><h3>Add New Image</h3></div>
					<div class="card-body">

						<?php if (isset($_SESSION['too_large_alert'])) { ?>
							<div class="alert alert-danger" role="alert">
								<?php echo $_SESSION['too_large_alert']; ?>
							</div>
						<?php } unset($_SESSION['too_large_alert']); ?>

						<?php if (isset($_SESSION['successfully_saved_image'])) { ?>
							<div class="alert alert-success" role="alert">
								<?php echo $_SESSION['successfully_saved_image']; ?>
							</div>
						<?php } unset($_SESSION['successfully_saved_image']); ?>

						<form action="php/files.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label for="imageFile">Upload Image</label>
								<input type="file" name="image" class="form-control" accept=".jpg, .jpeg" required>
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary float-right" name="addImageBtn">
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