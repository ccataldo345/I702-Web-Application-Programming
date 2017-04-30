<?php
require_once "config.php";
include "header.php"; 
include "dbconn.php"?>
<br>
<a href="index.php">Back to your profile</a>
<br><br>
<a href="cart.php">Back to shopping cart</a>
<?php

$statement = $conn->prepare("
    SELECT
        `order`.`id` AS `orderid`,
        `order`.`created` AS `ordercreated`,
        `order`.`paid` AS `paymentdate`,
        `order`.`shipped` AS `shipmentdate`,
        `product`.`id` AS `productid`,
        `product`.`name` AS `productname`,
        `product`.`price` AS `productprice`,
        `order_item`.`count` AS `count`
    FROM `order_item`
    JOIN `order`
        ON `order_item`.`order_id` = `order`.`id`
    JOIN `product`
        ON `order_item`.`product_id` = `product`.`id`
    WHERE `order`.`user_id` = :userid
    ORDER BY `order`.`created` DESC");

// This is orders.php, again beginning copy-pasted from description.php
$statement = $conn->prepare("SELECT * FROM `ccataldo_shop_orders` WHERE `user_id` = ?");
if (!$statement) die("Prepare failed: (" . $conn->errno . ") " . $conn->error);

// TODO: If $_SESSION["user"] is nonsense, redirect to index.php!
$statement->bind_param("i", $_SESSION["user"]);
if (!$statement->execute()) die("Failed to execute statement");
$results = $statement->get_result();
?>
<h2>Your orders</h2>
<hr>
<ul>
<?php
  while ($row = $results->fetch_assoc()) { ?>
    <li>
      <a href="orderdetail.php?id=<?= $row["id"]; ?>">
        Order #<?= $row["id"]; ?>
        <?= $row["created"]; ?>
        <?= $row["shipping_address"]; ?>
      </a>
    </li><?php
  }
?>
