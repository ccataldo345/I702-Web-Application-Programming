<?php
require_once "config.php";
include "header.php";
$conn = new mysqli(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error)
  die("Connection to database failed:" .
    $conn->connect_error);
$conn->query("set names utf8"); // Support umlaut characters

if (!array_key_exists("timestamp", $_SESSION)) {
  $_SESSION["timestamp"] = date('l jS \of F Y h:i:s A');
}
?>

<h3>HOME PAGE</h3>
<p><small>You started visiting this page since <?=$_SESSION["timestamp"];?></small></p>

<?php

// print "Hello %(salutation)s %(first_name)s %(last_name)s" % $row (if user is logged in!)
if (array_key_exists("user", $_SESSION)) {
    // In case we put user id in the $_SESSION["user"] we need
    // to perform another SQL query to get the full name of the user:
    $results = $conn->query(
        "SELECT * FROM ccataldo_shop_users
        WHERE id = " . $_SESSION["user"]);
    $row = $results->fetch_assoc();
    echo "Hello " . $row["salutation"] . " ";
    echo $row["first_name"] . " ";
    echo $row["last_name"];

    ?> 
    <form method="POST" action="logout.php">
    <input type="submit" value="Log out!"/>
  <?php
} else {
   // Otherwise offer login fields and button
   ?>
<p>Please log in</p>
  <!--Show the login:--> 
  <form method="POST" action="login.php">
  <input type="text" name="user"/>
  <input type="password" name="password"/>
  <input type="submit" value="Log in!"/>
  </form>
  <?php 
  } 
  ?>
  
  <!--<a href="logout.php">Log out!</a><br />  <!--Put link to logout.php here
  <form method="POST" action="logout.php">
  <input type="submit" value="Log out!"/>-->


<br />
  
  <a href="regform.php">New user? Please register here!</a><br />
  <br />
  <a href="cart.php">Go to shopping cart</a><br /><br />

  <h3>Products list:</h3>
    
	  <ul>
	  <?php /*echo "This is hello from PHP!"*/;
		
		$results = $conn->query("SELECT * FROM ccataldo_shop_products;");
		
		while ($row = $results->fetch_assoc()) {
			?>

				<li>
           <p style="border: 1px outset;">
              <a href="description.php?id=<?=$row['id']?>">
            <?=$row["name"]?></a>
            <span style="float:right;">  
            >>>&nbsp&nbsp&nbsp       
            <?=$row["price"]?> EUR
            </span>
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


