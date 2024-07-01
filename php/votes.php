<?php  
require_once 'core.php';

if (isset($_POST['addVoteBtn'])) {

	// echo "<pre>";
	// print_r($submittedVotes);
	// echo "<pre>";

	// foreach ($submittedVotes as $key => $value) {
	// 	if ($voteObj->addNewVote($_GET['election_id'], $key, $value)) {
	// 		echo "success";
	// 	}
	// 	else {
	// 		echo "fail";
	// 	}
	// }

	// if (!empty($_POST['multiSelect'])) {
	// 	foreach ($_POST['multiSelect'] as $key => $value) {
	// 		echo $key . " - " . $value . "<br>";
	// 	}
	// }

	// echo "CategoryID: " . $submittedVotes['multiselect_category_id']. "<br>";
	// echo "CandidateID: " . $submittedVotes['individual_category_id']. "<br>";

	$submittedVotes = $_POST;
	foreach ($submittedVotes as $key => $value) {
		if ($value != "Submit") {
			if ($voteObj->addNewVote($_GET['election_id'], $submittedVotes['individual_category_id'], $value)) {
					header("Location: ../voting-results.php");
				}	
		}
		foreach ($value as $key => $val) {
			if ($voteObj->addNewVote($_GET['election_id'], $submittedVotes['multiselect_category_id'], $val)) {
				header("Location: ../voting-results.php");
			}
		}
	}
	
}



?>