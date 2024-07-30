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
						description,
						date_added
					FROM messages 
					WHERE sender_id = ? AND receiver_id = ? 
					UNION ALL 
					SELECT 
						sender_id, 
						receiver_id, 
						description,
						date_added 
					FROM messages 
					WHERE receiver_id = ? AND sender_id = ?
					ORDER BY date_added
					";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$sender_id, $receiver_id, $sender_id, $receiver_id]);
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	public function getUserById($user_id) {
		try {
			$sql = "SELECT * FROM users WHERE user_id = ?";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$user_id]);
			return $stmt->fetch();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllReceiversByUser($user_id) {
		try {
			$sql = "SELECT DISTINCT sender_id 
					FROM messages 
					WHERE sender_id = ? OR receiver_id = ?
					UNION 
					SELECT DISTINCT receiver_id 
					FROM messages 
					WHERE sender_id = ? OR receiver_id = ?
					";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$user_id, $user_id, $user_id, $user_id]);
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

?>