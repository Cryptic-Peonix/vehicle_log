<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css">
    <title><?php echo "$pageTitle" ?></title>
    <h1><?php echo "$pageTitle" ?></h1>
    <hr>
    <div class="topnav">
        <a <?php if($_SERVER['SCRIPT_NAME']=="/index.php") { ?> class="active" <?php } ?> href="./index.php">Home</a>
        <a <?php if($_SERVER['SCRIPT_NAME']=="/table_viewer.php") { ?> class="active" <?php } ?> href="./table_viewer.php">Table Viewer</a>
        <a <?php if($_SERVER['SCRIPT_NAME']=="/admin/login.php") { ?> class="active" <?php } ?> href="admin/login.php">Admin Login</a>
    </div>
    <hr>
</head>