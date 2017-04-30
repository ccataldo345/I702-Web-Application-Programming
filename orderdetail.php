<?php
require_once "config.php";
include "header.php"; 
include "dbconn.php"?>

<a href="index.php">Back to your profile</a>
<br><br>
<a href="orders.php">Back to orders</a>
<?php

$statement = $conn->prepare(
"SELECT
  `ccataldo_shop_order_items`.`id` AS `order_product_id`,
  `ccataldo_shop_order_items`.`product_id` AS `product_id`,
  `ccataldo_shop_products`.`name` AS `product_name`,
  `ccataldo_shop_order_items`.`unit_price` AS `order_product_unit_price`,
  `ccataldo_shop_order_items`.`count` AS `order_product_count`,
  `ccataldo_shop_order_items`.`unit_price` * `ccataldo_shop_order_items`.`count` AS `subtotal`
FROM
  `ccataldo_shop_order_items`
JOIN
  `ccataldo_shop_products`
ON
  `ccataldo_shop_order_items`.`product_id` = `ccataldo_shop_products`.`id`
WHERE
  `ccataldo_shop_order_items`.`order_id` = ?
");

if (!$statement) die("Prepare failed: (" . $conn->errno . ") " . $conn->error);
$statement->bind_param("i", $_GET["id"]); // TODO: Check that order belongs to $_SESSION["user"] !!!
$statement->execute();
$results = $statement->get_result();
?>
<h2>Order details</h2>
<ul>
<?php
  while ($row = $results->fetch_assoc()) { ?>
    <li>
      <?= $row["product_name"]; ?>
      <?= $row["order_product_count"]; ?> x
      <?= $row["order_product_unit_price"]; ?> EUR
    </li><?php
  }
?>
