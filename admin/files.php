<?php 
require_once 'php/core.php'; 
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

if (isset($_SESSION['is_admin'])) {
	if ($_SESSION['is_admin'] == 0) {
		header('Location: errorpage.php');
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'includes/header.php'; ?>
	<title>Admin Files</title>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
		<div class="row mt-2 justify-content-center">
			<h1>Welcome to the <strong>Admin Panel!</strong> <span class="text-primary"><?php echo $_SESSION['username'] ?></span></h1>
			<?php $showAllImages = $fileObj->showAllImages(); ?>
			<?php foreach ($showAllImages as $image) { ?>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">
						<h1><?php echo $image['file_name']; ?></h1>
					</div>
					<div class="card-body">
						<img src="admin_images/<?php echo $image['file_name']; ?>" width="300" height="300" alt="">
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>

