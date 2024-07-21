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
	
	// echo "<pre>";
	// print_r($submittedVotes);
	// echo "<pre>";

	header('Location: ../voting-results.php');
}

if (isset($_POST['requestForVoteBtn'])) {
	$requestForVoteDescription = $_POST['requestForVoteDescription'];
	if ($voteObj->requestToVoteAgain($requestForVoteDescription, $_SESSION['user_id'])) {
		header('Location: ../votes.php');
	}
	else {
		echo "failed";
	}
}

?>