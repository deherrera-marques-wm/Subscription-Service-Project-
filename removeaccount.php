<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sports 4 Life - Remove an account</title>
    <link rel="stylesheet" type="text/css" href="Stylesheet.css" />
</head>
<body>
<h2>Sports 4 Life - Remove an account</h2>
​
<?php

require_once('admin.php');

define('GW_UPLOADPATH', 'images/');
define('GW_MAXFILESIZE','100000000' );


$id = (@$_GET['id']) ? $_GET['id'] : $_POST['id'];
$first = (@$_GET['firstName']) ? $_GET['firstName'] : $_POST['firstName'];
$password = (@$_GET['pass']) ? $_GET['pass'] : $_POST['pass'];
//$Pic = @$_GET['pic'];
if (isset($_POST['submit'])) {
    if ($_POST['confirm'] == 'Yes') {
        // Delete the screen shot image file from the server

        // Connect to the database
        $dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');​
        // Delete the score data from the database
        $query = "DELETE FROM users WHERE id = $id LIMIT 1";

        $stmt = $dbh->prepare($query);
        $stmt->execute();
        $score = $stmt->fetchAll();

        // Confirm success with the user
        echo '<p>The account for ' . $first . ' was successfully removed.';
    }
    else {
        echo '<p class="error">The account was not removed.</p>';
    }
}
else if (isset($id) && isset($first) && isset($password)) {
    echo '<p>Are you sure you want to delete the following account?</p>';
    echo '<p><strong>Name: </strong>' . $first . '<br/>';
    echo '<form method="post" action="removeaccount.php">';
    echo '<input type="radio" name="confirm" value="Yes" /> Yes ';
    echo '<input type="radio" name="confirm" value="No" checked="checked" /> No <br/>';
    echo '<input type="submit" value="Submit" name="submit" />';
    echo '<input type="hidden" name="id" value="' . $id . '" />';
    echo '<input type="hidden" name="firstName" value="' . $first . '" />';
    echo '<input type="hidden" name="pass" value="' . $password . '" />';
    echo '</form>';
}

echo '<p><a href="admin.php">&lt;&lt; Back to admin page</a></p>';
?>
​
</body>
</html>