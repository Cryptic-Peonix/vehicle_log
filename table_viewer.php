<!DOCTYPE html>
<html lang="en">
<!--
Connor Clark
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
if (isset($_POST["tablesubmit"])) {
	$tableOption = $_POST["table_select"];
}
$table = get_table($tableOption);
// get the table header names
$headerNames = $table ? array_keys($table[0]) : [];
?>

<body>
	<div class="selector">
		<h1>Table Selector</h1>
		<form method="POST">
			<label for="table_select">Table:</label>
			<select name="table_select" id="table_select">
				<option value="fuel">Fuel</option>
				<option value="vehicles">Vehicles</option>
				<option value="maintenance">Maintenance</option>
				<option value="maintenance_type">Maintenance Types</option>
				<option value="users">Users</option>
			</select>
			<input type="submit" name="tablesubmit" value="Switch">
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