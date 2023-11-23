<?php
// Database connection
		$server="localhost";
        $user="root";
        $pw="";
        $db="bookmart";

$conn = new mysqli($server, $user, $pw, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetching New Arival from the database
$queryNewArrival = "SELECT * FROM book ORDER BY bookID DESC LIMIT 6;";
$resultNewArrival = $conn->query($queryNewArrival);

$booksNewArrival = [];
if ($resultNewArrival->num_rows > 0) {
    while ($rowNewArrival = $resultNewArrival->fetch_assoc()) {
        $booksNewArrival[] = $rowNewArrival;
    }
}

// Fetching Novel from the database
$queryNovel = "SELECT * FROM book 	WHERE btype='Novel' ORDER BY bookID DESC LIMIT 6;";
$resultNovel = $conn->query($queryNovel);

$booksNovel = [];
if ($resultNovel->num_rows > 0) {
    while ($rowNovel = $resultNovel->fetch_assoc()) {
        $booksNovel[] = $rowNovel;
    }
}
// Fetching Short story from the database
$queryShort = "SELECT * FROM book WHERE btype='Short' ORDER BY bookID DESC LIMIT 6;";
$resultShort = $conn->query($queryShort);

$booksShort = [];
if ($resultShort->num_rows > 0) {
    while ($rowShort = $resultShort->fetch_assoc()) {
        $booksShort[] = $rowShort;
    }
}
// Fetching Fantasy books from the database
$queryFantasy = "SELECT * FROM book WHERE btype='Fantasy' ORDER BY bookID DESC LIMIT 6;";
$resultFantasy = $conn->query($queryFantasy);

$booksFantacy = [];
if ($resultFantasy->num_rows > 0) {
    while ($rowFantasy = $resultFantasy->fetch_assoc()) {
        $booksFantacy[] = $rowFantasy;
    }
}
// Fetching Thriller books from the database
$queryThriller = "SELECT * FROM book WHERE btype='Thriller' ORDER BY bookID DESC LIMIT 6;";
$resultThriller = $conn->query($queryThriller);

$booksThriller = [];
if ($resultThriller->num_rows > 0) {
    while ($rowThriller = $resultThriller->fetch_assoc()) {
        $booksThriller[] = $rowThriller;
    }
}
// Fetching Fiction books from the database
$queryFiction = "SELECT * FROM book WHERE btype='Fiction' ORDER BY bookID DESC LIMIT 6;";
$resultFiction = $conn->query($queryFiction);

$booksFiction = [];
if ($resultFiction->num_rows > 0) {
    while ($rowFiction = $resultFiction->fetch_assoc()) {
        $booksFiction[] = $rowFiction;
    }
}
$conn->close();
?>

<!DOCTYPE html><html lang="en">
  <head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BookMart</title>
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/indexStyle.css" rel="stylesheet" type="text/css">
	<link href="css/headerFooter.css" rel="stylesheet" type="text/css">
  </head>
  <body style="padding-top: 70px">
  	<div class="container-fluid">
		<!---Nav-Bar--->
		<div class="container">
			<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light"> 
			<a class="navbar-brand" href="home.html"> <img src="images/BookMart_logo.png" alt="" width="120" height="48"  class="logo" ></a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent1">
				<ul class="navbar-nav mr-auto">
				<li class="nav-item active"> <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a> </li>
				
				<li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Categories </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown1">
						<a class="dropdown-item" href="novels.html">Novels</a> 
						<a class="dropdown-item" href="shortstory.html">Short Story</a>
					<a class="dropdown-item" href="fantacy.html">Fantasy</a>
					<a class="dropdown-item" href="thriller.html">Thriller</a> 
						<a class="dropdown-item" href="fiction.html">Fiction</a>
					</div>
				</li>
					<li class="nav-item"> <a class="nav-link" href="about.html">About&nbsp;</a> </li>
				<li id="scrollButton" class="nav-item"> <a class="nav-link" style="cursor: pointer">Contact Us&nbsp;</a></li>
				<script>
						// script.js
						document.addEventListener("DOMContentLoaded", function () {
						var scrollButton = document.getElementById("scrollButton");
						// Add a click event listener to the button
						scrollButton.addEventListener("click", function () {
						// Scroll to the bottom of the page
						window.scrollTo(0, document.body.scrollHeight);
						});
						});
				</script>
					
				<li class="nav-item"> <a class="nav-link" href="signin.html">Sign In&nbsp;</a></li>
				<li class="nav-item"> <a class="nav-link" href="signin.html">&nbsp;</a></li>
				</ul>
				<form class="search-form">
				<input class="search-input" type="search" placeholder="Search" aria-label="Search">
				<button class="search-btn" type="submit">Search</button>
				</form>
			</div>
			</nav>
		</div>
		<!---Carousel--->
		<div id="video-carousel-example" class="carousel slide carousel-fade" data-ride="carousel" >
			<ol class="carousel-indicators">
				<li data-target="#video-carousel-example" data-slide-to="0" class="active"></li>
				<li data-target="#video-carousel-example" data-slide-to="1"></li>
				<li data-target="#video-carousel-example" data-slide-to="2"></li>
			</ol>
			
			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active " style="height:600px; ">
					<video class="video-fluid embed-responsive embed-responsive-16by9" autoplay loop muted>
						<source src="video1.mp4" type="video/mp4">
					</video>
					<div class="carousel-caption">
						<h1>Knowledge</h1>
					</div>	
				</div>
				
				<div class="carousel-item " style="height:600px; ">
					<video class="video-fluid embed-responsive embed-responsive-16by9" autoplay loop muted>
						<source src="video2.mp4" type="video/mp4">
					</video>
					<div class="carousel-caption">
						<h1 style="color:black;">Becomes</h1>
					</div>
				</div>
			
				<div class="carousel-item " style="height:600px; ">
					<video class="video-fluid embed-responsive embed-responsive-16by9" autoplay loop muted>
						<source src="video3.mp4" type="video/mp4">
					</video>
					<div class="carousel-caption">
						<h1>Power</h1>
					</div>
				</div>
			</div>
		</div>													  
		<a class="carousel-control-prev" href="#video-carousel-example" role="button" data-slide="prev"> 
			<span class="carousel-control-prev-icon" aria-hidden="true"></span> 
			<span class="sr-only">Previous</span>
		</a> 
		<a class="carousel-control-next" href="#video-carousel-example" role="button" data-slide="next"> 
			<span class="carousel-control-next-icon" aria-hidden="true"></span> 
			<span class="sr-only">Next</span>
		</a>
	</div>
	<br><br>

	<!--- products categories--->
  	<div class="container" style="margin-top:70px;">
		<h2 class="category_name">New Arrival</h2>
	  	<hr class="hr-category">
	    <div class="row">
		<?php foreach ($booksNewArrival as $book): ?>
			<div class="col-md-2">
			  	<div class="card  col-md-13"> 
					<?php
						$imagePath = "images/Short Story/" . $book['bimage'];
						?>
						<img src="<?php echo $imagePath; ?>">
					
					<div class="card-body">
						<h5 class="card-title"><?php echo $book['bname']; ?></h5>
						<p class="card-text"><?php echo $book['bauthor']; ?></p>
						<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Add To Cart</a>
						</div>
					</div>
           	 	</div>
			</div>
		<?php endforeach; ?>
		</div>	  
      	<br><br><br>

		<h2 class="category_name">Novels</h2>
	  	<hr class="hr-category">
	    <div class="row">
		<?php foreach ($booksNovel as $book): ?>
			<div class="col-md-2">
			  	<div class="card  col-md-13"> 
					<?php
						$imagePath = "images/Novels/" . $book['bimage'];
						?>
						<img src="<?php echo $imagePath; ?>">
					
					<div class="card-body">
						<h5 class="card-title"><?php echo $book['bname']; ?></h5>
						<p class="card-text"><?php echo $book['bauthor']; ?></p>
						<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Add To Cart</a>
						</div>
					</div>
           	 	</div>
			</div>
		<?php endforeach; ?>
		</div>	  
	    <div class="more-btn-class">
	  	<a class="more-btn" href="novels.html" > More </a>
	    </div>
	
	    <br><br><br>
		
		<h2 class="category_name">Short Story</h2>
		<hr class="hr-category">
		<div class="row">
		<?php foreach ($booksShort as $book): ?>
			<div class="col-md-2">
			  	<div class="card  col-md-13"> 
					<?php
						$imagePath = "images/Short Story/" . $book['bimage'];
						?>
						<img src="<?php echo $imagePath; ?>">
					
					<div class="card-body">
						<h5 class="card-title"><?php echo $book['bname']; ?></h5>
						<p class="card-text"><?php echo $book['bauthor']; ?></p>
						<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Add To Cart</a>
						</div>
					</div>
           	 	</div>
			</div>
		<?php endforeach; ?>
		</div>
	    <div class="more-btn-class">
	  	<a class="more-btn" href="shortstory.html" > More </a>
	  	</div>
		<br><br><br>


		<h2 class="category_name">Fantasy</h2>
		<hr class="hr-category">
	    <div class="row">
		<?php foreach ($booksFantacy as $book): ?>
			<div class="col-md-2">
			  	<div class="card  col-md-13"> 
					<?php
						$imagePath = "images/Fantasy/" . $book['bimage'];
						?>
						<img src="<?php echo $imagePath; ?>">
					
					<div class="card-body">
						<h5 class="card-title"><?php echo $book['bname']; ?></h5>
						<p class="card-text"><?php echo $book['bauthor']; ?></p>
						<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Add To Cart</a>
						</div>
					</div>
           	 	</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="more-btn-class">
	  	<a class="more-btn" href="fantacy.html" > More </a>
	  	</div>
		<br><br><br>


		<h2 class="category_name">Thriller</h2>
		<hr class="hr-category">
		<div class="row">
			<?php foreach ($booksThriller as $book): ?>
				<div class="col-md-2">
					<div class="card  col-md-13"> 
						<?php
							$imagePath = "images/Thriller/" . $book['bimage'];
							?>
							<img src="<?php echo $imagePath; ?>">
						
						<div class="card-body">
							<h5 class="card-title"><?php echo $book['bname']; ?></h5>
							<p class="card-text"><?php echo $book['bauthor']; ?></p>
							<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
							<div class="card-footer">
								<a href="#" class="btn btn-primary">Add To Cart</a>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="more-btn-class">
	  	<a class="more-btn" href="thriller.html" > More </a>
	  	</div>
		<br><br><br>

		<h2 class="category_name">Fiction</h2>
        <hr class="hr-category">
        <div class="row">
		<?php foreach ($booksFiction as $book): ?>
			<div class="col-md-2">
			  	<div class="card  col-md-13"> 
					<?php
						$imagePath = "images/Fiction/" . $book['bimage'];
						?>
						<img src="<?php echo $imagePath; ?>">
					
					<div class="card-body">
						<h5 class="card-title"><?php echo $book['bname']; ?></h5>
						<p class="card-text"><?php echo $book['bauthor']; ?></p>
						<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
						<div class="card-footer">
							<a href="#" class="btn btn-primary">Add To Cart</a>
						</div>
					</div>
           	 	</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="more-btn-class">
	  		<a class="more-btn" href="fiction.html" > More </a>
	  	</div>
	</div>
	<br><br><br>

	<!---Jumbotron--->
    <div class="container">
        	<h2 class="heading1">Join Millions Of Happy Readers.</h2>
            <div class="row">
              	<div class="col-md-4">
	              	<div class="jumbotron">
		        		<p class="lead centeralign">"I would tell anyone to just sign up without reservation. I now have more books than I can read in a lifetime."<br><br></p>
                        <hr class="my-4">
			    		<div class="centeralign">
		        			<img src="images/monae.jpg" width="60" height="60" alt="" style="border-radius:50%;"/>
	          				<p class="lead_author">Mona.e</p>
						</div>
      				</div>
				</div>
				<div class="col-md-4"> 
			  		<div class="jumbotron">
						<p class="lead centeralign">"I actually download several books a week... I would say I’ve saved approximately Rs.6000.00 or more each month using BookMart."</p>
						<hr class="my-4">
						<div class="centeralign">
							<img src="images/suzie.jpg" width="60" height="60" alt="" style="border-radius:50%;"/> 
							<p class="lead_author">suzie.r</p>
						</div>
		        	</div>
				</div>
	      		<div class="col-md-4"> 
			  		<div class="jumbotron">
		        		<p class="lead centeralign">"There are series I would have never discovered if it weren’t for BookMart, and I always feel like I got a deal, always."</p>
	          			<hr class="my-4">
						<div class="centeralign">
							<img src="images/ellyn.jpg" width="60" height="60" alt="" style="border-radius:50%;"/>
							<p class="lead_author centeralign ">ellyn W.</p> 
						</div>
            		</div>
				</div>
      		</div>
	</div>

  	<!---Footer--->
    <footer>
			<div class="row">
				<div class="col-md-6">
					<img src="images/BookMart_logo.png" width="160" class="footer-imglogo img-fluid">
				</div>
				<div class="col-md-6">
					<table>
						<tr>
						<td><img class="social-media-logo img-fluid" src="images/Footer/fb.png" alt="Facebook" style="width:2.15em; height:2.15em"></td>
						<td><img class="social-media-logo img-fluid" src="images/Footer/insta.png" alt="Instagram"></td>
						<td><img class="social-media-logo img-fluid" src="images/Footer/linke.png" alt="Linkedin"></td>
						<td><img class="social-media-logo img-fluid" src="images/Footer/pint.png" alt="Pinterest"></td>
						</tr>
					</table>
				</div>
			</div>
		
			<hr style="height:1px;border-width:0;color:gray;background-color:darkgrey; width:95%;">
			<div class="row" >
				<div class="col-md-3 left-padding">
					<h6 style="text-transform: uppercase">&ensp;Categories</h6>
					<ul>
						<li><a href="novels.html" >Novels</a> </li>
						<li><a href="shortstory.html">Short Story</a></li>
						<li><a href="fantacy.html">Fantasy</a></li>
						<li> <a href="thriller.html">Thriller</a> </li>
						<li><a href="fiction.html">Fiction</a></li>			
					</ul>
				</div>
				<div class="col-md-3">
					<h6 style="text-transform: uppercase">&ensp;Quick Links</h6>
					<ul>
						<li><a href="index.html" >Home</a> </li>
						<li><a href="about.html">About</a></li>
						<li><a href="contactus.html">Contact us</a></li>
						<li> <a href="signin.html">Sign in</a> </li>		
					</ul>
				</div>
				<div class="col-md-3"> 
					<dl>
					<h6 >CONTACT US</h6>
						<dd>&ensp;No.21, Stanly road, Nugegoda.</dd>
						<dd>&ensp;+94 112 456 456</dd>
						<dd>&ensp;bookmart@gmail.com</dd>
					</dl>
				</div>
				<div class="col-md-3">
					<h6>SIGN IN</h6>
					<form>
					<div style="padding-top:5px; padding-bottom: 10px" >	  
							<input type="email" id="email" class="input-field" placeholder="Enter your email address" /> 			   
					</div>
					</form>    
					<div class="blue-btn">
						<a class="first-link" href=""> Get Started</a>
					</div>
				</div>
			</div>
			<hr style="height:1px;border-width:0;color:gray;background-color:darkgrey; width:95%;">
			<div class="footer-copyright">
				<p>© 2023 BookMart.lk. Designed by Group
					31. All Rights Reserved.</p>
			</div>
	</footer>
	


	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>