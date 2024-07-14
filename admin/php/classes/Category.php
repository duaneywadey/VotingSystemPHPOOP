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

	public function addNewCategory($category_title, $category_description, $election_id, $is_multiselect) {
		try {
			$sql = "INSERT INTO categories (category_title, category_description, election_id, is_multiselect) VALUES (?,?,?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$category_title, $category_description, $election_id, $is_multiselect]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function getCategoriesByElectionId($election_id) {
		try {
			$sql = "SELECT * FROM categories WHERE election_id=?";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$election_id]);
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

?>