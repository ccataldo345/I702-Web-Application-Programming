<?php
require_once "config.php";
include "header.php"; 
include "dbconn.php"?>

<br>
<a href="index.php">Back to product listing</a><br>

<?php
$statement = $conn->prepare(
  "SELECT `name`, `description`, `price` FROM" .
  " `ccataldo_shop_products` WHERE `id` = ?");
$statement->bind_param("i", $_GET["id"]);
$statement->execute();
$results = $statement->get_result();
$row = $results->fetch_assoc();
?>

<br><hr> 
<h2><?=$row["name"];?></h2>
<p><?=$row["price"];?> EUR</p>
<hr>
 
<p>
  <?=$row["description"];?>
</p>
<br>

<?php
if (array_key_exists("user", $_SESSION)) {
	?>
	<!--Add to cart button -->
	  <form method="post" action="cart.php">
	  <input type="hidden" name="id" value="<?=$_GET["id"];?>"/>
	  <input type="hidden" name="count" value="1"/>
	  <input type="submit" value="Add to cart"/>
	</form>
<?php
} 
else {
	echo "<p><em>Please log in or sign up to start shopping</em></p>";
}
?>

<?php include "footer.php" ?>

