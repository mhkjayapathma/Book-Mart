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

// Fetching Short story from the database
$queryShort = "SELECT * FROM book WHERE btype='ShortStory' ORDER BY bookID DESC LIMIT 18;";
$resultShort = $conn->query($queryShort);

$booksShort = [];
if ($resultShort->num_rows > 0) {
    while ($rowShort = $resultShort->fetch_assoc()) {
        $booksShort[] = $rowShort;
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
    <!-- Bootstrap -->
	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/indexStyle.css" rel="stylesheet" type="text/css">
	<style>
		
	</style>
</head>
<body style="padding-top: 74px">
<div class="container-fluid">
  	  	<div class="container">
			<br>
				<div class="row container">
					<div class="col-6">
						<br><br>
						<h1 class="category_top">Short Story</h1>
						<br><br>
						<p style="text-align:justify;"> &nbsp;&nbsp;A short story is a work of prose fiction that can be read
						in one sitting—usually between 20 minutes to an hour. 
						There is no maximum length, but the average short story
						is 1,000 to 7,500 words, with some outliers reaching 
						10,000 or 15,000 words.....
						</p>
						<br><br>
					</div>
					<div class="col-6">
						<img style="height:400px;box-shadow: 0 0 25px rgba(0,0,0,0.9);"src="images/ShortStory/26.jpg">
					</div>
				</div>
				<br><br>
			<div class="row">
				<?php foreach ($booksShort as $book): ?>
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
							<div class="">
								<?php if (!$isInCart): ?>
									<form action="" method="POST">
										<input type="hidden" name="bookID" value="<?php echo $book['bookID']; ?>"/>
										<input type="submit" class="btn btn-primary" value="Add to cart" name="add_to_cart">
									</form>
									<?php else: ?>
									<input type="submit" class="btn btn-danger" value="Added" name="add_to_cart" disabled>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach; ?>
			</div>
		</div>
	</div>
	<br><br><br><br>
	<!---Footer--->
	<?php include 'footer.php'; ?>
  </body>
</html>