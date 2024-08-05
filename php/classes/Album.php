<?php 

class Album {
	
	public function __construct($pdo) {
		try {
			$this->pdo = $pdo;
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function addNewAlbum($album_title, $user_id) {
		try {
			$sql = "INSERT INTO all_user_albums (album_title, user_id) VALUES (?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$album_title, $user_id]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function seeAllAlbumsByUser($user_id) {
		try {
			$sql = "SELECT * FROM all_user_albums WHERE user_id = ?";
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