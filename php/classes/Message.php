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
						sender_id, 
						receiver_id, 
						description 
					FROM messages 
					WHERE sender_id = 34 AND receiver_id = 26 
					UNION ALL 
					SELECT 
						sender_id, 
						receiver_id, 
						description 
					FROM messages 
					WHERE sender_id = 26 AND receiver_id = 34;
					";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$sender_id, $receiver_id]);
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}

	}

}

?>