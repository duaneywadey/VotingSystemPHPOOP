<?php 

class Category {
	
	public function __construct($pdo) {
		try {
			$this->pdo = $pdo;
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function addNewCategory($category_title, $category_description, $election_id) {
		try {
			$sql = "INSERT INTO categories (category_title, category_description, election_id) VALUES (?,?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$category_title, $category_description, $election_id]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

?>