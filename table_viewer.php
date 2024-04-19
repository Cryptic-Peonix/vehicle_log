<!DOCTYPE html>
<html lang="en">
<!--
Skyla Clark
3/18/2024
table_viewer.php
The table viewer. The end user selects a table from the drop down list and the info
for said table is displayed for the user.
-->
<?php
// get required files
require('config.php');
require('queries.php');

//setup header
$pageTitle = 'Vehicle Log';
include 'header.php';

// setup table
$tableOption = "fuel"; // default option
echo $_POST['table_select'];
if (isset($_POST['table_select'])) {
	$tableOption = $_POST['table_select'];
}
echo 'var: ' . $tableOption;
$table = get_table($tableOption);
// get the table header names
$headerNames = $table ? array_keys($table[0]) : [];
?>

<body>
	<div class="selector">
		<h1>Table Selector</h1>
		<form method="POST" id="viewtable" >
			<label for="table_select">Table:</label>
			<select name="table_select" id="table_select" onchange='this.form.submit()'>
				<option value="fuel" <?php if ($tableOption == 'fuel') echo ' selected="selected"'; ?>>Fuel</option>
				<option value="vehicles" <?php if ($tableOption == 'vehicles') echo ' selected="selected"'; ?>>Vehicles</option>
				<option value="maintenance" <?php if ($tableOption == 'maintenance') echo ' selected="selected"'; ?>>Maintenance</option>
				<option value="maintenance_type" <?php if ($tableOption == 'maintenance_type') echo ' selected="selected"'; ?>>Maintenance Types</option>
				<option value="users" <?php if ($tableOption == 'users') echo ' selected="selected"'; ?>>Users</option>
			</select>
		</form>
		<br>
		<h2><?php echo strtoupper($tableOption); ?> </h2>
	</div>
	<div class="main">
		<!-- Start table -->
		<table>
			<!-- Add table headers -->
			<tr>
				<?php foreach ($headerNames as $name) : ?>
					<th><?= strtoupper($name); ?></th>
				<?php endforeach; ?>
			</tr>
			<!-- Loop through returned table array and display data -->
			<?php foreach ($table as $row) : ?>
				<tr>
					<?php foreach ($row as $value) : ?>
						<td><?= $value; ?></td>
					<?php endforeach; ?>
					<form action="edit_form.php" method="POST">
						<td><input type="submit" name="editsubmit" value="EDIT"></td>
					</form>
				</tr>
			<?php endforeach; ?>
		</table>
		<br>
		<form action="add_form.php" method="post">
			<h3>Add to table</h3>
			<input type="hidden" name="tablename" value="<?php echo $tableOption; ?>">
			<input type="submit" value="ADD">
		</form>
	</div>
</body>
<?php include 'footer.php'; ?>

</html>