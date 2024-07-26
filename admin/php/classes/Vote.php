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

	public function showAnotherVoteRequests() {
		try {
			$sql = "SELECT 
						users.username AS username,
						another_vote_requests.user_id AS user_id,
						another_vote_requests.another_vote_requests_id AS another_vote_requests_id,
						another_vote_requests.description AS description,
						another_vote_requests.is_accepted AS is_accepted,
						another_vote_requests.date_added AS date_added,
						elections.election_title AS election_title
					FROM users
					JOIN another_vote_requests ON users.user_id = another_vote_requests.user_id
					JOIN elections ON another_vote_requests.election_id = elections.election_id
					WHERE another_vote_requests.is_accepted = 0
					";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function acceptRequestToVoteAgain($another_vote_requests_id) {
		try {
			$sql = "UPDATE 
						another_vote_requests 
					SET is_accepted = 1 
					WHERE another_vote_requests_id = ?";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$another_vote_requests_id]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function deleteAllUsersOlderVotes($user_id, $election_id) {
		try {
			$sql = "DELETE FROM votes WHERE user_id = ? AND election_id = ?";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$user_id, $election_id]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}

	}

	// public function viewUsersLastVote($user_id)
	// {
	// 	// code...
	// }

}

?>