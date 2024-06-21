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
				<div class="card mt-4">
					<div class="card-header">
						<h4>Election January 2024<button class="float-right btn btn-primary"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Category <i class="fa fa-plus" aria-hidden="true"></i> </button></h4>
					</div>
					<div class="card-body">
						<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Officiis enim distinctio maxime, dolores nesciunt eaque voluptate a, molestiae tempora quia dolorem iure aut doloremque. Suscipit exercitationem provident ad, at vel.</p>
						<a href="add-a-candidate.php">View Candidates</a>
					</div>
				</div>
			</div>
			<div class="col-md-12 mt-4">
				<div class="card">
					<div class="card-header">
						<h4>Election February 2024<button class="float-right btn btn-primary"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Category <i class="fa fa-plus" aria-hidden="true"></i> </button></h4>
					</div>
					<div class="card-body">
						<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Officiis laudantium totam laborum adipisci, dolorum tempora ab, mollitia. Debitis iusto vero illum aut eum possimus architecto ut velit dolorem ex, reprehenderit.</p>
						<a href="add-a-candidate.php">View Candidates</a>
					</div>
				</div>
			</div>
		</div>
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
					<form action="#" method="POST">
						<div class="form-group">
							<label for="election">Category</label>
							<input type="text" class="form-control" name="categoryName">
						</div>
						<div class="form-group">
							<label for="election">Description</label>
							<input type="text" class="form-control" name="categoryName">
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Save changes</button>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>