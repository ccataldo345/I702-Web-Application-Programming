<?php
require_once "config.php";
include "header.php"; 
include "dbconn.php";
?>

<h2>Add a new product</h2>
<hr>
<pre>
<form method="post" enctype="multipart/form-data">
    <label for="product_name">Product name: </label>
    <input type="text" name="product_name" placeholder="Product name" required/>
    
    <label for="product_price">Product price: </label>
    <input type="text" name="product_price" placeholder="Product price" required/>
    
    <label for="product_desc">Product description: </label>
    <textarea name="product_desc" rows="10" cols="50"></textarea>
    
    <input type="hidden" name="MAX_FILE_SIZE" value="2000000" />
    Select product picture (max 2M): 
    <input id="file" type="file" name="uploaded_image" accept="image/*"/><br>
    <input type="submit" value="Add product"/>
</form></pre><br>

<?php
if (isset($_POST["submit"])) {
    $statement = $conn->prepare(
      "INSERT INTO `ccataldo_shop_products`(
        `name`,
        `description`,
        `price`,
        `image`)
      VALUES (?,?,?,?)");
    
    if (!$statement) {
      die("Prepare failed:(".$conn->errno. ") ".$conn->error);
    }
    
    $statement->bind_param("ssss",
      $_POST["name"],
      $_POST["description"],
      $_POST["price"],
      $_POST["image"]);
    
    if ($statement->execute()) {
      echo "You have successfully added a new item";
    }else{
      if ($statement->errno == 1062) {
        echo "This item is already in database";
      }else{
        die("Execute failed: (".$statement->errno. ") ".$statement->error);
      }
    }
    
    $conn->close();
}
?>
<br>
<hr>
<a href="index.php">Go back to homepage</a>
<br>
<br>

<?php
include "footer.php";
?>
