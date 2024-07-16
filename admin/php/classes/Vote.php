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

	public function showVotesByCategory($election_id, $category_id) {
		try {
			$sql = "SELECT 
						candidates.candidate_id AS candidate_id,
						CONCAT(candidates.first_name, ' ', candidates.last_name) AS candidate_name,
						categories.category_id AS category_id,
						COUNT(votes.vote_id) AS vote_count						
					FROM candidates
					LEFT JOIN votes ON candidates.candidate_id = votes.candidate_id
					LEFT JOIN categories ON votes.category_id = categories.category_id
						WHERE votes.election_id = ? AND votes.category_id = ?
					GROUP BY candidate_name, category_id
					ORDER BY vote_count DESC
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