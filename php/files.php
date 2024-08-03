<?php 

require_once 'core.php';

if (isset($_POST['addImageBtn'])) {

	// Get file name
	$fileName = $_FILES['image']['name'];

	// Get temporary file name
	$tempFileName = $_FILES['image']['tmp_name'];

	// Get file extension
	$fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);
	
	// Generate random characters for the unique name	
	$unique = uniqid(rand());

	// Use the randomized characters for the file's name
	$imageName = $unique.".".$fileExtension;

	// Save to database if file is not too large
	if ($fileObj->checkIfNotTooLarge($_FILES['image'])) {

		// Save image to database
		if ($fileObj->saveImage($imageName, $_SESSION['user_id'])) {
			$folder = "../user_images/".$imageName;

			// Save image file to PHP project
			if (move_uploaded_file($tempFileName, $folder)) {
				$_SESSION['successfully_saved_image'] = "Successfully saved image!";
				header("Location: ../upload-images.php");
			}
		}
	}

	else {
		$_SESSION['too_large_alert'] = "File is too large!";
		header("Location: ../upload-images.php");
	}

}


?>