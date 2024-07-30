<?php  

require_once 'core.php';

if (isset($_POST['sendMessageBtn'])) {
	$description = $_POST['description'];
	$receiver_id = $_POST['receiver_id'];
	$receiver_username = $_POST['receiver_username'];
	if ($messageObj->sendAMessage($_SESSION['user_id'], $receiver_id, $description)) {
		header("Location: ../send-a-message.php?user_id=" . $receiver_id . "&username=" . $receiver_username);
	}
	
}


?>