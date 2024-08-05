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
			<div class="col-md-12">
				<h1>All albums by <span class="text-primary"><?php echo $_SESSION['username']?></span></h1>
				<button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#exampleModal">New Album</button>
			</div>
			<div class="row mt-4">
				<?php $seeAllAlbumsByUser = $albumObj->seeAllAlbumsByUser($_SESSION['user_id']); ?>
				<?php foreach ($seeAllAlbumsByUser as $album) { ?>
				<div class="col-md-4 mt-4">
					<div class="card">
						<div class="card-body">
							<a href="upload-images.php?album_id=<?php echo $album['all_user_album_id'] ?>&album_title=<?php echo $album['album_title']; ?>">
								<h2><?php echo $album['album_title']; ?></h2>
							</a>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Add New Album</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
	      <div class="modal-body">
	      	<form action="php/albums.php" method="POST">
	      		<div class="form-group">
	      			<label>Album Name</label>
	      			<input type="text" class="form-control" name="album_title">
	      		</div>
	      </div>
	      <div class="modal-footer">
	        <button type="submit" class="btn btn-primary" name="addAlbumBtn">Save changes</button>
	      </div>
	      </form>
	    </div>
	  </div>
</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>