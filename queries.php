<?php
/** Skyla Clark
 * 3/18/2024
 * queries.php
 * This file stores all the functions for database queries.
 */

 // SELECT
 function get_table($tablename) {
	global $db;
	$query = 'SELECT * FROM ' . $tablename;
	$statement = $db->prepare($query);
	$statement->execute();
	$results = $statement->fetchAll(PDO::FETCH_ASSOC);
	$statement->closeCursor();
	return $results;
}

 // ADD
 function add_fuel_entry($user_id, $first_name, $last_name, $password, $email, $role) {
    global $db;
    $query = 'INSERT INTO fuel
    VALUES (:id, :firstname, :lastname, :pwd, :email, :userrole, :datecreated, :datelastlogin, :date_modified)';
    $statement = $db->prepare($query);
    $statement->bindParam(":id", $user_id, PDO::PARAM_INT);
    $statement->bindParam(":firstname", $first_name, PDO::PARAM_STR);
    $statement->bindParam(":lastname", $last_name, PDO::PARAM_STR);
    $statement->bindParam(":pwd", $password, PDO::PARAM_STR);
    $statement->bindParam(":emai", $email, PDO::PARAM_STR);
    $statement->bindParam(":userrole", $role, PDO::PARAM_STR);
    $statement->bindParam(":datecreated", date('Y-m-d'));
    $statement->bindParam(":datelastlogin", null);
    $statement->bindParam(":date_modified", date('Y-m-d'));
    $statement->execute();
    $statement->closeCursor();
 }

 // MODIFY

 
 // Delete a row from a table based on a given table name and ID number.
 function delete_table_entry($table, $id) {
    $id_name = "";
    switch ($table) {
        case "fuel":
            $id_name = "fuel_id";
            break;
        case "maintenance":
            $id_name = "maintenance_id";
            break;
        case "maintenance_type":
            $id_name = "maintenance_type_id";
            break;
        case "users":
            $id_name = "user_id";
            break;
        case "vehicles":
            $id_name = "vehicle_id";
            break;
        // in case of invalid input, default to the fuels table
        default:
            $id_name = "fuel_id";
            break;
    }
    global $db;
    $query = "DELETE FROM {$table} WHERE {$id_name} = {$id}";
    $statement = $db->prepare($query);
    $statement->execute();
    $statement->closeCursor();
 }

?>