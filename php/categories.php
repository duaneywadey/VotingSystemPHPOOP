<?php  
require_once 'core.php';

if (isset($_POST['addCategoryBtn'])) {

	$is_multiselect = $_POST['is_multiselect'];
	if (isset($is_multiselect)) {
		$is_multiselect = true;
	}
	else {
		$is_multiselect = false;
	}

	$election_id = $_POST['election_id'];	
	$category_title = $_POST['category_title'];	
	$category_description = $_POST['category_description'];
	
	if($categoryObj->addNewCategory($category_title, $category_description, $election_id, $is_multiselect)) {
		header('Location: ../add-a-category.php');
	}	
}

?>