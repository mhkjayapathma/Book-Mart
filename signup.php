<?php
@include 'configDatabase.php';
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
  if (isset($_POST['action']) && $_POST['action'] == 'submit') {
      $name = sanitizeInput($_POST["name"]);
      $email = sanitizeInput($_POST["email"]);
      $contactNo = sanitizeInput($_POST["contactNo"]);
      $address = sanitizeInput($_POST["uAddress"]);
      $pw = sanitizeInput($_POST["password"]);
      $gender  = sanitizeInput($_POST["gender"]);
      $utype = "User";
      $secret="password";
      $sql = "INSERT INTO user (uname, email,contactNo,uAddress,$secret,gender,userType) VALUES ('$name', '$email', '$contactNo','$address','$pw', '$gender','$utype')";
      
      if ($conn->query($sql) === TRUE) {
        echo "Record added successfully";
        header("Location: /Book-Mart/signup.php");
      } else {
        echo "failed";
      }
  }
}
?>
<html>
<head>
  <title>Sign Up</title>
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
    <h3>Sign Up Here</h3>
    <input type="text" name="name" placeholder="Enter Name" required>
    <input type="email" name="email" placeholder="Enter e-mail" required>
    <input type="text"  name="contactNo" maxlength="10" placeholder="Phone Number"  required>
    <input type="text"  name="uAddress" placeholder="Enter Address"  required>
    <input type="Password" name="password" placeholder="Enter Password"  required >

    <div class="radio-box">
      <input class="radio" type="radio" name="gender" value="Male" required> Male &nbsp;&nbsp;&nbsp;
      <input class="radio" type="radio" name="gender" value="Female" required> Female
    </div>
    <input type="submit" name="action" value="submit" class="submit">
  </form>
</body>
</html>