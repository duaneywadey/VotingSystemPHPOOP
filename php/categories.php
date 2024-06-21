<?php  
require_once 'core.php';

if (isset($_POST['addCategoryBtn'])) {
	$election_id = $_POST['election_id'];	
	$category_title = $_POST['category_title'];	
	$category_description = $_POST['category_description'];
	
	if($categoryObj->addNewCategory($category_title, $category_description, $election_id)) {
		header('Location: ../index.php');
	}	
}

?>