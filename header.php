<?php

    // Retrieve query parameters from the URL
    $userType = isset($_GET['userType']) ? $_GET['userType'] : '';
    $userID = isset($_GET['userID']) ? $_GET['userID'] : '';

    if ($userType == null) {
        header("Location: /Book-Mart/login.php");
    }
    ?>

    <!-- Set query parameters in browser storage using JavaScript -->
    <script>
        // Function to set a key-value pair in local storage
        function setInLocalStorage(key, value) {
            localStorage.setItem(key, value);
        }

    </script>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/headerFooter.css" rel="stylesheet" type="text/css">
    <link href="css/bootstrap-4.4.1.css" rel="stylesheet">
    <title>Header</title>
</head>
<body>
    <div class="container-fluid">
        <div class="container">
            <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light"> 
            <a class="navbar-brand" href="index.php?userType=<?php echo $userType; ?>&userID=<?php echo $userID; ?>"> <img src="images/BookMart_logo.png" alt="" width="120" height="48"  class="logo" ></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active"> <a class="nav-link" href="index.php?userType=<?php echo $userType; ?>&userID=<?php echo $userID; ?>">Home <span class="sr-only">(current)</span></a> </li>
                
                <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Categories </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown1">
                        <a class="dropdown-item" href="novels.html">Novels</a> 
                        <a class="dropdown-item" href="shortstory.html">ShortStory</a>
                        <a class="dropdown-item" href="fantacy.html">Fantasy</a>
                        <a class="dropdown-item" href="thriller.html">Thriller</a> 
                        <a class="dropdown-item" href="fiction.html">Fiction</a>
                    </div>
                </li>
                <li class="nav-item"> <a class="nav-link" href="aboutus.php?userType=<?php echo $userType; ?>&userID=<?php echo $userID; ?>">About&nbsp;</a> </li>
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
                <li class="nav-item"> <a class="nav-link" href="cart.php?userType=<?php echo $userType; ?>&userID=<?php echo $userID; ?>">&nbsp;Cart</a></li>
                <?php if ($userType === 'Admin') : ?>
                    <li class="nav-item" id="adminPanelLink"> <a class="nav-link" href="AdminPanel.php?userType=<?php echo $userType; ?>&userID=<?php echo $userID; ?>">&nbsp;Admin Panel</a></li>
                <?php endif; ?>
                </ul>
                <form class="search-form">
                <input class="search-input" type="search" placeholder="Search" aria-label="Search">
                <button class="search-btn" type="submit">Search</button>
                
                </form>
                <button type="button" class="btn btn-danger" style="padding: 5px 10px; width: fit-content;" id="logoutBtn">Logout</button>
            </div>
            </nav>
        </div>
    </div>
</body>
</html>

<script>
   
    // Function to handle logout
    function logout() {
        // Perform any logout-related tasks (e.g., clearing local storage, redirecting, etc.)
        // For example, clear user type from local storage
        localStorage.removeItem('userType');

        // Redirect to the login page (replace 'login.php' with your actual login page)
        window.location.href = 'login.php';
    }

    // Attach the logout function to the click event of the logout button
    document.getElementById('logoutBtn').addEventListener('click', logout);
</script>