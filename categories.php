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
		<div class="row">
			<h1 class="mt-4">Make Sure All Entries Are Filled</h1>
			<?php $getCategoriesByElectionId = $categoryObj->getCategoriesByElectionId($_GET['election_id']);?>
			<?php foreach ($getCategoriesByElectionId as $col) {?>
			<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-header"><?php echo $col['category_title']; ?></div>
					<div class="card-body">
						<form action="php/categories.php" method="POST">
							<?php $viewAllCandidatesById = $candidateObj->viewAllCandidatesById($_GET['election_id'], $col['category_id']); ?>
							<?php foreach ($viewAllCandidatesById as $colTwo) { ?>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1">
								<label class="form-check-label" for="exampleRadios1">
									<?php echo $colTwo['first_name']; ?>
								</label>
							</div>
							<?php } ?>
							<button type="submit" class="btn btn-primary mt-4">Submit</button>
						</form>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
	<script>
		const fruits = []


		$('.multi-select').change(function(e){
			var ischecked= $(this).is(':checked');

			if ($('.multi-select:checked').length > 3) {
				$(this).prop('checked',false);
				alert("allowed only 3");

				if(!$('.multi-select:checked')) {
					$(this).prop('disabled',true);
				}
			}

		})

	</script>
</body>
</html>