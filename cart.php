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
        //echo "<hr><br/><h3>Your shopping cart is empty</h3>";
        //$cart_tot = 0;
        //echo "You have no items in your shopping cart yet";
    }
}
?>

<h3>Your current shopping cart:</h3>

<?php 
if (!array_key_exists("user", $_SESSION)) {  //if no user is logged in
  echo "<p><em>Please log in or sign up to checkout</em></p>";
 
} 

elseif (array_key_exists("user", $_SESSION)) {//1
		
	if($_SESSION["cart"]!=null) {//2

	// update the cart contents
	$results = $conn->query(
	"SELECT id,name,price FROM ccataldo_shop_products;");

	$results or die("Database query failed:" . $conn->error);

	$cart_tot = 0;

	while ($row = $results->fetch_assoc()) {//3
	  	$product_id = $row['id'];
	  	if (array_key_exists($product_id, $_SESSION["cart"])) {//4
	    	$count = $_SESSION["cart"][$product_id];
	    	$id_subtot = $row['price'] * $count;
	    	$cart_tot = $cart_tot + $id_subtot;
	   ?>

		  	<li>
			    <a href="description.php?id=<?=$product_id;?>">
			    <?=$row['name'];?></a> >>>   				<!--print product name-->
			    
			    quantity: <?=$count;?>				<!--print product quantity--> 
			      
			    (unit price: <?=$row['price'];?> EUR) 	<!--print product unit price-->
				<span style="float:right;"> 	
			    >>>&nbsp&nbsp&nbsp<?= $id_subtot; ?> EUR 			<!--print product tot price-->
			  </span>  		    
			    <br /><br />
			    

		  </li>

		  <!--add 1 item-->
		    <span style="float:left;"> 
		    	<form method="post">
			      <input type="hidden" name="id" value="<?=$product_id;?>"/>
			      <input type="hidden" name="count" value="+1"/>
			      <input type="submit" value="+"/>
		    	</form> 
		    </span>

		    <!--remove 1 item-->
		    <span style="float:left;"> 
		    	<form method="post">
			  		<input type="hidden" name="id" value="<?=$product_id;?>"/>
		      	<input type="hidden" name="count" value="-1"/>
		      	<input type="submit" value="-"/>
		 	    </form>
		 	  </span>

		    <!--remove all items-->
			    <form method="post">
			      <input type="hidden" name="id" value="<?=$product_id;?>"/>
			      <input type="hidden" name="count" value="<?=-$count;?>" />
			      <input type="submit" value="Delete item"/>
			    </form>
		    <hr>

	<?php
			}//4
		}//3
	

	$conn->close();
	?>

	<hr>
	 
	<p>TOTAL SHOPPING CART VALUE
		<span style="float: right";">
			 >>>&nbsp&nbsp&nbsp<?=$cart_tot;?> EUR
		</span>
	</p>
	<br />

	<form method="post" action="placeorder.php">
	<input type="submit" value="Place order"/>
	</form>

	<br />
		<a href="http://enos.itcollege.ee/~ccataldo/Lab01/print.php" target="_blank">Print your invoice</a><br />
	<br />
	<br />

	<?php 
	}//2

else {
	if($_SESSION["cart"]==null) {
    echo "<h3>Your shopping cart is empty</h3>";
  } 

}	

}//1

	?>

	<a href="index.php">Back to product listing</a>
<br />
<br />
	<?php include "footer.php" ?>
