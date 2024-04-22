<?php
    require './auth/session_verify.php';
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./main.css">
    <title><?php echo "$pageTitle" ?></title>
    <h1 class="title"><?php echo "$pageTitle" ?></h1>
    <a class = "button" href="../../vehicle_log/auth/logout.php">Logout</a>
    <a class="button" href="../../vehicle_log/account/account.php">View Account</a>
    <h4 class="username">User - <?php echo $_SESSION['name']; ?></h4>
    <br>
    <hr>
    <div class="topnav">
        <a <?php if($_SERVER['SCRIPT_NAME']=="/index.php") { ?> class="active" <?php } ?> href="./home.php">Home</a>
        <a <?php if($_SERVER['SCRIPT_NAME']=="/table_viewer.php") { ?> class="active" <?php } ?> href="./table_viewer.php">Table Viewer</a>
    </div>
    <hr>
</head>