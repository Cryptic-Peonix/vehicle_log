<?php
/** editor.php
 * handles all the logic for add / update / delete table
 * Skyla Clark 4/22/24 
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'queries.php';
$operation = $_POST['operation']; // add, update, or delete
$table = $_POST['table']; // the table to perform said 

// get ids when avaialble
$fuel_id = 0;
$vehicle_id = 0;
$maintenance_id = 0;
$type_id = 0;
$user_id = 0;
if (isset($_POST['fuel_id'])) {
    $fuel_id = $_POST['fuel_id'];
}
if (isset($_POST['vehicle_id'])) {
    $vehicle_id = $_POST['vehicle_id'];
}
if (isset($_POST['maintenance_id'])) {
    $maintenance_id = $_POST['maintenance_id'];
}
if (isset($_POST['maintenance_type_id'])) {
    $type_id = $_POST['maintenance_type_id'];
}
if (isset($_POST['user_id'])) {
    $user_id = $_POST['user_id'];
}

try {
    // im using prepared statements, do not need to use htmlspecialchars
    if ($operation == "add") {
        if ($table == 'fuel') {
            add_fuel_entry($_POST["vehicle_id"], $_POST["fuel_source"], $_POST["fuel_gallons"],
                $_POST["fuel_cost"], $_POST["fuel_mileage"]);
        }
        if ($table == 'vehicles') {
    
        }
        if ($table == 'maintenance') {
            add_maintenance_entry($_POST['type_id'], $_POST['vehicle_id'], $_POST['main_vendor'],
                $_POST['main_desc'], $_POST['main_addr'], $_POST['main_cost'], $_POST['main_date']);
        }
        if ($table == 'maintenance_type') {
            add_maintenance_type($_POST['main_type']);
        }
        if ($table == 'users') {
    
        }
    } else if ($operation == "update") {
        if ($table == 'fuel') {
    
        }
        if ($table == 'vehicles') {
    
        }
        if ($table == 'maintenance') {
    
        }
        if ($table == 'maintenance_type') {
    
        }
        if ($table == 'users') {
            
        }
    } else if ($operation = "delete") { // delete operations
        if ($table == 'fuel') {
            disable_fuel($fuel_id);
        }
        if ($table == 'vehicles') {
            disable_vehicle($vehicle_id);
        }
        if ($table == 'maintenance') {
            disable_maintenance($maintenance_id);
        }
        if ($table == 'maintenance_type') {
            disable_maintenance_type($type_id);
        }
        if ($table == 'users') {
            disable_user($user_id);
        }
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include '../errors/database_error.php';
    exit();
}


header("Location: ../home.php")

?>