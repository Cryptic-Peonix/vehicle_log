<?php 
/** Skyla Clark
 * 3/18/2024
 * add_form.php
 * Page to add entries into a table.
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require('./model/queries.php');

//header
$pageTitle = "Edit Form";
include './view/header.php';

// fetch table name from POST
$table = "";
if(isset($_POST["tablename"])) {
    $table = filter_input(INPUT_POST, "tablename", FILTER_SANITIZE_SPECIAL_CHARS);
}
?>
<body>
    <h1>Table: <?php echo strtoupper($table); ?></h1>
    <!-- Create table form to add data -->
    <?php
        $operation = 'update';
        switch ($table) {
            case 'maintenance_type':
                $type_id = $_POST['maintenance_type_id'];
                include './view/maintenance_type_edit_form.php';
                break;
            case 'maintenance':
                $maintenance_id = $_POST['maintenance_id'];
                include './view/maintenance_edit_form.php';
                break;
            case 'fuel':
                $fuel_id = $_POST['fuel_id'];
                include './view/fuel_edit_form.php';
                break;
            default:
                echo 'invalid table value!';
                break;
        }
    ?>
</body>
<?php include './view/footer.php'; ?>
</html>