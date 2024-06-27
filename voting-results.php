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
		<div class="row justify-content-center">
			<?php $viewAllElections = $electionObj->viewAllElections();?>
			<?php foreach ($viewAllElections as $col) { ?>
				<div class="col-md-12 mt-4">
					<div class="card">
						<div class="card-header"><h1><?php echo $col['election_title']; ?></h1></div>
						<div class="card-body">
							<?php $getCategoriesByElectionId = $categoryObj->getCategoriesByElectionId($col['election_id']); ?>
							<?php foreach ($getCategoriesByElectionId as $colTwo) { ?>
								<div class="card mt-4">
									<div class="card-body">
										<div class="categoryList">
											<h4><?php echo $colTwo['category_title']; ?></h4>
											<ul>
												<?php $showVotesByCategory = $voteObj->showVotesByCategory($col['election_id'], $colTwo['category_id']); ?>
												<?php foreach ($showVotesByCategory as $colThree) { ?>
													<li><?php echo $colThree['candidate_first_name'];?>
													<ul>
														<li><?php echo $colThree['vote_count']; ?> votes</li>
													</ul>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
<?php include 'includes/footer.php'; ?>
</body>
</html>