<?php 

class Candidate {
	
	public function __construct($pdo) {
		try {
			$this->pdo = $pdo;
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function addNewCandidate($first_name, $last_name, $address, $election_id, $category_id) {
		try {
			$sql = "INSERT INTO candidates (first_name, last_name, address, election_id, category_id) VALUES (?,?,?,?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$first_name, $last_name, $address, $election_id, $category_id]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

?>