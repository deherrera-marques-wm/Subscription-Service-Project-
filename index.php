<?php
session_start();

require_once ('Connector.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="Stylesheet.css">
    <meta charset="UTF-8">
    <title>Sports 4 Life</title>
</head>
<body>
<!-- Title -->
<h1 style="text-align: center; font-size: 300%; color: darkgray">Sports 4 Life</h1>
<nav role='navigation'>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="admin.php">Admin</a></li>
        <li><a href="blog.php">Blog</a></li>
        <li><a href="account.php">
                <?php
                if($_SESSION['firstName']) {
                    echo "Sign out";
                } else{
                    echo "Sign up/Login";
                }
                ?>
            </a></li>
        <li><a href="#"><?php echo $_SESSION['firstName'] ?></a></li>
    </ul>
</nav>
</body>
</html>
