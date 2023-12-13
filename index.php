<?php
@include 'configDatabase.php';
@include 'header.php';
 $userID = $_SESSION['user_id'];

 // Fetching All books from the database
 $queryCart = "SELECT *
 FROM book
 JOIN cart ON book.bookID = cart.bookID
 WHERE cart.userID = $userID  
 ORDER BY cart.cartID DESC;";

 $resultcart = $conn->query($queryCart);

 $cart = [];
 if ($resultcart->num_rows > 0) {
	 while ($rowcart = $resultcart->fetch_assoc()) {
		 $cart[] = $rowcart;
	 }
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
$queryNovel = "SELECT * FROM book 	WHERE btype='Novels' ORDER BY bookID DESC LIMIT 6;";
$resultNovel = $conn->query($queryNovel);

$booksNovel = [];
if ($resultNovel->num_rows > 0) {
    while ($rowNovel = $resultNovel->fetch_assoc()) {
        $booksNovel[] = $rowNovel;
    }
}
// Fetching Short story from the database
$queryShort = "SELECT * FROM book WHERE btype='ShortStory' ORDER BY bookID DESC LIMIT 6;";
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
//Adding books to cart table 
if(isset($_POST['add_to_cart'])){
	$bookID = $_POST["bookID"];
	
	   $insert_cart_sql = "INSERT INTO `cart`(bookID, userID) VALUES($bookID, $userID)";
	   if ($conn->query($insert_cart_sql) === TRUE) {
		echo '<script>';
		echo 'alert("add to cart success!");';
		echo '</script>';
		header("Location: /Book-Mart/cart.php");
	   }
	   else{
		echo '<script>';
		echo 'alert("add to cart fail!");';
		echo '</script>';
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
  <body style="padding-top: 73px">
  	
		<!---Carousel--->
		<div id="video-carousel-example" class="carousel slide carousel-fade" data-bs-ride="carousel">
			<ol class="carousel-indicators">
				<li data-bs-target="#video-carousel-example" data-bs-slide-to="0" class="active"></li>
				<li data-bs-target="#video-carousel-example" data-bs-slide-to="1"></li>
				<li data-bs-target="#video-carousel-example" data-bs-slide-to="2"></li>
			</ol>

			<div class="carousel-inner" role="listbox">
				<div class="carousel-item active" style="height: 600px;">
					<img src="images/carousel1.png" class="d-block w-100" alt="Image 1">
				</div>

				<div class="carousel-item" style="height: 600px;">
					<img src="images/carousel2.JPG" class="d-block w-100" alt="Image 2">
				</div>

				<div class="carousel-item" style="height: 600px;">
					<img src="images/carousel3.png" class="d-block w-100" alt="Image 3">
				</div>
			</div>

			<a class="carousel-control-prev" href="#video-carousel-example" role="button" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
			</a>
			<a class="carousel-control-next" href="#video-carousel-example" role="button" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
			</a>
		</div>
	<!-- included js for carousel moving and fading -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
	<br><br>

	<!--- products categories--->
	
  	<div class="container" style="margin-top:70px;">
		<h2 class="category_name">New Arrival</h2>
	  	<hr class="hr-category">
	    <div class="row">
		<?php foreach ($booksNewArrival as $book): ?>
		<?php $isInCart = false; ?>
		<?php foreach ($cart as $cartItem): ?>
			<?php if ($book['bookID'] == $cartItem['bookID']): ?>
				<?php $isInCart = true; ?>
				<?php break; ?>
			<?php endif; ?>
		<?php endforeach; ?>

		<div class="col-md-2">
			<div class="card col-md-13"> 
				<img src="<?php echo $book['bimage']; ?>">
				
				<div class="card-body">
					<h5 class="card-title"><?php echo $book['bname']; ?></h5>
					<p class="card-text"><?php echo $book['bauthor']; ?></p>
					<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
					<div class="card-footer">
						<?php if (!$isInCart): ?>
							<form action="" method="POST">
								<input type="hidden" name="bookID" value="<?php echo $book['bookID']; ?>"/>
								<input type="submit" class="btn btn-primary" value="Add to cart" name="add_to_cart">
							</form>
						<?php endif; ?>
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
		<?php $isInCart = false; ?>
		<?php foreach ($cart as $cartItem): ?>
			<?php if ($book['bookID'] == $cartItem['bookID']): ?>
				<?php $isInCart = true; ?>
				<?php break; ?>
			<?php endif; ?>
		<?php endforeach; ?>

		<div class="col-md-2">
			<div class="card col-md-13"> 
				<img src="<?php echo $book['bimage']; ?>">
				
				<div class="card-body">
					<h5 class="card-title"><?php echo $book['bname']; ?></h5>
					<p class="card-text"><?php echo $book['bauthor']; ?></p>
					<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
					<div class="card-footer">
						<?php if (!$isInCart): ?>
							<form action="" method="POST">
								<input type="hidden" name="bookID" value="<?php echo $book['bookID']; ?>"/>
								<input type="submit" class="btn btn-primary" value="Add to cart" name="add_to_cart">
							</form>
						<?php endif; ?>
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
				<img src="<?php echo $book['bimage']; ?>">
					
					<div class="card-body">
						<h5 class="card-title"><?php echo $book['bname']; ?></h5>
						<p class="card-text"><?php echo $book['bauthor']; ?></p>
						<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
						<div class="card-footer">
						<form action="" method="POST">
							<input type="hidden" name="bookID" value="<?php echo $book['bookID']; ?>"/>
							<input type="submit" class="btn btn-primary" value="Add to cart" name="add_to_cart">
						</form>
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
				<img src="<?php echo $book['bimage']; ?>">
					
					<div class="card-body">
						<h5 class="card-title"><?php echo $book['bname']; ?></h5>
						<p class="card-text"><?php echo $book['bauthor']; ?></p>
						<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
						<div class="card-footer">
						<form action="" method="POST">
							<input type="hidden" name="bookID" value="<?php echo $book['bookID']; ?>"/>
							<input type="submit" class="btn btn-primary" value="Add to cart" name="add_to_cart">
						</form>
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
					<img src="<?php echo $book['bimage']; ?>">
						
						<div class="card-body">
							<h5 class="card-title"><?php echo $book['bname']; ?></h5>
							<p class="card-text"><?php echo $book['bauthor']; ?></p>
							<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
							<div class="card-footer">
							<form action="" method="POST">
							<input type="hidden" name="bookID" value="<?php echo $book['bookID']; ?>"/>
							<input type="submit" class="btn btn-primary" value="Add to cart" name="add_to_cart">
						</form>
					</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<div class="more-btn-class">
	  	<a class="more-btn" href="#" > More </a>
	  	</div>
		<br><br><br>

		<h2 class="category_name">Fiction</h2>
        <hr class="hr-category">
        <div class="row">
		<?php foreach ($booksFiction as $book): ?>
			<div class="col-md-2">
			  	<div class="card  col-md-13"> 
				<img src="<?php echo $book['bimage']; ?>">
					
					<div class="card-body">
						<h5 class="card-title"><?php echo $book['bname']; ?></h5>
						<p class="card-text"><?php echo $book['bauthor']; ?></p>
						<p class="card-price">LKR : <?php echo $book['bprice']; ?>.00/=</p>
						<div class="card-footer">
						<form action="" method="POST">
							<input type="hidden" name="bookID" value="<?php echo $book['bookID']; ?>"/>
							<input type="submit" class="btn btn-primary" value="Add to cart" name="add_to_cart">
						</form>
					</div>
					</div>
           	 	</div>
			</div>
		<?php endforeach; ?>
		</div>
		<div class="more-btn-class">
	  		<a class="more-btn" href="#" > More </a>
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
						<div class="centeralign" >
							<img src="images/suzie.jpg" width="60" height="60" alt="" style="border-radius:50%;"/> 
							<p class="lead_author">suzie.r</p>
						</div>
		        	</div>
				</div>
	      		<div class="col-md-4"> 
			  		<div class="jumbotron">
		        		<p class="lead centeralign">"There are series I would have never discovered if it weren’t for BookMart, and I always feel like I got a deal, always."</p><br>
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
	  <?php include 'footer.php'; ?>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
 	<script src="js/jquery-3.4.1.min.js"></script>
	
	<!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/popper.min.js"></script> 
  <script src="js/bootstrap-4.4.1.js"></script>
  </body>
</html>