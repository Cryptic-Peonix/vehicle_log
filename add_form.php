<!DOCTYPE html>
<html lang="en">
<?php 
/** Connor Clark
 * 3/18/2024
 * add_form.php
 * Page to add entries into a table.
 */
require('config.php');
require('queries.php');

//header
$pageTitle = "Add Form";
include 'header.php';

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
    <form method="post">
        <table>
			<?php foreach ($headerNames as $name) : ?>
				<tr>
                    <th><?= strtoupper($name); ?></th>
                    <td><input type="text" name="<?php echo $name; ?>"></td>
                </tr>
			<?php endforeach; ?>
        </table>
        <br>
        <input type="submit" value="Add to table">
    </form>
</body>
<?php include 'footer.php'; ?>
</html>