<?php
/**
 * File for user auth functions in the db.
 */
require 'config.php';
$db = Database::getDB();

//Get the required info for login verification (ID, password, admin status)
function get_login_info(string $user) {
    global $db;
    $statement = $db->prepare("SELECT accountID, password, isAdmin FROM accounts WHERE username = :user");
    $statement->bindParam(":user", $user, PDO::PARAM_STR);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result;
}

// Update the requeted acocunts last login date
function update_last_login(int $id) {
    global $db;
    $nowtime = date("Y-m-d");
    $query = "UPDATE accounts
        SET last_login = :nowtime
        WHERE accountID = :id";
    $statement = $db->prepare($query);
    $statement->bindParam(":nowtime", $nowtime, PDO::PARAM_STR);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

// update the requested accounts last modification date
function update_last_modified(int $id) {
    global $db;
    $nowtime = date("Y-m-d");
    $query = "UPDATE accounts
        SET last_modified = :nowtime
        WHERE accountID = :id";
    $statement = $db->prepare($query);
    $statement->bindParam(":nowtime", $nowtime, PDO::PARAM_STR);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

// return the email string for the requested account
function get_account_email(int $id) {
    global $db;
    $query = "SELECT accountEmail
        FROM accounts
        WHERE accountID = :id";
    $statement = $db->prepare($query);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $statement->execute();
    $result = $statement->fetchAll();
    $statement->closeCursor();

    return $result[0]['accountEmail'];
}

// add a new account
function add_new_account(string $name, string $password, string $email) {
    global $db;
    $datemod = date("Y-m-d");
    $datelog = $datemod;
    $isActive = 1;
    $isAdmin = 0;
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO accounts (username, password, accountEmail, last_modified, last_login, isActive, isAdmin)
        VALUES (:user, :pass, :email, :datemod, :datelog, :active, :admin)";
    $statement = $db->prepare($query);
    $statement->bindParam(":user", $name, PDO::PARAM_STR);
    $statement->bindParam(":pass", $hashedPassword, PDO::PARAM_STR);
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    $statement->bindParam(":datemod", $datemod, PDO::PARAM_STR);
    $statement->bindParam(":datelog", $datelog, PDO::PARAM_STR);
    $statement->bindParam(":active", $isActive, PDO::PARAM_INT);
    $statement->bindParam(":admin", $isAdmin, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

// update account info
function update_account_info(int $id, string $name, string $password, string $email, string $datemod, int $isActive) {
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    global $db;
    $query = "UPDATE accounts
        SET username = :user, password = :pass, accountEmail = :email, last_modified = :datemod, isActive = :active
        WHERE accountID = :id";
    $statement = $db->prepare($query);
    $statement->bindParam(":id", $id, PDO::PARAM_INT);
    $statement->bindParam(":user", $name, PDO::PARAM_STR);
    $statement->bindParam(":pass", $hashedPassword, PDO::PARAM_STR);
    $statement->bindParam(":email", $email, PDO::PARAM_STR);
    $statement->bindParam(":datemod", $datemod, PDO::PARAM_STR);
    $statement->bindParam(":active", $isActive, PDO::PARAM_INT);
    $statement->execute();
    $statement->closeCursor();
}

?>