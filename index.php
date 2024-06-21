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
			<?php foreach ($viewAllElections as $row) { ?>
			<div class="col-md-12">
				<div class="card mt-4">
					<div class="card-header">
						<h4><?php echo $row['election_title']; ?></h4>
					</div>
					<div class="card-body">
						<p><?php echo $row['election_description']; ?></p>
						<a href="categories.php">See More</a>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
	<script>
		$('.card-body').on('click', function (e) {
			alert($(this).text());
		})
	</script>
</body>
</html>