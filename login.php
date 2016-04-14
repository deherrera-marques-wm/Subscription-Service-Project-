<?php
session_start();

include_once('Connector.php');

$error = false;
$success = false;

if(@$_POST['signup']) {

    if(!$_POST['firstName']){
        $error .= '<p>First Name is a required field!</p>';
    }

    if(!$_POST['pass']){
        $error .= '<p>Password is a required field!</p>';
    }

    $query = $dbh->prepare("SELECT * FROM users WHERE first_name = :first_name AND Password = :password");
    $result = $query->execute(
        array(
            'firstName' => $_POST['firstName'],
            'password' => $_POST['pass']
        )
    );

    header("Location: index.php");

    if ($result) {
        $success = "User, " . $_POST['firstName'] . " was successfully logged in.";



        $_SESSION['firstName'] = $_POST['firstName'];
    } else {
        $success = "There was an error logging into the account.";
    }
}
?>

<div id="signin" style="text-align: center">
    <form id="login" method="POST" action="login.php">
        <p>First Name</p>
        <input type="text" id="firstName" name="firstName" required>

        <p>Password</p>
        <input type="password" id="password" name="pass" required>
        <br>

        <button type="submit" name="signup" value="1">Sign In</button>
    </form>
</div>
