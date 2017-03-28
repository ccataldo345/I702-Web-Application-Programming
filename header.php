
<?php
session_start();

if (!array_key_exists("cart", $_SESSION)) {
    $_SESSION["cart"] = array();
}
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8"/>  <!--Support umlaut characters-->
    <meta name="description" content="CHRIS WEBSHOP">
    <title>CHRIS WEBSHOP</title>
    <link type="text/css" rel="stylesheet" href="css/style.css"/>
    <link href='https://fonts.googleapis.com/css?family=Audiowide' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="js/main.js"></script>

<br />

<h1><center>CHRIS WEBSHOP</center></h1>

  </head>
  <body>
    <div id="content">
