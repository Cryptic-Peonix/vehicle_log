<?php
/**
 * Delete form
 * handles all deletes
 * 4/22/2024
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('./model/queries.php');

//header
$pageTitle = "Confirm Delete";
include './view/header.php';

// fetch table name from POST
$table = "";
if(isset($_POST["tablename"])) {
    $table = filter_input(INPUT_POST, "tablename", FILTER_SANITIZE_SPECIAL_CHARS);
}
?>
<body>
    <h1>Are you sure you wish to delete?</h1>
    <br>
    <form action="./model/editor.php" method="post">
        <a class="cancel" href="./home.php">Cancel</a>
        <input type="hidden" name="operation" value="delete">
        <?php
            echo '<input type="hidden" name="table" value="' . $table . '">';
            if (isset($_POST['fuel_id'])) {
                echo '<input type="hidden" name="fuel_id" value="' . $_POST['fuel_id'] . '">';
            }
            if (isset($_POST['vehicle_id'])) {
                echo '<input type="hidden" name="vehicle_id" value="' . $_POST['vehicle_id'] . '">';
            }
            if (isset($_POST['maintenance_id'])) {
                echo '<input type="hidden" name="maintenance_id" value="' . $_POST['maintenance_id'] . '">';
            }
            if (isset($_POST['maintenance_type_id'])) {
                echo '<input type="hidden" name="maintenance_type_id" value="' . $_POST['maintenance_type_id'] . '">';
            }
            if (isset($_POST['user_id'])) {
                echo '<input type="hidden" name="user_id" value="' . $_POST['user_id'] . '">';
            }
        ?>
        <input type="submit" value="Confirm">
    </form>
</body>
<?php include './view/footer.php'; ?>
</html>