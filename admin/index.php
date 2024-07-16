<?php 
require_once 'php/core.php'; 
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

if (isset($_SESSION['is_admin'])) {
	if ($_SESSION['is_admin'] == 0) {
		header('Location: errorpage.php');
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
			<h1>Welcome to the <strong>Admin Panel!</strong> <span class="text-primary"><?php echo $_SESSION['username']; ?></span></h1>
			<?php $viewAllElections = $electionObj->viewAllElections();?>
			<?php if (!empty($viewAllElections)) { ?>
				<?php foreach ($viewAllElections as $col) { ?>
					<div class="col-md-12">
						<div class="card mt-4">
							<div class="card-header">
								<h4><?php echo $col['election_title']; ?></h4>
							</div>
							<div class="card-body">
								<a href="votes.php?election_id=<?php echo $col['election_id']; ?>" class="badge badge-success">Vote Now!</a>
							</div>
						</div>
					</div>
					<?php } ?>
			<?php } else { ?>
				<div class="card mt-4 shadow p-3 mb-5 bg-white rounded">
					<div class="card-body">
						<h1>This section is empty. Please contact your administrator for assistance.</h1>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>