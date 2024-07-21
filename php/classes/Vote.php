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

	public function checkIfPersonAlreadyVoted($user_id, $election_id){
		try {
			$sql = "SELECT * FROM votes WHERE user_id = ? AND election_id = ?";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$user_id, $election_id]);

			if ($stmt->rowCount() > 0) {
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

	public function addNewVote($submitted_vote_id, $user_id, $election_id, $category_id, $candidate_id) {
		try {
			$sql = "INSERT INTO votes (submitted_vote_id, user_id, election_id, category_id, candidate_id) VALUES (?,?,?,?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$submitted_vote_id, $user_id, $election_id, $category_id, $candidate_id]);
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

	public function findUserVoteRequest($user_id) {
		try {
			$sql = "SELECT * FROM another_vote_requests WHERE user_id = ?";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute([$user_id]);
			if ($stmt->rowCount() > 0) {
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

	public function requestToVoteAgain($description, $user_id) {
		try {
			$sql = "INSERT INTO another_vote_requests(description, user_id) VALUES(?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$description, $user_id]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

}

?>