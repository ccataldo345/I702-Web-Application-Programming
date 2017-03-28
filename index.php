<?php
require_once ("config.php");
?>

<!DOCTYPE html>
<html>
  <head><link href="https://fonts.googleapis.com/css?family=Audiowide" rel="stylesheet"> <!-- from google fonts -->
    <meta charset="utf-8"/>
    <meta name="description" content="Introduction to this guy's website">
    <title>Chris Webshop</title>
    <link rel="css/style.css" type="text/css"/>
    <script type="text/javascript" src="js/main.js"></script>
    <meta name="viewport" content="width=device-width, user-scalable=no"/><!-- Disable zoom on smartphone -->
  </head>
  
  <body>
	 <header>
      <h1 style="font-family: Audiowide;">CHRIS WEBSHOP</h1>
	  <br/>
	  <br/>
    </header>
    <nav>
      <!-- Navigation links go here -->
   
  <form method="POST" action="login.php">
  <input type="text" name="user"/>
  <input type="password" name="password"/>
  <input type="submit" value="Log in!"/>
  </form> <!--Show the login form above-->
  
  <form method="POST" action="logout.php">
  <input type="submit" value="Log out!"/>
  <!--<a href="logout.php">Log out!</a><br />  <!--Put link to logout.php here-->

<br />
<br />
      <a href="regform.php">New user? Please register here!</a><br />
    </nav>

    <section>
      <h3>Products list:</h3>
    </section>
    <article>
      <!-- The actual content goes here -->
      <!-- This is the product list page -->
	  <ul>
	  <?php /*echo "This is hello from PHP!"*/;
		
		$conn = new mysqli("localhost", "test", "t3st3r123", "test");
	 	$results = $conn->query("SELECT * FROM ccataldo_shop_product;");
		
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
		

    </ul>
		</p>
  
  </article>
    <aside>
      <!-- Context specific links go here -->
    </aside>
    <footer>
	<br />
	<br />
      <a href="http://enos.itcollege.ee/~ccataldo">Enos Homepage</a><br />
    </footer>
  </body>
 
</html>