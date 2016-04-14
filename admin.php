<?php
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
    echo '<strong>password:</strong><br/> ' . $row['password'] . '<br/></td></tr>';
    $i++;
}
echo '</table>';
?>