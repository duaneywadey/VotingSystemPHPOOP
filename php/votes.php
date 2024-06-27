<?php  
require_once 'core.php';

if (isset($_POST['addVoteBtn'])) {

	$submittedVotes = $_POST;

	foreach ($submittedVotes as $key => $value) {
		if ($voteObj->addNewVote($_GET['election_id'], $key, $value)) {
			echo "success";
		}
		else {
			echo "fail";
		}
	}
}



?>