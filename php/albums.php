<?php 
require_once 'core.php';

if (isset($_POST['addAlbumBtn'])) {
	$album_title = $_POST['album_title'];
	
	if ($albumObj->addNewAlbum($album_title, $_SESSION['user_id'])) {
		header("Location: ../all-albums.php");
	}
	else {
		echo "Failed request";
	}

}


?>