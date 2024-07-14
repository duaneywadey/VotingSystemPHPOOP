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
		<div class="row mt-4 justify-content-center">
			<?php $getCategoriesByElectionId = $categoryObj->getCategoriesByElectionId($_GET['election_id']); ?>
			<?php foreach ($getCategoriesByElectionId as $col) { ?>
				<div class="col-md-12">
					<div class="card mt-4">
						<div class="card-header">
							<h3><?php echo $col['category_title']; ?><button value="<?php echo $col['category_id']; ?>" class="newCandidateBtn float-right btn btn-primary"  class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Candidate <i class="fa fa-plus" aria-hidden="true"></i> </button></h3>
						</div>
						<div class="card-body">
							<table class="table">
								<thead>
									<tr>
										<th scope="col">First Name</th>
										<th scope="col">Last Name</th>
										<th scope="col">Address</th>
										<th scope="col">Date Added</th>
									</tr>
								</thead>
								<tbody>
									<?php $viewAllCandidates = $candidateObj->viewAllCandidatesById($_GET['election_id'], $col['category_id']); ?>
									<?php foreach ($viewAllCandidates as $col) { ?>
									<tr>
										<td><?php echo $col['first_name'] ?></td>
										<td><?php echo $col['last_name'] ?></td>
										<td><?php echo $col['address'] ?></td>
										<td><?php echo $col['date_added'] ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			<?php } ?>
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
					<form action="php/candidates.php?election_id=<?php echo $_GET['election_id']; ?>" method="POST">
						<div class="form-group">
							<label for="election">First Name</label>
							<input type="hidden" class="category_id form-control" name="category_id">
							<input type="text" class="first_name form-control" name="first_name">
						</div>
						<div class="form-group">
							<label for="election">Last Name</label>
							<input type="text" class="last_name form-control" name="last_name">
						</div>
						<div class="form-group">
							<label for="election">Address of Candidate</label>
							<input type="text" class="address form-control" name="address">
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary" name="addCandidateBtn">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
	<script>
		$('.newCandidateBtn').on('click', function (e) {
			$('.category_id').val($(this).val());
		})
	</script>
</body>
</html>