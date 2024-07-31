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
                <div class="row mt-2">
                        <h1>Welcome to the <strong>Files Repository Panel!</strong> <span class="text-primary"><?php echo $_SESSION['username'] ?></span></h1>
                </div>
        </div>
        <?php include 'includes/footer.php'; ?>
</body>
</html>