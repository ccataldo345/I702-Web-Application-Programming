<?php
require_once "config.php";
include "header.php"; 
include "dbconn.php";

if (!array_key_exists("timestamp", $_SESSION)) {
  $_SESSION["timestamp"] = date('l jS \of F Y h:i:s A');
}
?>

<?php

// print "Hello %(salutation)s %(first_name)s %(last_name)s" % $row (if user is logged in!)
if (!array_key_exists("user", $_SESSION)) {  //if no user is logged in
//($_SESSION["user"]==null) {
       // Otherwise offer login fields and button
   ?>

<h3><a><i class="material-icons">home</i> HOME PAGE</a></h3>
<p><small>⏱ You started visiting this page since <?=$_SESSION["timestamp"];?></small></p>
<hr>

<p>Please log in </p><pre><i>(hint: aaa@aaa.com, aaa)</i></pre>
  <!--Show the login:--> 
  <form method="POST" action="login.php">
  <input type="text" name="email"/>
  <input type="password" name="password" required/>
  <input type="submit" value="Log in!">
  </form>
  
  <!--<a href="logout.php">Log out!</a><br>  //Put link to logout.php here
  <form method="POST" action="logout.php">
  <input type="submit" value="Log out!"/>-->

<br>
  
  <a href="regform.php">New user? Please register here!</a><br>
<?php 
}

elseif (array_key_exists("user", $_SESSION)) {  //if some user is logged in
    // In case we put user id in the $_SESSION["user"] we need
    // to perform another SQL query to get the full name of the user:
    $results = $conn->query(
        "SELECT * FROM ccataldo_shop_users
        WHERE id = " . $_SESSION["user"]);
    $row = $results->fetch_assoc();
    echo "<h3>Hello " . $row["salutation"] . " ";
    echo "<i class='material-icons'>account_box</i>" . " ";
    echo $row["first_name"] . " ";
    echo $row["last_name"] . "</h3>";

    ?> 

    <form method="POST" action="logout.php">
    <input type="submit" value="Log out"/>
  
  <br>
  <br>

    <a href="cart.php"><i class="material-icons">shopping_cart</i> Go to your shopping cart</a><br><br>
    <!--https://material.io/icons/#ic_shopping_cart-->
     
    <a href="orders.php"><i class="material-icons">content_paste</i> View all your orders</a><br>

<?php
}
?>

  <br><hr>
  <h3>🛍 Products list:</h3>
    
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
            >>>&nbsp;&nbsp;&nbsp;       
            <?=$row["price"]?> EUR
            </span>
            </p>
        </li>
        
    <?php
    }
    
    $conn->close();
 
    ?>

    </ul>

  <?php include "footer.php" ?>

<!--<br><br>
      <center><a href="http://enos.itcollege.ee/~ccataldo">Enos Homepage</a></center><br>'
-->

