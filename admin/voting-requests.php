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
	<style>
		.listOfCandidates > li:first-child {
			background-color: yellow;
		}
	</style>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
		<div class="row">
			<h1 class="p-2">Requests to Vote Again</h1>
			<?php $voteRequests = $voteObj->showAnotherVoteRequests(); ?>
			<?php foreach ($voteRequests as $voteRequest) {?>
			<div class="col-md-12 p-2">
				<div class="card">
					<div class="card-body">
						<h2><?php echo $voteRequest['username']; ?></h2>
						<small><?php echo $voteRequest['date_added']; ?></small>
						<p class="mt-4"><?php echo $voteRequest['description']; ?></p>
						<form action="php/votes.php" method="POST">
							<input type="hidden" value="<?php echo $voteRequest['user_id']; ?>" name="user_id">
							<input type="hidden" value="<?php echo $voteRequest['another_vote_requests_id']; ?>" name="another_vote_requests_id">
							<input type="submit" class="btn btn-primary float-right" value="Accept" name="acceptVoteAgainRequestBtn">
						</form>
					</div>
				</div>
			</div>
			<?php } ?>
		</div>
	</div>

	<?php include 'includes/footer.php'; ?>
</body>
</html>