<?php 
require_once 'php/core.php'; 
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

if (isset($_SESSION['is_admin'])) {
	if ($_SESSION['is_admin'] == 0) {
		header('Location: errorpage.php');
	}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'includes/header.php'; ?>
	<title>Admin Files</title>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
		<div class="row mt-2 justify-content-center">
			<h1><strong>User Files</strong></h1>
			<div class="col-md-12">
				<ul>
					<?php $showAllUsersWithImage = $fileObj->showAllUsersWithImage(); ?>
					<?php foreach ($showAllUsersWithImage as $user) { ?>
					<li>
						<h3><a href="show-images-by-user.php?user_id=<?php echo $user['user_id']; ?>&username=<?php echo $user['username']; ?>"><?php echo $user['username']; ?></a></h3>
					</li>
					<?php } ?>
			    </ul>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
</body>
</html>

