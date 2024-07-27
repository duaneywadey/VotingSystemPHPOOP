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
						<h1 class="text-primary"><?php echo $voteRequest['username']; ?></h1>
						<small><?php echo $voteRequest['date_added']; ?></small>
						<h3 class="mt-4">Election Name: <span class="text-secondary"><?php echo $voteRequest['election_title']; ?></span></h3>
						<p><?php echo $voteRequest['description']; ?></p>
						<a data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">Show Recent Vote</a>
						<div class="collapse" id="collapseExample">
							<div class="card mt-4 mb-4">
								<div class="card-body">
									<table class="table">
									  <thead>
									    <tr>
									      <th scope="col">Username</th>
									      <th scope="col">Voting ID</th>
									      <th scope="col">Election Title</th>
									      <th scope="col">Category Title</th>
									      <th scope="col">Candidate Name</th>
									      <th scope="col">Date Added</th>
									    </tr>
									  </thead>
									  <tbody>
									  	<?php $viewUsersLastVote = $voteObj->viewUsersLastVote($voteRequest['user_id'], $voteRequest['election_id']); ?>
									  	<?php foreach ($viewUsersLastVote as $voteRequestTwo) { ?>
									    <tr>
									      <td><?php echo $voteRequestTwo['username']; ?></td>
									      <td><?php echo $voteRequestTwo['submitted_vote_id']; ?></td>
									      <td><?php echo $voteRequestTwo['election_title']; ?></td>
									      <td><?php echo $voteRequestTwo['category_title']; ?></td>
									      <td><?php echo $voteRequestTwo['candidate_first_name']; ?></td>
									      <td><?php echo $voteRequestTwo['date_added']; ?></td>
									    </tr>
										<?php } ?>
									  </tbody>
									</table>
								</div>
							</div>
						</div>
						<form action="php/votes.php" method="POST">
							<input type="hidden" value="<?php echo $voteRequest['user_id']; ?>" name="user_id">
							<input type="hidden" value="<?php echo $voteRequest['election_id']; ?>" name="election_id">
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