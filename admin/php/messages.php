<?php  

require_once 'core.php';

if (isset($_POST['sendMessageBtn'])) {
	$description = $_POST['description'];
	$receiver_id = $_POST['receiver_id'];
	if ($messageObj->sendAMessage($_SESSION['user_id'], $receiver_id, $description)) {
		header("Location: ../messages.php");
	}
	
}


?>