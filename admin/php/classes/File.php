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