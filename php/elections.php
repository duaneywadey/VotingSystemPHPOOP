<?php  
require_once 'core.php';

if (isset($_POST['submitElectionBtn'])) {
	$election_title = $_POST['election_title'];	
	$election_description = $_POST['election_description'];
	
	if($electionObj->addNewElection($election_title, $election_description)) {
		header('Location: ../index.php');
	}	
}

?>