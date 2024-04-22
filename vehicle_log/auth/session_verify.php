<?php
session_start();
$now = time();
if(isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {
    session_unset();
    session_destroy();
    session_start();
}
if(!isset($_SESSION['loggedin'])) {
    header('Location: ../index.html');
    exit;
}
?>