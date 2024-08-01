<?php 

require_once 'core.php';

if (isset($_POST['addImageBtn'])) {

	// Get file name
	$fileName = $_FILES['image']['name'];

	// Get temporary file name
	$tempFileName = $_FILES['image']['tmp_name'];

	// Get file extension
	$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

	// Use the time method for the file's name
	$imageName = time().".".$fileExtension;

	if ($_FILES['image']['size'] > 1000000) {
		echo "File is too large. Please upload a file with less than 5MB";
	}
	
	else {
		// Save image to database
		if ($fileObj->saveImage($imageName, $tempFileName, $_SESSION['user_id'])) {
			$folder = "../admin_images/".$imageName;

			// Save image file to PHP project
			if (move_uploaded_file($tempFileName, $folder)) {
				header("Location: ../add-admin-image.php");
			}
		 }
	}


}

?>