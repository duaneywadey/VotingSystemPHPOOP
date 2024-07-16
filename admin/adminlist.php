<?php 
require_once 'php/core.php'; 
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

if (isset($_SESSION['is_admin'])) {
	if ($_SESSION['is_admin'] == 0) {
		header('Location:login.php');
	}
}

?>
<html lang="en">
<head>    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<?php include 'includes/header.php'; ?>
	<title>Hello, world!</title>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
		<div class="row justify-content-center mt-4">
			<div class="col-md-12">
				<div class="card shadow p-3 mb-5 bg-white rounded">
					<div class="card-body">
						<h1 class="card-title">Admins</h1>
						<table class="table">
							<thead>
								<tr>
									<th scope="col">Username</th>
									<th scope="col">Last Updated</th>
									<th scope="col">Updated By</th>
									<th scope="col">Admin Access</th>
								</tr>
							</thead>
							<tbody>
								<?php $getAllUsers = $userObj->getAllUsers(); ?>
								<?php foreach ($getAllUsers as $user) { ?>
								<tr data-userid = <?php echo $user['user_id']; ?>>
									<td><?php echo $user['username']; ?></td>
									<?php
									$getMostRecentUpdate = $userObj->getMostRecentUpdate($user['user_id']); 
									if (!empty($getMostRecentUpdate)) {
										echo "<td>" . $getMostRecentUpdate['date_added'] . "</td>";
										echo "<td>" . $getMostRecentUpdate['admin_who_updated'] ."</td>";
									}
									else {
										echo "<td>Not yet updated</td>";
										echo "<td>Not yet updated</td>";
									}

									?>
									<td>
									<?php if ($user['is_admin'] == 0) { ?>
										<input type="checkbox" id="scales" name="scales" class="singleCheckbox"/>
									    <label for="scales">Make Admin</label>
									<?php } else { ?>
										<input type="checkbox" id="scales" name="scales" class="singleCheckbox" checked />
									    <label for="scales">Admin</label>
									<?php } ?>
									</td>	
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include 'includes/footer.php'; ?>
	<script>
		$('.singleCheckbox').on('change', function (e) {
			var userID = $(this).closest('tr').data('userid');
			if (!$(this).is(':checked')) {
				$.ajax({
					url:'php/users.php',
					method:'POST',
					data: {
						disableAdmin:1,
						userID:userID
					},
					success: function (data) {
						location.reload();
					}
				})
			}
			else {
				$.ajax({
					url:'php/users.php',
					method: 'POST',
					data: {
						makeAdmin:1,
						userID:userID
					},
					success: function (data) {
						location.reload();
					}
				})
			}
		})
	</script>
</body>
</html>