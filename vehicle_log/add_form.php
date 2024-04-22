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
$pageTitle = "Add Form";
include './view/header.php';

// fetch table name from POST
$table = "";
if(isset($_POST["tablename"])) {
    $table = filter_input(INPUT_POST, "tablename", FILTER_SANITIZE_SPECIAL_CHARS);
}
$tableArr = get_table($table);
$headerNames = $tableArr ? array_keys($tableArr[0]) : [];
?>
<body>
    <h1>Table: <?php echo strtoupper($table); ?></h1>
    <!-- Create table form to add data -->
    <?php
        $operation = 'add';
        switch ($table) {
            case 'fuel':

                include './view/fuel_form.php';
                break;
            
            default:
                # code...
                break;
        }
    ?>
</body>
<?php include './view/footer.php'; ?>
</html>