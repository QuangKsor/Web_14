<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = '';
    $dbSelect = 'qlsp';

    $conn = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbSelect);
    $setLang = mysqli_query($conn, "SET NAMES 'utf8'");
?>