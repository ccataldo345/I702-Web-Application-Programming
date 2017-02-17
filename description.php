<a href="lab01.php">Back to product listing</a>

<meta name="viewport" content="width=device-width, user-scalable=no"/><!-- Disable zoom on smartphone --> 
 
<?php
$conn = new mysqli("localhost", "test", "t3st3r123", "test");
$statement = $conn->prepare(
  "SELECT `name`, `description`, `price` FROM" .
  " `ccataldo_shop_product` WHERE `id` = ?");
$statement->bind_param("i", $_GET["id"]);
$statement->execute();
$results = $statement->get_result();
$row = $results->fetch_assoc();
?>
 

 
<span style="float:right;"><?=$row["price"];?> EUR</span>
<h1><?=$row["name"];?></h1>
 
<p>
  <?=$row["description"];?>
</p>

<br />
<br />

<!--Add to cart button -->
 <form method="post" action="cart.php">
  <input type="hidden" name="id" value="<?=$_GET["id"];?>"/>
  <input type="submit" value="Add to cart"/>
</form>