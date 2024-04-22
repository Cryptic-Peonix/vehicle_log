<?php
require_once './model/config.php';
echo password_hash("webapps", PASSWORD_DEFAULT);
//echo password_hash("webappsadmin", PASSWORD_DEFAULT);
?>