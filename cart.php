<?php
	session_start();
	@include 'configDatabase.php';
	//assign userID to variable
	$userID = $_SESSION['user_id'];
	
	// Fetching All books from the database
    $queryAllBook = "SELECT *
	FROM book
	JOIN cart ON book.bookID = cart.bookID
	WHERE cart.userID = $userID  
	ORDER BY cart.cartID DESC;";

    $resultAllBook = $conn->query($queryAllBook);

    $books = [];
    if ($resultAllBook->num_rows > 0) {
        while ($rowBooks = $resultAllBook->fetch_assoc()) {
            $books[] = $rowBooks;
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
		<link href="css/headerFooter.css" rel="stylesheet" type="text/css">
		<link href="css/cart.css" rel="stylesheet" type="text/css">
		<meta charset="utf-8">
		<title>Cart</title>
	</head>
	<body>
		<!-- header -->
		<?php include 'header.php'; ?>
		<br><br><br><br><br><br>
		
		<!--cart item details-->
		<div class="small-container cart-page">
			<table class="table">
				<thead class="thead-dark">
					<tr>
						<th scope="col">Book</th>
						<th scope="col">Quantity</th>
						<th scope="col">Sub Total</th>
						<th scope="col">Action </th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($books as $book): ?>
					<tr>
						<td>
							<div class="card-info">
								<img src=<?php echo $book['bimage']; ?>>
								<div>
									<p><?php echo $book['bname']; ?></p>
									<small><?php echo $book['bauthor']; ?></small><br>
									<small>Rs.<?php echo $book['bprice']; ?>.00/=</small>
								</div>
							</div>
						</td>
						<td>
							<input type="number" id="quantity" name="quantity" min="1" value="1" style="width:60px;" onchange="calcTotal(this.value , <?php echo $book['bookID']; ?> , <?php echo $book['bprice']; ?>)" required />
						</td>
						<td><input type="text" id="<?php echo 'Total'.$book['bookID']; ?>" value="<?php echo 'Rs'.$book['bprice'].'.00/='; ?>" style="width:100px;border:none;" disabled/></td>
						<td>
							<button style="width:90px;height:40px"class="btn btn-success"><i class="fas fa-trash">Buy Now</button><br><br>
							<button style="width:90px;height:40px"class="btn btn-danger"><i class="fas fa-trash">Remove</button>
						</td>
					</tr>
					<?php endforeach; ?>
				</tbody>
				
			</table>
		
		</div>
		
		<br><br>
		<!---Footer--->
		<?php include 'footer.php'; ?>
	</body>
	<script>

    function calcTotal(quantity , bookid ,price) {
        // calculation logic using the 'quantity' parameter
        var total = quantity * price;

        // Display calculated total
        
		document.getElementById('Total'+bookid).value = total;
    }
	</script>

</html>