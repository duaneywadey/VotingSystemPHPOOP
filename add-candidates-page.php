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
			<?php $viewAllElections = $electionObj->viewAllElections(); ?>
			<?php foreach ($viewAllElections as $col) { ?>
				<div class="col-md-12">
					<div class="card mt-4">
						<div class="card-header">
							<h4><?php echo $col['election_title']; ?><button value="<?php echo $col['election_id']; ?>" class="addCategoryBtn float-right btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Category <i class="fa fa-plus" aria-hidden="true"></i> </button></h4>
						</div>
						<div class="card-body">
							<p><?php echo $col['election_description']; ?></p>
							<a href="add-a-candidate.php">View Candidates</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>
		<!-- Modal -->
		<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form action="php/categories.php" method="POST">
							<div class="form-group">
								<label for="election">Category</label>
								<input type="hidden" class="election_id form-control" name="election_id">
								<input type="text" class="category_title form-control" name="category_title">
							</div>
							<div class="form-group">
								<label for="election">Description</label>
								<input type="text" class="category_description form-control" name="category_description">
							</div>
							<div class="form-group">
								<input type="submit" class="btn btn-primary float-right" name="addCategoryBtn">
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>

	<?php include 'includes/footer.php'; ?>
	<script>
		$('.addCategoryBtn').on('click', function (e) {
			var election_id = $(this).val(); 
			$('.election_id').val(election_id);
		})

		$('.modal').on("hide.bs.modal", function() {
			$('.election_id').val("");
			$('.category_title').val("");
			$('.category_description').val("");
		})

	</script>
</body>
</html>