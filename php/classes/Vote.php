<?php 

class Vote  
{
	
	public function __construct($pdo) {
		try {
			$this->pdo = $pdo;
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function addNewVote($election_id, $category_id, $candidate_id) {
		try {
			$sql = "INSERT INTO votes (election_id, category_id, candidate_id) VALUES (?,?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$election_id, $category_id, $candidate_id]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

?>