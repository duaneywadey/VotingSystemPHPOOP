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

	public function viewAllCandidates() {
		try {
			$sql = "SELECT * FROM candidates";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		} 
	}

	public function viewAllCandidatesById($election_id, $category_id) {
		try {
			$sql = "SELECT * FROM candidates 
					WHERE election_id=? AND category_id=?
					";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$election_id, $category_id]);
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		} 
	}

}

?>