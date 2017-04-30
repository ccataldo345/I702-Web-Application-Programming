<?php
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error)
  die("Connection to database failed:" . $conn->connect_error);
$conn->query("set names utf8");
?>