<?php
/**
 * Register a new user account
 * Skyla Clark
 * 4/22/2024
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

 // get required files
require '../model/account_funcs.php';
session_start();
// prep and run account query
if(!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
    exit("Please fill out the username, password, and email fields!");
}
$name = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']); // hashing is done in add func
$email = htmlspecialchars($_POST['email']);

// register account
add_new_account($name, $password, $email);

// log in the new user
$result = get_login_info($name);

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