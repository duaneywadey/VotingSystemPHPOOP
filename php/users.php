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

	if($userObj->registerAUser($username, $password)) {
		header("Location: ../index.php");
	}
}



?>