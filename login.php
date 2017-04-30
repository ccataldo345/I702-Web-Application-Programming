<?php
include "config.php";
include "header.php";

// This is login.php, here we check if user provided proper credentials

var_dump($_POST); // This is just to check that the data gets to server

include "dbconn.php";

$statement = $conn->prepare("SELECT * FROM ccataldo_shop_users WHERE email = ? AND password = PASSWORD(?)");
if ($statement === FALSE) {
    die ("Mysql Error: " . $conn->error);
}

$statement->bind_param("ss", $_POST["email"], $_POST["password"]);
$statement->execute();
$results = $statement->get_result();
$row = $results->fetch_assoc();

 
if($row) {
    echo "Login successful, hello " . $row["first_name"];
    $_SESSION["user"] = $row["id"]; // This stores user row number
    header('Location: index.php'); //This will redirect back to index.php
} else {
    echo "Login failed. Please try again or register";
    //header('Location: index.php');
}
?>