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
    
        }
        if ($table == 'maintenance_type') {
    
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
    } else { // delete operations
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
    }
} catch (Exception $e) {
    $error_message = $e->getMessage();
    include '../errors/database_error.php';
    exit();
}


header("Location: ../home.php")

?>