<?php
@include 'configDatabase.php';
session_start();
$userID= $_SESSION['user_id'];
// Check if the user is not logged in, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}else{
    // Using prepared statement to prevent SQL injection
    $queryBookCount = "SELECT count(cart.cartID) AS cartCount
    FROM book
    JOIN cart ON book.bookID = cart.bookID
    WHERE cart.userID = ?";

    $stmt = $conn->prepare($queryBookCount);
    $stmt->bind_param("i", $userID);
    $stmt->execute();
    $stmt->bind_result($cartCount);
    $stmt->fetch();
    $stmt->close();

}

// Check if the logout form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['logoutForm'])) {
    session_destroy();
    header("Location: login.php");   
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link href="css/headerFooter.css" rel="stylesheet" type="text/css"> -->
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <title>BookMart</title>
</head>
<body>
    <!-- <div class="container-fluid"> -->
        <div class="container">
            <nav class="navbar fixed-top navbar-expand-lg bg-dark text-light"> 
            <a class="navbar-brand" href="index.php"> <img src="images/BookMart_logo.png" alt="" width="120" height="48"  class="logo" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto ">
                <li class="nav-item active"> <a class="nav-link text-light" href="index.php">Home <span class="sr-only">(current)</span></a> </li>
                
                <li class="nav-item dropdown"> <a class="nav-link text-light dropdown-toggle" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Categories </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="novels.php">Novels</a> 
                        <a class="dropdown-item" href="shortstory.php">ShortStory</a>
                        <a class="dropdown-item" href="fantasy.php">Fantasy</a>
                        <a class="dropdown-item" href="#">Thriller</a> 
                        <a class="dropdown-item" href="#">Fiction</a>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link text-light" href="aboutus.php">About&nbsp;</a> </li>
                <li id="scrollButton" class="nav-item "> <a class="nav-link text-light" href="#" style="cursor: pointer">Contact Us&nbsp;</a></li>
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
                <li class="nav-item"> 
                    <a class="nav-link text-light" href="cart.php">&nbsp;Cart&nbsp;
                        <i style="display: inline-block; width: 30px; height: 30px; background-color: red; border-radius: 50%; text-align: center; line-height: 30px; color: white;">
                            <?php echo $cartCount ?>
                        </i>
                    </a>
                </li>

                <?php 
                $isAdmin = false;
                if ($_SESSION['user_type']== "Admin") {
                    $isAdmin = true;
                }
                if ($isAdmin) {
                ?>
                    <li class="nav-item" id="adminPanelLink"> 
                        <a class="nav-link text-light" href="AdminPanel.php">&nbsp;Admin Panel</a>
                    </li>
                <?php  } ?>
                </ul>
                <form method="post" class="form-inline my-2 my-lg-0" action ="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <h5 class="text-light">Welcome&nbsp;</h5><h5 class="text-info"><?php echo $_SESSION['user_name']?>&nbsp;&nbsp;&nbsp;</h5>
                    <input type="submit" class="btn btn-danger"  name="logoutForm" value="Logout"/>
                </form>
                
            </div>
            </nav>
        </div>
    <!-- </div> -->
</body>
</html>