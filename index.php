<?php
require_once "config.php";
include "header.php";
?>

<br />

  <!--Show the login:--> 
  <form method="POST" action="login.php">
  <input type="text" name="user"/>
  <input type="password" name="password"/>
  <input type="submit" value="Log in!"/>
  </form> 
  
  <!--<a href="logout.php">Log out!</a><br />  <!--Put link to logout.php here-->
  <form method="POST" action="logout.php">
  <input type="submit" value="Log out!"/>


<br />
<br />
  
  <a href="regform.php">New user? Please register here!</a><br />
  <br />
  <a href="cart.php">Go to shopping cart</a><br /><br />

  <h3>Products list:</h3>
    
	  <ul>
	  <?php /*echo "This is hello from PHP!"*/;
		
		$conn = new mysqli("localhost", "test", "t3st3r123", "test");
	 	$results = $conn->query("SELECT * FROM ccataldo_shop_products;");
		
		while ($row = $results->fetch_assoc()) {
			?>

				<li>
           <p style="border: 2px dotted;">
              <a href="description.php?id=<?=$row['id']?>">
            <?=$row["name"]?></a>'      '         
            <?=$row["price"]?> EUR
            </p>
        </li>
				
    <?php
		}
 
		$conn->close();
 
		?>
	

  <?php include "footer.php" ?>

<br />
<br />
      <center><a href="http://enos.itcollege.ee/~ccataldo">Enos Homepage</a></center><br />


