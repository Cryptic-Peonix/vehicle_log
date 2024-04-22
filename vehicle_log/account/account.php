<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    $pageTitle = "Account info";
    require '../auth/session_verify.php';
    require '../model/account_funcs.php';

    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
    $email = get_account_email($id)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../main.css">
    <title><?php echo "$pageTitle" ?></title>
    <h1><?php echo $pageTitle; ?></h1>
</head>
<body>
    <div class="main">
        <table>
            <tr>
                <th>Name</th>
                <th>Email</th>
            </tr>
            <tr>
                <td><?php echo $name; ?></td>
                <td><?php echo $email; ?></td>
            </tr>
        </table>
        <br>
        <a class="button" href="../home.php">Back To Home</a>
    </div>
</body>
</html>