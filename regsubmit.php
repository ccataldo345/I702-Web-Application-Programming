<?php
require_once "config.php";
include "header.php"; 
include "dbconn.php"?>

<?php 
$statement = $conn->prepare(
"INSERT INTO `ccataldo_shop_users` (
    `email`,
    `password`,
    `first_name`,
    `last_name`,
    `phone`,
    `dob`,
    `salutation`,
    `vatin`,
    `company`,
    `country`,
    `address`)
VALUES (?, PASSWORD(?), ?, ?, ?, ?, ?, ?, ?, ?, ?)");
 
# whenever you get "call to a member function ... on a non-object" this means something
# is failing **before** that line so you have to manually check for errors like this:
if (!$statement) die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
 
$statement->bind_param("sssssssssss", //"s" stands for "String"
    $_POST["email"],
    $_POST["password"],
    $_POST["first_name"],
    $_POST["last_name"],
    $_POST["phone"],
    $_POST["dob"],
    $_POST["salutation"],
    $_POST["vatin"],
    $_POST["company"],
    $_POST["country"],
    $_POST["address"]);
 
if ($statement->execute()) {
    echo "Registration was successful! <a href=\"index.php\">Back to main page</a>";
} else {
    if (!$statement->errno == 1062) {
       // This will result in 200 OK
       echo "This e-mail is already registered";
    } else {
       // This will result in 500 Internal server error
       die("Execute failed: (" .
           $statement->errno . ") " . $statement->error);
    }
}
?>

<?php
include "footer.php";
?>

