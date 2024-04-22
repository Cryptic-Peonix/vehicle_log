<?php
/** Skyla Clark
 * 3/18/2024
 * queries.php
 * This file stores all the functions for database queries.
 */
require 'config.php';
$db = Database::getDB();

 // SELECT
function get_table($tablename) {
   global $db;
   $query = $query = 'SELECT * FROM ' . $tablename;
   $statement = $db->prepare($query);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();

   return $results;
}

 // ADD
 function add_fuel_entry(int $vehicle_id, string $source, int $gallons, $cost, $mileage) {
    global $db;
    $active = 1;
    $query = 'INSERT INTO fuel (vehicle_id, fuel_source, fuel_gallons, fuel_cost, fuel_mileage, fuel_active)
    VALUES (:vid, :source, :gallons, :cost, :miles, :active)';
    $statement = $db->prepare($query);
    $statement->bindParam(":vid", $vehicle_id, PDO::PARAM_INT);
    $statement->bindParam(":source", $source, PDO::PARAM_STR);
    $statement->bindParam(":gallons", $gallons, PDO::PARAM_INT);
    $statement->bindParam(":cost", $cost);
    $statement->bindParam(":miles", $mileage);
    $statement->bindParam(":active", $active);
    $statement->execute();
    $statement->closeCursor();
 }

 function add_maintenance_entry(int $typeID, int $vehicleID, string $maintenacneVendor, string $desc, string $vendorAddress, float $cost, string $date) {
    global $db;
    $active = 1;
    $query = 'INSERT INTO maintenance (maintenance_type_id, vehicle_id, maintenance_vendor, maintenance_description, maintenance_vendor_address, maintenance_cost, maintenance_date, maintenance_active)
        VALUES (:tid, :vid, :ven, :descr, :addr, :cost, :dategiven, :active)';
    $statement = $db->prepare($query);
    $statement->bindParam(":tid", $typeID, PDO::PARAM_INT);
    $statement->bindParam(":vid", $vehicleID, PDO::PARAM_INT);
    $statement->bindParam(":ven", $maintenacneVendor, PDO::PARAM_STR);
    $statement->bindParam(":descr", $desc, PDO::PARAM_STR);
    $statement->bindParam(":addr", $vendorAddress, PDO::PARAM_STR); 
    $statement->bindParam(":cost", $cost);
    $statement->bindParam(":dategiven", $date, PDO::PARAM_STR);
    $statement->bindParam(':active', $active, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
 }

 // MODIFY

 
 // DELETE



?>