<?php

@include 'configDatabase.php';
@include 'config.php';
// Function to sanitize user input
function sanitizeInput($data)
{
    global $conn;  // Access the global connection variable
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
		$inputEmail = $_POST['email'];  // Replace with the actual input from your form
		$inputPassword = $_POST['password'];  // Replace with the actual input from your form

		$query = "SELECT * FROM user WHERE email = ? LIMIT 1";
		$stmt = $conn->prepare($query);
		$stmt->bind_param("s", $inputEmail);
		$stmt->execute();
		$result = $stmt->get_result();
		
		$User = [];
		
		if ($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			// Verify the password
			if ($inputPassword == $row['password']) {
				// Passwords match, login successful
				$User = $row;
				$userType = $User['userType'];
				$userID = $User['userID'];
				$test = "test";
				header("Location: /Book-Mart/index.php?userType=" . urlencode($userType) . "&userID=" . urlencode($userID));
			} else {
				// Passwords do not match, login failed
				echo "<script>";
				echo "alert('invalid password');";
				echo "</script>";
			}
		} else {
			// No matching user found, login failed
			echo "Invalid E-mail.";
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
		<input type="submit" name="action" class="submit">
    </form>
</body>
</html>