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
	
  </head>
  <body style="padding-top: 70px">
  	<!-- <div class="container-fluid"> -->
		<!---Header--->
		<?php include 'header.html'; ?>
		
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
	<!-- </div> -->
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
						$imagePath = "" . $book['bimage'];
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
	  <?php include 'footer.html'; ?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
  <script src="js/jquery-3.4.1.min.js"></script>

	<!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>