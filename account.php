
<?php
    require('Connector.php');

    if(!empty($_POST['pass'])){

        $password = $_POST['pass'];

        $first = $_POST['firstName'];

        if(isset($_POST{'firstName'})){

            global $dbh;

            $stmt = $dbh->prepare("INSERT INTO users VALUES (0, :firstName, :password)");

            $result = $stmt->execute(array(

                'firstName' => $_POST['firstName'],
                'password' => $_POST['pass']

            ));

            if($result){
                $_SESSION["password"] = $password;
                $_SESSION["userName"] = $username;
                $_SESSION['registered'] = 1;
                echo "Registered.";
            }else {
                echo "Error creating account.";

            }
        }
    }
?>



<form name="account" method="post">

    <h1 style="text-align: center">Create Account</h1>
    <label>First Name</label>
    <input type="text" id="firstName" name="firstName" required>

    <label>Password</label>
    <input type="password" id="password" name="pass" required>
    <br>
    <button type="submit" name="signup" value="1">Create Account</button>
</form>
<div style="text-align: center"><a href="login.php">Already have an account click here</a>
</div>