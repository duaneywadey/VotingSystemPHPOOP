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

	public function validateImage($imageName) {
		try {
			$fileExtension = pathinfo($imageName, PATHINFO_EXTENSION);
			$maxSize = 26214400;
			$check = getimagesize($imageName);
			$response = [];

			if ($check) {
				return true;
			}

			else {
				return false;
			}
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

}

?>