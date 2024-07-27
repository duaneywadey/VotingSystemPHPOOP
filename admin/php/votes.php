<?php  
require_once 'core.php';

if (isset($_POST['addVoteBtn'])) {

	$random = 'abcdefghijklmnopqrstuvwxyz0123456789';
	$submittedVoteID = '';

	for ($i = 0; $i < 10; $i++) {
      $submittedVoteID .= $random [rand(0, strlen($random ) - 1)];
  	}
	
	$submittedVotes = $_POST;
	foreach ($submittedVotes as $key => $value) {
		if ($value != "Submit") {
			if ($voteObj->addNewVote($submittedVoteID, $_SESSION['user_id'], $_GET['election_id'], $key, $value)) {
				echo "string";
			}
		}
		foreach ($value as $keyTwo => $valueTwo) {
			if ($voteObj->addNewVote($submittedVoteID, $_SESSION['user_id'], $_GET['election_id'], $key, $valueTwo)) {
				echo "string";
			}
		}
	}
	header('Location: ../voting-results.php');
}

if (isset($_POST['acceptVoteAgainRequestBtn'])) {

	$another_vote_requests_id = $_POST['another_vote_requests_id'];
	$election_id = $_POST['election_id'];
	$user_id = $_POST['user_id'];


	if ($voteObj->acceptRequestToVoteAgain($another_vote_requests_id)) {
		if ($voteObj->deleteAllUsersOlderVotes($user_id, $election_id)) {
			header('Location: ../voting-requests.php');
		}
	}
}

?>