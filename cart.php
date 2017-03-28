<?php
require_once "config.php";
include "header.php";
?>

<?php
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
$conn or die("Database connection failed:" . $conn->error);
$conn->query("set names utf8"); // Support umlaut characters

// update the cart contents
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $product_id = intval($_POST["id"]);
    if (array_key_exists($product_id, $_SESSION["cart"])) {
        $_SESSION["cart"][$product_id] += intval($_POST["count"]);
    } else {
        $_SESSION["cart"][$product_id] = intval($_POST["count"]);
    }

    if ($_SESSION["cart"][$product_id] <= 0) {
        unset($_SESSION["cart"][$product_id]);
        //echo "You have no items in your shopping cart yet";
    }
}
?>

<h3>Your current shopping cart:</h3>

<?php
// update the cart contents
$results = $conn->query(
"SELECT id,name,price FROM ccataldo_shop_products;");

$results or die("Database query failed:" . $conn->error);

while ($row = $results->fetch_assoc()) {
  	$product_id = $row['id'];
  	if (array_key_exists($product_id, $_SESSION["cart"])) {
    	$count = $_SESSION["cart"][$product_id];
?>

	  	<li>
		    <a href="description.php?id=<?=$product_id;?>">
		    <?=$row['name'];?></a> >>>
		    
		    quantity: <?=$count;?> 
		      
		    (unit price: <?=$row['price'];?> EUR) 

		    >>> TOTAL PRICE: <?= $row['price'] * $count; ?> EUR
		    <br /><br />

		    <!--add 1 item-->
		    <form method="post">
		      <input type="hidden" name="id" value="<?=$product_id;?>"/>
		      <input type="hidden" name="count" value="+1"/>
		      <input type="submit" value="Add 1 item"/>
		    </form>

		    <!--remove 1 item-->
		    <form method="post">
		      <input type="hidden" name="id" value="<?=$product_id;?>"/>
		      <input type="hidden" name="count" value="-1"/>
		      <input type="submit" value="Remove 1 item"/>
		    </form>

		    <!--remove all items-->
		    <form method="post">
		      <input type="hidden" name="id" value="<?=$product_id;?>"/>
		      <input type="hidden" name="count" value="<?=-$count;?>" />
		      <input type="submit" value="Remove all items"/>
		    </form>

		    <br /><br />

	  </li>
<?php
	 }
	 #echo "TOTAL ITEMS PRICE >>> '$row['price'] * $count' EUR";
}   

$conn->close();
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

<?php include "footer.php" ?>
