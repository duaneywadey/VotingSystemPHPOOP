<?php 

class Election  
{
	
	public function __construct($pdo) {
		try {
			$this->pdo = $pdo;
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function addNewElection($election_title, $election_description) {
		try {
			$sql = "INSERT INTO elections (election_title, election_description) VALUES (?,?)";
			$stmt = $this->pdo->prepare($sql);
			return $stmt->execute([$election_title, $election_description]);
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}

	public function viewAllElections() {
		try {
			$sql = "SELECT * FROM elections";
			$stmt = $this->pdo->prepare($sql);
			$stmt->execute();
			return $stmt->fetchAll();
		}
		catch (PDOException $e) {
			die($e->getMessage());
		}
	}


}

?>