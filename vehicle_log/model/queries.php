<?php
/** Skyla Clark
 * 3/18/2024
 * queries.php
 * This file stores all the functions for database queries.
 */
require './model/config.php';
$db = Database::getDB();

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

 function add_maintenance_entry(int $id, int $typeID, int $vehicleID, string $maintenacneVendor, string $desc, string $vendorAddress, float $cost, string $date) {
    global $db;
    $query = 'INSERT INTO maintenance
        VALUES (:id, :tid, :vid, :ven, :descr, :addr, :cost, :dategiven)
        ON DUPILCATE KEY UPDATE maintenance_type_id=VALUES(tid), vehicle_id=VALUES(vid), maintenance_vendor=VALUES(ven),
            maintenance_description=VALUES(descr), maintenance_vendor_address=VALUES(addr), maintenance_cost=VALUES(cost),
            maintenance_date=VALUES(dategiven)';
    $statement = $db->prepare($query);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $statement->bindParam(":tid", $typeID, PDO::PARAM_INT);
    $statement->bindParam(":vid", $vehicleID, PDO::PARAM_INT);
    $statement->bindParam(":ven", $maintenacneVendor, PDO::PARAM_STR);
    $statement->bindParam(":descr", $desc, PDO::PARAM_STR);
    $statement->bindParam(":addr", $vendorAddress, PDO::PARAM_STR); 
    $statement->bindParam(":cost", $cost);
    $statement->bindParam(":dategiven", $date, PDO::PARAM_STR);
    $statement->execute();
    $statement->closeCursor();
 }

 // MODIFY

 
 // Delete a row from a table based on a given table name and ID number.



?>