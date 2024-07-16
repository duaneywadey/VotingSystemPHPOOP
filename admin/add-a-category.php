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
</head>
<body>
<?php include 'includes/navbar.php'; ?>
<div class="container">
	<div class="row mt-4">
		<?php $viewAllElections = $electionObj->viewAllElections(); ?>
		<?php if (!empty($viewAllElections)) { ?>
			<?php foreach ($viewAllElections as $col) { ?>
				<div class="col-md-12">
					<div class="card mt-4">
						<div class="card-header">
							<h1><?php echo $col['election_title']; ?><button value="<?php echo $col['election_id']; ?>" class="addCategoryBtn float-right btn btn-primary" data-toggle="modal" data-target="#exampleModal">Add New Category <i class="fa fa-plus" aria-hidden="true"></i> </button></h1>
						</div>
						<div class="card-body">
							<h4 class="card-title">Election Categories</h4>
							<ul class="list-group">
							<?php $getCategoriesByElectionId = $categoryObj->getCategoriesByElectionId($col['election_id']); ?>
							<?php foreach ($getCategoriesByElectionId as $col) { ?>
							  <li class="list-group-item"><?php echo $col['category_title']; ?></li>
							<?php } ?>
							</ul>
							<div class="linkGroup ml-2 mt-4">
								<a href="add-a-candidate.php?election_id=<?php echo $col['election_id']; ?>">View Candidates</a>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			<?php } else { ?>
			<div class="card shadow p-3 mb-5 bg-white rounded">
				<div class="card-body">
					<h1>This section is empty. Please contact your administrator for assistance.</h1>
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
						<div class="form-check">
						    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="is_multiselect">
						    <label class="form-check-label" for="exampleCheck1">Enable Multiple Candidates</label>
						</div>
						<div class="form-group">
							<input type="submit" class="btn btn-primary float-right" name="addCategoryBtn">
						</div>
					</form>
				</div>
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