<?php

$username = 'kobe';
$password = 'bryant';
if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) || ($_SERVER['PHP_AUTH_USER'] != $username) || ($_SERVER['PHP_AUTH_PW']) != $password) {
    //If the username/password are incorrect send back authentication errors;
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Basic realm="Sports 4 Life"');
    exit('<h2>Sports 4 Life</h2>Sorry, you must enter a valid user name and password to access this page');
}

session_start();
require_once ("Connector.php");

$query = "SELECT * FROM users ORDER BY first_name";

$stmt = $dbh->prepare($query);
$stmt->execute();
$score = $stmt->fetchAll();

echo '<table style="width: 100%;">';

$i = 0;
foreach($score as $row) {
    if ($i == 0) {
        echo '<tr><td colspan="2" class="subinfo_header"><h1 style="margin: 0; padding:0;">Users</h1></td></tr>';
    }
    // Display the score data
    echo '<tr><td class="subinfo">';
    echo '<strong>first name:</strong><br/> ' . $row['first_name'] . '<br/></td>';
    echo '<td class="subinfo">';
    echo '<strong>password:</strong><br/> ' . $row['password'] . '<br/></td>';
    echo '<td><a href="removeaccount.php?id=' . $row['id'] . '&amp;first_name=' . $row['first_name'] . '&amp;password=' . $row['password'] . '">Remove</a>';
    echo'</td></tr>';
    $i++;
}
echo '</table>';
?>