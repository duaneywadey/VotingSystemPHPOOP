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
			<h1 class="text-primary"><strong><?php echo $_GET['username']; ?></strong></h1>
			<?php $showAllImagesByUser = $fileObj->showAllImagesByUser($_GET['user_id']); ?>
			<?php foreach ($showAllImagesByUser as $image) { ?>
			<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-header">
						<h2><?php echo $image['date_added']; ?></h2>
					</div>
					<div class="card-body">
						<img src="../user_images/<?php echo $image['image_title']; ?>" alt="" class="" style="width:100%;">
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>

