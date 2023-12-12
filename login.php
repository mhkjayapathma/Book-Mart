<?php
@include 'configDatabase.php';
session_start();
// Function to sanitize user input
function sanitizeInput($data)
{
    global $conn;  // Access the global connection variable
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

function checkCartCount() {
	
    
    // Display the count using JavaScript alert
  
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$inputEmail = $_POST['email'];  // Replace with the actual input from your form
	$inputPassword = $_POST['password'];  // Replace with the actual input from your form
	
	$query = "SELECT * FROM user WHERE email = ? LIMIT 1";
	$stmt = $conn->prepare($query);
	$stmt->bind_param("s", $inputEmail);
	$stmt->execute();
	$result = $stmt->get_result();
	
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
		// Verify the password
		if (password_verify($inputPassword, $row['password'])) {
			// Passwords match
			$_SESSION['user_id'] = $row['userID']; 
			$_SESSION['user_type'] = $row['userType']; 
			$_SESSION['user_name'] = $row['uname'];
	
			if (isset($_SESSION['user_id'])) {
				// Assuming you have already started the session
				$userID = $_SESSION['user_id'];
	
				header("Location: index.php");
				exit();
			}
		} else {

			echo "Input Password: $inputPassword<br>";
			echo "Stored Hashed Password: {$row['password']}<br>";

			// Passwords do not match, login failed
			// echo "<script>";
			// echo "alert('Invalid Password!');";
			// echo "</script>";
		}
	} else {
		// No matching user found, login failed
		echo "<script>";
		echo "alert('Invalid E-mail!');";
		echo "</script>";
	}
	
	
	
}


$conn->close();
?>
<html>
<head>
  	<title>Login</title>
  	<link href="css/bootstrap-4.4.1.css" rel="stylesheet">
	<link href="css/signup.css" rel="stylesheet" type="text/css">
  	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
</head>
<body>
	<div class="background">
		<div class="shape"></div>
		<div class="shape"></div>
	</div>
	<form class="signform" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
		<h3>Login Here</h3>
		<input type="email" name="email" placeholder="Enter E-mail" required>   
		<input type="Password" name="password" placeholder="Enter Password"  required >
		<div class="text-center">
			<input type="submit" name="action" class="submit bg-primary">
			<br><br>
			<a href="signup.php">sign up</a>
		</div>
    </form>
	
</body>
</html>