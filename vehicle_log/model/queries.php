<?php

/** Skyla Clark
 * 3/18/2024
 * queries.php
 * This file stores all the functions for database queries.
 */
require 'config.php';
$db = Database::getDB();

// SELECT
function get_table($tablename)
{
   global $db;
   $active = 1;
   $query = $query = 'SELECT * 
      FROM ' . $tablename .
      ' WHERE active = :active'; //only get active entries
   $statement = $db->prepare($query);
   $statement->bindParam(":active", $active);
   $statement->execute();
   $results = $statement->fetchAll();
   $statement->closeCursor();

   return $results;
}

function get_maintenance_type($id)
{
   global $db;
   $query = "SELECT *
      FROM maintenance_type
      WHERE maintenance_type_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $result = $statement->fetchAll();
   $statement->closeCursor();

   return $result[0];
}

function get_maintenance($id) {
   global $db;
   $query = "SELECT *
      FROM maintenance
      WHERE maintenance_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $result = $statement->fetchAll();
   $statement->closeCursor();

   return $result[0];
}

function get_user($id) {
   global $db;
   $query = "SELECT *
      FROM user
      WHERE user_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $result = $statement->fetchAll();
   $statement->closeCursor();

   return $result[0];
}

function get_vehicle($id) {
   global $db;
   $query = "SELECT *
      FROM vehicle
      WHERE vehicle_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $result = $statement->fetchAll();
   $statement->closeCursor();

   return $result[0];
}

function get_fuel($id) {
   global $db;
   $query = "SELECT *
      FROM fuel
      WHERE fuel_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $result = $statement->fetchAll();
   $statement->closeCursor();

   return $result[0];
}

// INSERT
function add_fuel_entry(int $vehicle_id, string $source, int $gallons, $cost, $mileage)
{
   global $db;
   $active = 1;
   $query = 'INSERT INTO fuel (vehicle_id, fuel_source, fuel_gallons, fuel_cost, fuel_mileage, active)
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

function add_maintenance_entry(int $typeID, int $vehicleID, string $maintenacneVendor, string $desc, string $vendorAddress, float $cost, string $date)
{
   global $db;
   $active = 1;
   $query = 'INSERT INTO maintenance (maintenance_type_id, vehicle_id, maintenance_vendor, maintenance_description, maintenance_vendor_address, maintenance_cost, maintenance_date, active)
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

function add_maintenance_type(string $type)
{
   global $db;
   $active = 1;
   $query = "INSERT INTO maintenance_type (maintenance_type, active)
      VALUES (:mtype, :active)";
   $statement = $db->prepare($query);
   $statement->bindParam(":mtype", $type, PDO::PARAM_STR);
   $statement->bindParam(":active", $active, PDO::PARAM_INT);
   $statement->execute();
   $statement->closeCursor();
}

function add_user(string $firstname, string $lastName, string $password, string $email)
{
   global $db;
   $active = 1;
   $query = "INSERT INTO users (first_name, last_name, user_password, email, active)
      VALUES (:fname, :lname, :pass, :email, :active)";
   $statement = $db->prepare($query);
   $statement->bindParam(":fname", $firstname, PDO::PARAM_STR);
   $statement->bindParam(":lname", $lastName, PDO::PARAM_STR);
   $statement->bindParam(":pass", $password, PDO::PARAM_STR);
   $statement->bindParam(":email", $email, PDO::PARAM_STR);
   $statement->bindParam(":active", $active, PDO::PARAM_INT);
   $statement->execute();
   $statement->closeCursor();
}

function add_vehicle(
   string $vType,
   string $vModel,
   string $vYear,
   string $datePurcased,
   string $color,
   string $VIN,
   string $license,
   string $state,
   $purcahsePrice,
   $currentPrice,
   $purchMileage,
   $currentMileage
) {
   global $db;
   $active = 1;
   $query = "INSERT INTO vehicles (vehicle_type, vehicle_model, vehicle_year, vehicle_date_purchased, vehicle_color, vehicle_VIN,
      vehicle_license_tag, vehicle_license_state, vehicle_purchase_price, vehicle_current_price, vehicle_purchase_mileage, vehicle_current_mileage, active)
      VALUES (:vtype, :vmodel, :vyear, :dpurch, :color, :vin, :license, :lstate, :purchPrice, :cPrice, :pMiles, :cMiles, :active)";
   $statement = $db->prepare($query);
   $statement->bindParam(":vtype", $vType, PDO::PARAM_STR);
   $statement->bindParam(":vmodel", $vModel, PDO::PARAM_STR);
   $statement->bindParam(":vyear", $vYear, PDO::PARAM_INT);
   $statement->bindParam(":dpurch", $datePurcased, PDO::PARAM_STR);
   $statement->bindParam(":color", $color, PDO::PARAM_STR);
   $statement->bindParam(":vin", $VIN, PDO::PARAM_STR);
   $statement->bindParam(":license", $license, PDO::PARAM_STR);
   $statement->bindParam(":lstate", $state, PDO::PARAM_STR);
   $statement->bindParam(":purchPrice", $purcahsePrice);
   $statement->bindParam(":cPrice", $currentPrice);
   $statement->bindParam(":pMiles", $purchMileage);
   $statement->bindParam(":cMiles", $currentMileage);
   $statement->bindParam(":active", $active, PDO::PARAM_INT);
   $statement->execute();
   $statement->closeCursor();
}

// UPDATE
function edit_maintenance_type(int $id, string $type)
{
   global $db;
   $query = "UPDATE maintenance_type
      SET maintenance_type = :mtype
      WHERE maintenance_type_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":mtype", $type, PDO::PARAM_STR);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $statement->closeCursor();
}

