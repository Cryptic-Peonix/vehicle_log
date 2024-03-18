<?php
    $dsn = 'mysql:host=mysql.s1367.sureserver.com;dbname=cpt283clark_vehicle_log';
    $username = 'cpt283clark';
    $password = 'giyEMP~dV!o_-jq;wH';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('errors/database_error.php');
        exit();
    }

// Set the time zone and set the current date added
date_default_timezone_set('America/New_York');

?>