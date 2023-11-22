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
    while ($row = $resultNewArrival->fetch_assoc()) {
        $booksNewArrival[] = $row;
    }
}

// Fetching Novel from the database
$queryNovel = "SELECT * FROM book 	WHERE btype='Novel' ORDER BY bookID DESC LIMIT 6;";
$resultNovel = $conn->query($queryNovel);

$booksNovel = [];
if ($resultNovel->num_rows > 0) {
    while ($row = $resultNovel->fetch_assoc()) {
        $booksNovel[] = $row;
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
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/indexStyle.css" rel="stylesheet" type="text/css">
	<link href="css/headerFooter.css" rel="stylesheet" type="text/css">
  </head>
  <body style="padding-top: 70px">
  	<div class="container-fluid">
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
      	<br><br>

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
	    <br><br>
		
		<h2 class="category_name">Short Story</h2>
		<hr class="hr-category">
		<div class="row">
		<?php foreach ($booksShort as $book): ?>
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
	  	<a class="more-btn" href="shortstory.html" > More </a>
	  	</div>
	  <br><br>
		
		<h2 class="category_name">Fantasy</h2>
		<hr class="hr-category">
	    <div class="row">
		  <div class="col-md-2"><div class="card col-md-13"> <img class="card-img-top" src="images/Fantasy/book21.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Starter </h5>
                <p class="card-text"> John Scalzi</p>          
                <p class="card-price">LKR1235.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
			  <div class="card col-md-13"> <img class="card-img-top" src="images/Fantasy/book22.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Warrioeborn</h5>
                <p class="card-text"> Jim Butcher</p>          
                <p class="card-price">LKR4565.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
			  <div class="card col-md-13"> <img class="card-img-top" src="images/Fantasy/book23.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Faebound</h5>
                <p class="card-text">  Saara El-Arifi</p>
                <p class="card-price">LKR5450.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
			  <div class="card col-md-13">
				  <img class="card-img-top" src="images/Fantasy/book24.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">The Scarlet </h5>
                <p class="card-text">  Shelby Mahurin</p>
                <p class="card-price"> LKR5180.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
			  <div class="card col-md-13"> 
				  <img class="card-img-top" src="images/Fantasy/book25.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"> Drowning</h5>
                <p class="card-text"> Ava Reid</p>
                <p class="card-price">LKR2200.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
		  <div class="col-md-2">
			  <div class="card col-md-13">
				  <img class="card-img-top" src="images/Fantasy/book26.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Iron Kissed</h5>
                <p class="card-text">Patricia Briggs</p>
                <p class="card-price">LKR5280.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
	  </div>
	    <div class="more-btn-class">
	  	<a class="more-btn" href="fantacy.html" > More </a>
	  </div>
	  <br><br>
		
		<h2 class="category_name">Thriller</h2>
		<hr class="hr-category">
        <div class="row">
	      <div class="col-md-2">
			  <div class="card col-md-13"> 
			    <img class="card-img-top" src="images/Thriller/book29.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title"> Last Trial</h5>
                <p class="card-text"> Robert Bailey</p>             
                <p class="card-price">LKR22755.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
	      <div class="col-md-2"><div class="card col-md-13"> <img class="card-img-top" src="images/Thriller/book30.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">The Target</h5>
                <p class="card-text"> Catherine Coulter</p>
                <p class="card-price">LKR4258.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
	      <div class="col-md-2"><div class="card col-md-13"> <img class="card-img-top" src="images/Thriller/book31.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Hysteria</h5>
                <p class="card-text"> L.J. Ross</p>
                <p class="card-price">LKR5758.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
	      <div class="col-md-2"><div class="card col-md-13"> <img class="card-img-top" src="images/Thriller/book32.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Knock Out</h5>
                <p class="card-text"> Catherine Coulter</p>                
                <p class="card-price"> LKR2480.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
	      <div class="col-md-2">
			  <div class="card col-md-13"> <img class="card-img-top" src="images/Thriller/book33.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Paradox</h5>
                <p class="card-text"> Catherine Coulter</p>
                <p class="card-price">LKR2450.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
	      <div class="col-md-2"><div class="card col-md-13"> <img class="card-img-top" src="images/Thriller/book34.jpg" alt="Card image cap">
              <div class="card-body">
                <h5 class="card-title">Defendants</h5>
                <p class="card-text">John Ellsworth</p>
                <p class="card-price">LKR8541.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div></div>
      </div>
	    <div class="more-btn-class">
	  	<a class="more-btn" href="thriller.html" > More </a>
	  </div>
      <br><br>
		
		<h2 class="category_name">Fiction</h2>
        <hr class="hr-category">
        <div class="row">
          <div class="col-md-2">
              <div class="card col-md-13"> 
				  <img src="images/Fiction/fiction1.jpg" alt="" class="img-fluid card-img-top"/>
  	          <div class="card-body">
  	          <h5 class="card-title ">Isaac Robot</h5>
  	          <p class="card-text">Isacc Asimov</p>
  	          <p class="card-price">LKR 1458.00</p>
              <a href="#" class="btn btn-primary">Add To Cart</a> </div>
              </div>
          </div>
          <div class="col-md-2">
              <div class="card col-md-13"> <img src="images/Fiction/fiction3.jpg" alt="" class="img-fluid card-img-top"/>
  	        <div class="card-body">
  	          <h5 class="card-title">Kadathol Aththu</h5>
  	          <p class="card-text">Kamal Gunarathne</p>
  	          <p class="card-price">LKR 1980.00</p>
		
        <a href="#" class="btn btn-primary">Add To Cart</a> </div>
    </div>
    	</div>
          <div class="col-md-2">
    <div class="card col-md-13"> <img src="images/Fiction/fiction2.jpg" alt="" class="img-fluid card-img-top"/>
  	          <div class="card-body">
  	          <h5 class="card-title">Angampora Queen</h5>
  	          <p class="card-text">Tovenaar T P</p>
			  <p class="card-price">LKR 600.00</p>
        <a href="#" class="btn btn-primary">Add To Cart</a> </div>
    </div>
    </div>
          <div class="col-md-2">
            <div class="card col-md-13"> <img src="images/Fiction/fiction4.jpg" alt="" class="img-fluid card-img-top"/>
  	        <div class="card-body">
  	          <h5 class="card-title">A Shining Star</h5>
  	          <p class="card-text">Freeda Villavarayan</p>
  	          <p class="card-price">LKR 1485.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="card col-md-13"> <img src="images/Fiction/fiction5.jpg" alt="" class="img-fluid card-img-top"/>
  	        <div class="card-body">
  	          <h5 class="card-title">After we fell</h5>
  	          <p class="card-text">Anna Todd</p>
  	          <p class="card-price">LKR 2200.00</p>
        <a href="#" class="btn btn-primary">Add To Cart</a> </div>
    </div>
    	</div>
          <div class="col-md-2">
            <div class="card col-md-13"> <img src="images/Fiction/fiction6.jpg" alt="" class="img-fluid card-img-top"/>
  	        <div class="card-body">
  	          <h5 class="card-title">After we collided</h5>
  	          <p class="card-text">Anna Todd</p>
  	          <p class="card-price">LKR 2200.00</p>
                <a href="#" class="btn btn-primary">Add To Cart</a></div>
            </div>
  		</div>
        </div>
	    <div class="more-btn-class">
	  	<a class="more-btn" href="fiction.html" > More </a>
	  </div>

		
	</div>


  	<br><br>
      <div class="container">
        <h2 class="heading1">Join Millions Of Happy Readers.</h2>
            <div class="row">
               <div class="col-md-4">
	              <div class="jumbotron">
		        
	                   <p class="lead centeralign">"I would tell anyone to just sign up without reservation. I now have more books than I can read in a lifetime."<br><br></p>
                       <hr class="my-4">
			    <div class="centeralign">
		        <img src="images/monae.jpg" width="60" height="60" alt="" style="border-radius:50%;"/> </div>
	          <p class="lead_author centeralign ">Mona.e</p>
		        
            </div>
      </div>
	      <div class="col-md-4"> 
			  <div class="jumbotron">
		        
		        <p class="lead centeralign">"I actually download several books a week... I would say I’ve saved approximately Rs.6000.00 or more each month using BookMart."</p>
		        <hr class="my-4">
			    <div class="centeralign">
		        <img src="images/suzie.jpg" width="60" height="60" alt="" style="border-radius:50%;"/> </div>
		        <p class="lead_author centeralign ">suzie.r</p>
		        
        </div></div>
	      <div class="col-md-4"> 
			  <div class="jumbotron">
		        
	          <p class="lead centeralign">"There are series I would have never discovered if it weren’t for BookMart, and I always feel like I got a deal, always."</p>
	          <hr class="my-4">
			    <div class="centeralign">
		        <img src="images/ellyn.jpg" width="60" height="60" alt="" style="border-radius:50%;"/> </div>
            <p class="lead_author centeralign ">ellyn W.</p>
		        
        </div></div>
      </div>
  </div>
 
  <div class="row">
	<div class="col-md-2">
		<div class="card">
			test
		</div>
	</div>
	<div class="col-md-2">
		<div class="card">
			test
		</div>
	</div>
	<div class="col-md-2">
		<div class="card">
			test
		</div>
	</div>
	<div class="col-md-2">
		<div class="card">
			test
		</div>
	</div>
	<div class="col-md-2">
		<div class="card">
			test
		</div>
	</div>
	<div class="col-md-2">
		<div class="card">
			test
		</div>
	</div>
  </div>


  	
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
		<p>© 2023 BookMart.lk. Designed by Group 31. All Rights Reserved.</p>
	  </div>
  </footer>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>