

<?php
#require_once "config.php";
<<<<<<< HEAD
<<<<<<< HEAD
include ("header.php");

	#$conn = new mysqli("localhost", "test", "t3st3r123", "test");
	#$results = $conn->query("SELECT * FROM ccataldo_shop_product;");

=======
=======
>>>>>>> master-Chris
#include "header.php";

	$conn = new mysqli("localhost", "test", "t3st3r123", "test");
	$results = $conn->query("SELECT * FROM ccataldo_shop_product;");
		
<<<<<<< HEAD
>>>>>>> 01f86022776cac12a748b89ab57fab4e3f116cfc
=======
>>>>>>> master-Chris
	$product_id = intval($_POST["id"]);
	if (array_key_exists($product_id, $_SESSION["cart"])) {
		$_SESSION["cart"][$product_id] += 1;
	} else {
		$_SESSION["cart"][$product_id] = 1;
	}
	var_dump($_SESSION["cart"]);

<<<<<<< HEAD
<<<<<<< HEAD
#$conn->close();
?>
<br />
<br />
<a href="lab01.php">Back to product listing</a>
=======
=======
>>>>>>> master-Chris
$conn->close();
?>
<br />
<br />
<<<<<<< HEAD
<a href="lab01.php">Back to product listing</a>
>>>>>>> 01f86022776cac12a748b89ab57fab4e3f116cfc
=======
<a href="lab01.php">Back to product listing</a>
>>>>>>> master-Chris
