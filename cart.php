<?php
require_once ("config.php");
?>

<!DOCTYPE html>
<html>
<h3>Your current cart:</h3>

	<?php

	include ("header.php");

		$product_id = intval($_POST["id"]);
		if (array_key_exists($product_id, $_SESSION["cart"])) {
			$_SESSION["cart"][$product_id] += intval($_POST["count"]);
		} else {
			$_SESSION["cart"][$product_id] = 1;
		}
		#var_dump($_SESSION["cart"]);
		echo "<br>";
		echo "<br>";
		$_SESSION["count"][$product_id] = $_POST["count"];
		
		echo $_POST["pname"];
		echo ' > quantity: ';
		echo $_POST["count"];



		
	?>
<br />
<br />
<br />
<br />
<br />
	<a href="http://enos.itcollege.ee/~ccataldo/Lab01/print.php" target="_blank">Print your invoice</a><br />
<br />
<br />
<a href="index.php">Back to product listing</a>

</html>