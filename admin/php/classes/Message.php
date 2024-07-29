<?php 

class Message  
{
	
	public function __construct($pdo) {
		try {
			$this->pdo = $pdo;
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function sendAMessage($sender_id, $receiver_id, $description) {
		try {
			$sql = "INSERT INTO messages (sender_id, receiver_id, description) VALUES(?,?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$sender_id, $receiver_id, $description]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function showMsgFromSenderAndReceiver($sender_id, $receiver_id) {
		try {
			$sql = "SELECT
						users.user_id AS user_id
						users.username AS username,
						messages.description AS messageDescription,
						messages.date_added AS dateAdded
					FROM users
					JOIN messages ON users.user_id = messages.sender_id
					UNION
					SELECT
						users.user_id AS user_id
						users.username AS username,
						messages.description AS messageDescription,
						messages.date_added AS dateAdded
					FROM users
					JOIN messages ON users.user_id = messages.receiver_id
					ORDER BY dateAdded DESC
					";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$sender_id, $receiver_id, $description]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}

	}

}

?>