function edit_maintenance(int $id, int $typeID, int $vehicleID, string $maintenacneVendor, string $desc, string $vendorAddress, float $cost, string $date)
{
   global $db;
   $query = "UPDATE maintenance
      SET maintenance_type_id = :tid, vehicle_id = :vid, maintenance_vendor = :ven, maintenance_description = :descr,
         maintenance_vendor_address = :addr, maintenance_cost = :cost, maintenance_date = :dategiven
      WHERE maintenance_id = :id";
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

function edit_fuel(int $id, int $vehicle_id, string $source, int $gallons, $cost, $mileage) {
   global $db;
   $query = "UPDATE fuel
      SET vehicle_id = :vid, fuel_source = :source, fuel_gallons = :gallons, fuel_cost = :cost, fuel_mileage = :miles
      WHERE fuel_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->bindParam(":vid", $vehicle_id, PDO::PARAM_INT);
   $statement->bindParam(":source", $source, PDO::PARAM_STR);
   $statement->bindParam(":gallons", $gallons, PDO::PARAM_INT);
   $statement->bindParam(":cost", $cost);
   $statement->bindParam(":miles", $mileage);
   $statement->execute();
   $statement->closeCursor();
}

// DELETE
function disable_fuel(int $id)
{
   global $db;
   $active = 0;
   $query = "UPDATE fuel
      SET active = :active
      WHERE fuel_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":active", $active, PDO::PARAM_INT);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $statement->closeCursor();
}

function disable_maintenance(int $id)
{
   global $db;
   $active = 0;
   $query = "UPDATE maintenance
      SET active = :active
      WHERE maintenance_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":active", $active, PDO::PARAM_INT);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $statement->closeCursor();
}

function disable_maintenance_type(int $id)
{
   global $db;
   $active = 0;
   $query = "UPDATE maintenance_type
      SET active = :active
      WHERE maintenance_type_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":active", $active, PDO::PARAM_INT);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $statement->closeCursor();
}

function disable_user(int $id)
{
   global $db;
   $active = 0;
   $query = "UPDATE users
      SET active = :active
      WHERE user_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":active", $active, PDO::PARAM_INT);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $statement->closeCursor();
}

function disable_vehicle(int $id)
{
   global $db;
   $active = 0;
   $query = "UPDATE vehicles
      SET active = :active
      WHERE vehicle_id = :id";
   $statement = $db->prepare($query);
   $statement->bindParam(":active", $active, PDO::PARAM_INT);
   $statement->bindParam(":id", $id, PDO::PARAM_INT);
   $statement->execute();
   $statement->closeCursor();
}
