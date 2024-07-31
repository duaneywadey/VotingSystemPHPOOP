<?php 

require_once 'core.php';

if (isset($_POST['addImageBtn'])) {
	$file_name = $_FILES['image']['name'];
	$temp_file_name = $_FILES['image']['tmp_name'];

	if ($fileObj->saveImage($file_name, $temp_file_name, $_SESSION['user_id'])) {
		$folder = "../admin_images/".$file_name;

		if (move_uploaded_file($temp_file_name, $folder)) {
			header("Location: ../add-admin-image.php");
		}
		
	}

}

?>