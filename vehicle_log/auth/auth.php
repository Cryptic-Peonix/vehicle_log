<?php
/** auth.php
 * This file authorizes the user against the server using password hashing to log in.
 * Skyla Clark 4/22/2024
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// get required files
require '../model/account_funcs.php';
session_start();
// prep and run account query
if(!isset($_POST['username'], $_POST['password'])) {
    exit("Please fill out both the username and password fields!");
}
$result = get_login_info($_POST['username']);

// verify account and set session vars
if(isset($result[0]['accountID'], $result[0]['password'], $result[0]['isAdmin'])) {
    $id = $result[0]['accountID'];
    $password = $result[0]['password'];
    $adminStatus = $result[0]['isAdmin'];
    if(password_verify($_POST['password'], $password)) {
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        $_SESSION['name'] = $_POST['username'];
        $_SESSION['id'] = $id;
        $_SESSION['adminStatus'] = $adminStatus;
        $now = time();
        $_SESSION['discard_after'] = $now + 10800; //logic to discard after 3 hours
        // update last login date
        update_last_login($id);
        //echo 'Welcome back, ' . htmlspecialchars($_SESSION['name'], ENT_QUOTES) . "!";
        header('Location: ../home.php');
    } else {
        echo "Incorrect username and/or password!";
    }
} else {
    echo "Incorrect username and/or password!";
}
?>