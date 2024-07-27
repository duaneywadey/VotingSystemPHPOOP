<?php 
require_once 'php/core.php';
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

if (isset($_SESSION['is_admin'])) {
	if ($_SESSION['is_admin'] == 1) {
		header('Location: admin/index.php');
	}
} 	
?>
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
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card mt-4">
					<div class="card-header"><h2>Make your request here</h2></div>
					<div class="card-body">

						<?php if (isset($_SESSION['vote_request_sent'])) { ?>
						<div class="alert alert-success" role="alert">
							<?php echo $_SESSION['vote_request_sent']; ?>
						</div>
						<?php } unset($_SESSION['vote_request_sent']); ?>

						<?php if ($voteObj->findUserVoteRequest($_SESSION['user_id'], $_GET['election_id'])) { ?>
							<h2>Please wait for the admin if he approves your request</h2>
						<?php } else { ?>
						<form action="php/votes.php" method="POST">
							<label for="requestForVoteDescription">Description</label>
							<input type="hidden" name="election_id" value="<?php echo $_GET['election_id']; ?>">
							<textarea class="form-control" name="requestForVoteDescription" placeholder="Why do you want to vote again?"></textarea>
							<input type="submit" class="btn btn-primary float-right mt-4" name="requestForVoteBtn">
						<?php } ?>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>