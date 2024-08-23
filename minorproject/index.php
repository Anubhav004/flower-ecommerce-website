<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Plants</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	
</head>
<body>
	<header>
		<nav>
			<div class="logo">
				Pla<span>n</span>ts
			</div>
			<div class="menu">
				<a class="active" href="index.php"><b>Home</b></a>
				<div class="dropdown">
				<a href="plants.php"><b>Plants</b></a>
				<div class="dropdown-content">
				<?php
        // Connect to the database
        include 'config.php';

        // Retrieve categories from database
        include 'category.php';
      ?>
      </div>
      </div>
				<a href="about.php"><b>About</b></a>
				<a href="contactus.php"><b>Contact us</b></a>
			</div>
		
			<div class="icon">
				<?php
				session_start();
				
    			if (isset($_SESSION['email'])) {
      			// user is logged in, display "Logout" and "My Account" options
				echo '<a href="myaccount.php">My Account</a>';
				echo '<a href="logout.php">Logout</a>';
				} else {
				// user is not logged in, display "Login" option
				echo '<a href="login.php">Login</a>';
				}
				?>
			</div>
		</nav>

		<section class="h-text">
			
			<h1 data-aos="zoom-in-down" data-aos-delay="100">"Welcome to our Plant Paradise. Find your perfect plant match."</h1>
			
			<a href="plants.php"><button><i class="btn"></i>Explore</button></a>
		</section>
	</header>
	<div class="design">
		<div class="image">
		 <img src="image/flower3.jpg" width="400" height="400">
		</div>
		<div class="content">
			<h1 class="plants">Welcome to our website</h1>
			<p class="plant">Welcome to our online plant store! We are passionate about bringing the beauty of nature into your homes and offices. 
				Whether you are an experienced gardener or just starting out, our wide selection of plants will have something to offer you. 
				We pride ourselves on offering only the highest quality plants that are handpicked by our expert team. 
				From flowering plants to succulents, indoor plants to outdoor plants, we have something for everyone. 
				We believe that plants not only add beauty to our surroundings, but also have a positive impact on our physical and mental health. 
				So, come explore our selection of plants and bring a little bit of the outdoors inside your home or office!</p>
		</div>
	</div>
	
<!-- features product -->
<section id="featured-products">
  <div class="container">
    <h2>Featured Products</h2>
    <div class="row">
      <div class="col">
        <div class="product">
          <img src="image/Monstera deliciosa.jpg" alt="Product 1">
          <h3>Monstera deliciosa</h3>
          <p class="description">Monstera deliciosa, the Swiss cheese plant or split-leaf philodendron is a 
			species of flowering plant native to tropical forests of southern Mexico, south to Panama. 
			It has been introduced to many tropical areas, and has become a mildly invasive species in Hawaii, 
			Seychelles, Ascension Island and the Society Islands.</p>

        </div>
      </div>
      <div class="col">
        <div class="product">
          <img src="image/Fiddle leaf fig.jpg" alt="Product 2">
          <h3>Fiddle leaf fig</h3>
          <p class="description">Ficus lyrata, commonly known as the fiddle-leaf fig, 
			is a species of flowering plant in the mulberry and fig family Moraceae. 
			It is native to western Africa, from Cameroon west to Sierra Leone, 
			where it grows in lowland tropical rainforest. It can grow up to 12–15 m tall.</p>
          
        </div>
      </div>
      <div class="col">
        <div class="product">
          <img src="image/ZZ plant.jpg" alt="Product 3">
          <h3>Zanzibar Gem - plant</h3>
          <p class="description">Zamioculcas is a genus of flowering plants in the family Araceae, containing the single species Zamioculcas zamiifolia. It is a tropical perennial plant, 
			native to eastern Africa, from southern Kenya to northeastern South Africa.</p>
          
        </div>
      </div>
    </div>
  </div>
</section>



<!-- Footer -->
<?php
include 'footer.php';
?>

</body>
</html>