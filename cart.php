<?php
    session_start();
        $server="localhost";
        $user="root";
        $pw="";
        $db="bookmart";

        $con=new mysqli($server,$user,$pw,$db);
        if(isset($_POST["add"])){
            if(isset($_SESSION["cart"])){
                $item_array_id = array_column($_SESSION["cart"], "bookID");
                if(!in_array($_GET["id"], $item_array_id)){
                    $count = count($_SESSION["cart"]);
                    $item_array = array(
                      'bookID' => $_GET["id"],
                        'bname' => $_POST["hidden_name"],
                        'bprice' => $_POST["hidden_price"],
                        'item_quanity' => $_POST["quantity"],
                    );
                }
            }
        }


        /*if($conn->connect_error){
            die("Connection failed :". $conn->connect_error);
        }
        else
        {
            echo "Database connected successfully <br>";
        }*/

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="css/cart.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <style>
        .book{
            border: 1px solid #eaeaec;
            margin:-1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef ;
        }
        table , th , tr{
            text-align:center;
        }
        .title2{
            text-align: center;
            color:#efefef;
            background-color : #efefef;
            padding: 2%;
        }
        h2{
            text-align
        }
        table th{
            background-color:#efefef;
        }
    </style>

</head>
<body>
    <!---
    <div class="small-container cart-page">
	<table>
		<tr>
			<th>Book</th>
			<th>Quantity</th>
			<th>Sub Total</th>
		</tr>
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
			<td><input type="number" value="1"></td>
			<td>$50</td>
		</tr>
		<tr>
			<td>
				<div class="card-info">
				<img src="images/New Arival/book1.jpg">
					<div>
						<p>Forget me not</p>
						<small>Price : $50</small>
						<a href="">Remove</a>
					</div>
				</div>
			</td>
			<td><input type="number" value="1"></td>
			<td>$50</td>
		</tr>
	</table>
	</div>

    --->


    <br><br>
<div class="container" style="width:65%;">
    <?php
        $query = "SELECT * FROM book ORDER BY bookID ASC";
        $result = mysqli_connect($con,$query);
        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
              ?>

              <div class="col-md-2">
                <form method="POST" action="cart.php">
                    <div class="book">
                    <img src="images/
                    
                    <?php echo $row['bimage']; ?>" class="img-responsive">
                    <h5 class="name"> <?php $row['bname'];?> </h5>
                    <h5 class="author"> <?php $row['bauthor'];?> </h5>
                    <h5 class="price"> <?php $row['bprice'];?> </h5>
                    <input type="text" name="quantity" class="form-control" value="1">
                    <input type="hidden" name="hidden-name" value="<?php echo $row['bname']; ?>">
                    <input type="hidden" name="hidden-price" value="<?php echo $row['bprice']; ?>">
                    <input type="hidden" name="hidden-author" value="<?php echo $row['bauthor']; ?>">
                    <input type="submit" name="add" class="btn btn-success" value="Add to cart" style="margin-top:5px;">
                    </div>
                </form>
            </div>  
            <?php
            }
        }
    ?>
   
   <div class="" style="clear:both;">
        <h3 class="title2">Shopping cart Details<h3>
        <div class= "table table-bordered">
            <tr>
                <th width=30%>Book Name</th>
                <th width=10%>Quantity</th>
                <th width=13%>Book Price</th>
                <th width=10%>Total price</th>
                <th width=17%>Remove Item</th>
            </tr>

            <?php
                if(!empty($_SESSION["cart"])){
                    $total=0;
                    foreach($_SESSION["cart"] as $key => $value){
                        ?>
                        <tr>
                            <td> <?php echo $value["book_name"]; ?> </td>
                            <td> <?php echo $value["book_quantity"]; ?> </td>
                            <td> $<?php echo $value["book_price"]; ?> </td>
                            <td> $<?php echo number_format($value["book_quantity"] * $value["book_price"] , 2); ?> </td>
                            <td> <a href="cart.php?action=delete&id=<?php echo $value["book_id"]; ?>"> <span class="text-danger">Remove Item</span> </td>
                        </tr>
                        <?php
                            $total = $total + ($value["book_quantity"] * $value["book_price"]);
                    }
                        ?>

                    <tr>
                        <td colspan="3" text-align="right"> Total </td>
                        <td text-align="right"> $ <?php echo number_format($total , 2); ?></td>
                    </tr>

                    <?php
                }
                ?>
        </div>
    </div>
            </div>
</body>
</html>