<?php  
require_once 'core.php';

if (isset($_POST['addVoteBtn'])) {

	$submittedVotes = $_POST;
	foreach ($submittedVotes as $key => $value) {
		if ($value != "Submit") {
			if ($voteObj->addNewVote($_SESSION['user_id'], $_GET['election_id'], $key, $value)) {
				echo "string";
			}
		}
		foreach ($value as $keyTwo => $valueTwo) {
			if ($voteObj->addNewVote($_SESSION['user_id'], $_GET['election_id'], $key, $valueTwo)) {
				echo "string";
			}
		}
	}
	header('Location: ../voting-results.php');
}

?>