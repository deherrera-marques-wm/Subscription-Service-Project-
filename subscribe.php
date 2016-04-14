<h1>Add Email for subscription:</h1>

<?php
$from = 'marques.deherrera@west-mec.org';
$subject = $_POST['subject'];
$text = $_POST['sports'];

if(!empty($subject)){
    echo "This area is empty please fill in this line";
}
if(!empty($text)) {
    echo "There is nothing in this area fill in something";
}

$dbh = new PDO('mysql:host=localhost;dbname=subscription', 'root', 'root');

$query = "SELECT * FROM email_list";
$stmt = $dbh->prepare($query);
$stmt->execute();
$result= $stmt->fetchAll();

foreach($result as $row) {
    $to = $row['email'];
    $first_name = $row['first_name'];
    $msg = "Dear $first_name,\n$text";
    mail($to, $subject, $msg, 'From:' . $from);
    echo 'Email sent to: ' . $to . '<br/>';
}

?>

<form name="account" method="post">

    <label>Email:</label>
    <input type="text" id="email" name="email" required>
    <button type="submit" name="signup" value="1">Create Account</button>
</form>
