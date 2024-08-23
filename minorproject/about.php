<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>About Us</title>
  <link rel="stylesheet" type="text/css" href="style2.css">
</head>
<body>
  <header>
		<nav>
			<div class="logo">
				Pla<span>n</span>ts
			</div>
			<div class="menu">
				<a href="index.php"><b>Home</b></a>
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
				<a class="active" href="about.php"><b>About</b></a>
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
		<h1>About Our Plants Website</h1>
  </header>
  <header class="cover">
  <h1>About Us</h1>
</header>
  <main>
  <div class="container">
	<div class="image">
		 <img src="image/plants.jpg" width="400" height="500">
	</div>
	<div class="content">
    	<section>
        <h2>Introduction</h2>
        <p>Welcome to our website, where we are dedicated to helping you bring the beauty and benefits of plants into your home and garden. 
			Our mission is to provide a wide selection of high-quality plants, expert advice on their care and maintenance, and an enjoyable shopping experience that inspires and delights. 
			Whether you're a seasoned green thumb or just starting out, we're here to guide you every step of the way, from selecting the perfect plants for your space to helping them thrive and flourish. 
			We believe that everyone can enjoy the many benefits of plants, from their air-purifying and stress-reducing properties to their natural beauty and ability to enhance any living space. 
			Thank you for choosing us as your trusted source for all things green and growing.</p>
      	</section>
	</div>
	</div>
	<div class="decoration">
	<div class="image">
		 <img src="image/flower2.jpg" width="400" height="400">
	</div>
	<div class="content">
      <section>
        <h2>Our Mission</h2>
        <p>"Our mission is to provide high-quality, healthy plants to our customers and help them create beautiful and sustainable green spaces. 
			We are committed to promoting a love and appreciation for plants, while also prioritizing sustainability and environmental responsibility. 
			Through our website, we aim to offer a wide variety of plants, expert advice, and exceptional customer service to meet the needs of plant enthusiasts and beginners alike."</p>
      </section>
	  </div>
	</div>
	<div class="container">
	<div class="image">
		 <img src="image/flower4.jpg" width="400" height="500">
	</div>
	<div class="content">
	  <section>
        <p>Our plants selling website was founded in 2010 by John Smith, a horticulturist with over 20 years of experience in the industry. 
			John saw a need for a more accessible and convenient way for people to purchase high-quality plants online, and he set out to create a platform that would provide just that..</p>
        <p>Over the years, our website has grown into a thriving community of plant lovers and enthusiasts from all over the world. 
			We have expanded our product offerings and developed new features to better serve our customers, 
			but our commitment to providing top-notch plants and excellent customer service remains at the heart of everything we do</p>
		<p><b>Anubhav Shah</b></p>
      </section>
	  </div>
	</div>
	</main>
	<main>
      <section>
  <h2>Content and Features</h2>
  <div class="content">
    <div class="column">
      <h3>Articles</h3>
      <ul>
        <li>Plant care guides</li>
        <li>Gardening tips</li>
        <li>DIY projects</li>
      </ul>
    </div>
    <div class="column">
      <h3>Photos</h3>
      <ul>
        <li>Plant galleries</li>
        <li>Before and after transformations</li>
        <li>Inspiring plant setups</li>
      </ul>
    </div>
  <div class="column">
    <h3>Gardening Supplies</h3>
    <p>Explore our wide selection of high-quality plants and gardening supplies.</p>
    <a href="plants.php">Shop Now</a>
	</div>
	</div>
	</section>
	</main>
	<main>
	<section class="testimonials-section">
  <h2>What Our Customers Say</h2>
  <div class="testimonials-container">
    <div class="testimonial">
      <img src="image/author.jpeg" alt="Customer 1">
      <h3>Ankush Singh</h3>
      <p class="testimonial-text">I am so happy with the quality of the plants I received from this website. They were healthy and well-packaged, and they look beautiful in my garden.</p>
    </div>
    <div class="testimonial">
      <img src="image/man.jpg" alt="Customer 2">
      <h3>Jane Doe</h3>
      <p class="testimonial-text">I was impressed by the variety of plants available on this website, and the prices are very reasonable. The customer service team was also very helpful in answering my questions.</p>
    </div>
    <div class="testimonial">
      <img src="image/man1.jpg" alt="Customer 3">
      <h3>Mike Johnson</h3>
      <p class="testimonial-text">I've been buying my gardening tools from this website for years, and I have never been disappointed. The products are always top-notch, and the shipping is fast and reliable.</p>
    </div>
  </div>
</section>
    </main>
  
<!-- Footer -->
<?php
include 'footer.php';
?>
<!-- Add this before the closing body tag -->
</body>
</html>
