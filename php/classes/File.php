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

	public function saveImage($image_title, $user_id) {
		try {
			$sql = "INSERT INTO user_images (image_title, user_id) VALUES (?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$image_title, $user_id]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function showAllUserImages($user_id) {
		try {
			$sql = "SELECT * FROM user_images WHERE user_id = ? ORDER BY date_added DESC";
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