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
	<?php include 'includes/header.php'; ?>
	<title>Hello, world!</title>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
		<div class="row mt-4">
			<h1><?php echo $_GET['album_title']; ?></h1>
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Upload an Image</div>
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

						<form action="php/files.php?album_id=<?php echo $_GET['album_id']; ?>&album_title=<?php echo $_GET['album_title']; ?>" method="POST" enctype="multipart/form-data">
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
		<div class="row mt-4">
			<?php $seeAllPhotosByAlbum = $albumObj->seeAllPhotosByAlbum($_GET['album_id']); ?>
			<?php foreach ($seeAllPhotosByAlbum as $image) { ?>
			<div class="col-md-4">
				<div class="card mt-4">
					<div class="card-header"><h3><?php echo $image['date_added']; ?></h3></div>
					<div class="card-body">
						<a href="user_images/<?php echo $image['image_title']; ?>">
							<img src="user_images/<?php echo $image['image_title']; ?>" width="100%" alt="">
						</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>