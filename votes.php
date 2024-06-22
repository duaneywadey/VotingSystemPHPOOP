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
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">
						<?php $getCategoriesByElectionId = $categoryObj->getCategoriesByElectionId($_GET['election_id']);?>
						<?php foreach ($getCategoriesByElectionId as $col) {?>
							<div class="col-md-12">
								<div class="card mt-4">
									<div class="card-header"><?php echo $col['category_title']; ?></div>

									<div class="card-body">
										<form action="php/votes.php?election_id=<?php echo $_GET['election_id']; ?>" method="POST">
											<?php $viewAllCandidatesById = $candidateObj->viewAllCandidatesById($_GET['election_id'], $col['category_id']); ?>
											<?php foreach ($viewAllCandidatesById as $colTwo) { ?>
												<div class="form-check">
													<input class="form-check-input" type="radio" id="exampleRadios1" name="<?php echo $col['category_id']; ?>" value="<?php echo $colTwo['candidate_id']; ?>">
													<label class="form-check-label" for="exampleRadios1">
														<?php echo $colTwo['first_name']; ?>
													</label>
												</div>
											<?php } ?>
									</div>

								</div>
							</div>
						<?php } ?>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-primary m-4 float-right" value="Submit" name="addVoteBtn">  
					</div>
					</form>
				</div>
			</div>
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