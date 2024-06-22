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
			<h1>Welcome to the Voting System! <span class="text-success">Vote Now!</span></h1>
			<?php $viewAllElections = $electionObj->viewAllElections();?>
			<?php foreach ($viewAllElections as $col) { ?>
			<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-header">
						<h4><?php echo $col['election_title']; ?></h4>
					</div>
					<div class="card-body">
						<a href="categories.php?election_id=<?php echo $col['election_id']; ?>" class="badge badge-success">Vote Now!</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>