<?php 
require_once 'core.php'; 

if (isset($_POST['addCandidateBtn'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$address = $_POST['address'];
	$category_id = $_POST['category_id'];

	if($candidateObj->addNewCandidate($first_name, $last_name, $address, $_GET['election_id'], $category_id)) {
		header('Location: ../add-a-candidate.php?election_id=' . $_GET['election_id']);
	}
}

?>
