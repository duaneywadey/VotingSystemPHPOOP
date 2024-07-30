<?php 
require_once 'php/core.php'; 
if (!isset($_SESSION['username'])) {
	header('Location: login.php');
}

if (isset($_SESSION['is_admin'])) {
	if ($_SESSION['is_admin'] == 1) {
		header('Location:login.php');
	}
}

?>
<html lang="en">
<head>    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Hello, world!</title>
	<?php include 'includes/header.php'; ?>
</head>
<body>
	<?php include 'includes/navbar.php'; ?>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<div class="card mt-4" style="height: 600px;">
					<div class="card-header"><h2><?php echo $_GET['username']; ?></h2></div>
					<div class="card-body overflow-auto">
						<ul class="list-group list-group-flush">
							<?php $showMsgFromSenderAndReceiver = $messageObj->showMsgFromSenderAndReceiver($_SESSION['user_id'], $_GET['user_id']); ?>
							<?php foreach ($showMsgFromSenderAndReceiver as $message) { ?>
							<li class="list-group-item">
								<h4>
									<?php $getUserById = $messageObj->getUserById($message['sender_id']); ?>
									<?php if ($getUserById['username'] == $_SESSION['username']) { ?>
										<?php echo "You" ?>
									<?php } else { ?>
										<?php echo $getUserById['username']; ?>
									<?php } ?>
								</h4>
								<small>
									<i><?php echo $message['date_added']; ?></i>
								</small>
								<p class="mt-2">
									<?php echo $message['description']; ?>
								</p>
							</li>
							<?php } ?>
						</ul>
					</div>
					<div class="card-footer" style="background-color: white;">
						<form action="php/messages.php" method="POST">
							<div class="form-group">
								<input type="hidden" value="<?php echo $_GET['user_id']; ?>" name="receiver_id">
								<input type="hidden" value="<?php echo $_GET['username']; ?>" name="receiver_username">
								<textarea name="description" class="form-control"></textarea>
								<input type="submit" class="btn btn-primary float-right mt-2" name="sendMessageBtn">
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>