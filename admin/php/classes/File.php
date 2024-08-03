<?php 

class File
{
	
	public function __construct($pdo) {
		try {
			$this->pdo = $pdo;
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}


	public function returnJSONSuccessful($greeting) {
		try {
			
			if ($greeting == "Sucessful") {
				$response = [
					'status' => 200,
					'msg' => 'yes, its successful'
				];
			}
			else {
				$response = [
					'status'=>404,
					'msg' => 'error with da file'
				];
			}

			return json_encode($response);

		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function checkIfNotTooLarge($image) {
		if ($image['size'] < 1000000) {
			return true;
		}
		else {
			return false;
		}
	}

	public function saveImage($file_name, $temp_file_name, $user_id) {
		try {
			$sql = "INSERT INTO admin_files (file_name, added_by) VALUES (?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$file_name, $user_id]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function showAllImages() {
		try {
			$sql = "SELECT * FROM admin_files";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	public function showAllUsersWithImage() {
		try {
			$sql = "SELECT 
						DISTINCT users.username AS username,
						users.user_id AS user_id
					FROM users 
					JOIN user_images ON users.user_id = user_images.user_id 
					WHERE users.user_id IN ( 
						SELECT user_id FROM user_images 
					)
					";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}
	public function showAllImagesByUser($user_id) {
		try {
			$sql = "SELECT * FROM user_images 
					WHERE user_id = ? 
					ORDER BY date_added DESC";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$user_id]);
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}

	}	

}

?>