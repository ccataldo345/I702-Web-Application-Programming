<?php
#require_once "config.php";
include "header.php";
$conn = new mysqli("localhost", "test", "t3st3r123", "test");
if ($conn->connect_error)
  die("Connection to database failed:" .
    $conn->connect_error);
$conn->query("set names utf8"); // Support umlaut characters
?>
<!-- Page specific stuff goes here -->
<? include "footer.php" ?>

<?php
session_start();
if (!array_key_exists("cart", $_SESSION)) {
    $_SESSION["cart"] = array();
}
?>