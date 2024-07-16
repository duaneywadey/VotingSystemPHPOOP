<?php  

require_once 'core.php';

$allUserInfo = $userObj->getAllUsers();

// foreach ($allUserInfo as $key => $value) {
// 	echo "<br>" . $key . " - " . $value['username'];
// }

// foreach ($allUserInfo as $key) {
// 	echo "<br>" . $key['username'];
// }


// Prints indexes
// $data = array("element1", "element2", "element3", "element4");

// foreach ($data as $key => $value) {
// 	echo $key;
// }

// Prints values
// $data = array("element1", "element2", "element3", "element4");

// foreach ($data as $element) {
// 	echo $element[0];
// }


if (isset($_POST['registerBtn'])) {
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$confirmPassword = $_POST['confirmPassword'];

	if ($password == $confirmPassword) {

		if($userObj->registerAUser($username, $password)) {
			header("Location: ../index.php");
		}
		else {
			echo "Username already exists!";
		}
		
	}
	else {
		echo "Passwords dont match!";
	}
	
}

if (isset($_POST['loginBtn'])) {

	$username = $_POST['username'];
	$password = $_POST['password'];

	if ($userObj->loginAUser($username, $password)) {
		header('Location: ../index.php');
	}
	else {
		echo "Invalid email/password";
	}
}

if (isset($_GET['logoutAUser'])) {
	unset($_SESSION['user_id']);
	unset($_SESSION['is_admin']);
	unset($_SESSION['username']);
	header('Location: ../index.php');
}

?>