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
					<a href="description.php?id=<?=$row['id']?>">
						<?=$row["name"]?></a>
						<?=$row["price"]?> EUR
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