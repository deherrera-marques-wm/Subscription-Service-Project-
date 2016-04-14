<?php

    $hn = "localhost";

    $pass = "root";

    $name = "root";


    try{
        global $dbh;
        $dbh = new PDO("mysql:host=$hn;dbname=subscription", $name, $pass);
        //echo 'we did it! :D';
    }
    catch(PDOException $you){
        echo $you->getMessage();
    }

    session_start();
?>