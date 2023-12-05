<!doctype html>
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
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>
						<div class="card-info">
							<img src="images/New Arival/book1.jpg">
							<div>
								<p>Forget me not</p>
								<small>Price : $50</small>
								<br>
								<a href="">Remove</a>
							</div>
						</div>
					</td>
					<td>
						<input type="number" id="quantity" name="quantity" min="1" required>
					</td>
					<td>$50</td>
				</tr>
			</tbody>
			
		</table>
	
	</div>
	
	<br><br>
   	<!---Footer--->
	   <?php include 'footer.html'; ?>
</body>
</html>
