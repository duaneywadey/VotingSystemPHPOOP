<?php 

class User {
	
	public function __construct($pdo) {
		try {
			$this->pdo = $pdo;
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function registerAUser($username, $password) {
		try {
			$sql = "SELECT * FROM users WHERE username=?";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$username]);

			if ($stmt->rowCount() == 0) {
				$sql = "INSERT INTO users (username, password) VALUES (?,?)";
				$stmt = $this->pdo->prepare($sql);
				return $stmt->execute([$username, $password]);
			}
			else {
				return false;
			}
			
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function loginAUser($username, $password) {
		try {

			// Check if username exists
			$sql = "SELECT * FROM users WHERE username = ?";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$username]);

			// If it exists, get all values from the row
			if ($stmt->rowCount() > 0) {
				
				// Returns associative array
				$userInfoRow = $stmt->fetch();

				// Get individual values
				$user_id = $userInfoRow['user_id'];
				$is_admin = $userInfoRow['is_admin'];
				$username = $userInfoRow['username'];
				$hashedPassword = $userInfoRow['password'];

				// Verify if inputted password is correct
				if (password_verify($password, $hashedPassword)) {

					// If the inputted password and password from the database are both same, store user info as session variables. 
					$_SESSION['user_id'] = $user_id;
					$_SESSION['is_admin'] = $is_admin;
					$_SESSION['username'] = $username;
					return true;
				}
				else {
					return false;
				}

			}
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getAllUsers() {
		try {
			$sql = "SELECT * FROM users";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function updateAdminStatus($user_id) {
		try {
			$sql = "UPDATE users SET is_admin = 1 WHERE user_id = ?";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$user_id]);	
		} 
		catch (PDOException $e) {
			die($e->getMessage());

		}
	}

	public function disableAdminStatus($user_id) {
		try {
			$sql = "UPDATE users SET is_admin = 0 WHERE user_id = ?";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$user_id]);	
		} 
		catch (PDOException $e) {
			die($e->getMessage());

		}
	}

	public function insertIntoAdminAccessEventLogs($admin_id, $admin_who_updated) {
		try {
			$sql = "INSERT INTO admin_access_event_logs (admin_id, admin_who_updated) VALUES(?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$admin_id, $admin_who_updated]);	
		} 
		catch (PDOException $e) {
			die($e->getMessage());

		}	
	}

}

?>