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
                <div class="row mt-2 justify-content-center">
                        <h1>Welcome to the <strong>Files Panel!</strong> <span class="text-primary"><?php echo $_SESSION['username'] ?></span></h1>
                        <?php $showAllImages = $fileObj->showAllImages(); ?>
                        <?php foreach ($showAllImages as $image) { ?>
                        <div class="col-md-6">
                                <div class="card">
                                        <div class="card-body">
                                                <img src="admin_images/<?php echo $image['file_name']; ?>" class="img-thumbnail">
                                        </div>
                                </div>
                        </div>
                        <?php } ?>
                </div>
        </div>
        <?php include 'includes/footer.php'; ?>
</body>
</html>