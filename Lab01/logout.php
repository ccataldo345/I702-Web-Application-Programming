<?php
require_once ("config.php");


session_start();
unset($_SESSION["user"]);
header("Location: index.php");
?>