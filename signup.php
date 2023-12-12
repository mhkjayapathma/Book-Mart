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
      // Input validation
      $name = sanitizeInput($_POST["name"]);
      $email = filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) ? $_POST["email"] : null;
      $contactNo = sanitizeInput($_POST["contactNo"]);
      $address = sanitizeInput($_POST["uAddress"]);
      $pw = $_POST["password"]; // Password is not sanitized, as we'll hash it
      $rePw = $_POST["re-password"];
      $gender = sanitizeInput($_POST["gender"]);
      $utype = "User";

      $pattern = '/^(?=.*[!@#$%^&*(),.?":{}|<>]).{8,}$/';

      // Validate required fields
      if (empty($name) || empty($email) || empty($contactNo) || empty($address) || empty($pw) || empty($gender)) {
          echo '<script>';
          echo 'alert("All fields are required!");';
          echo '</script>';
      }else if($pw != $rePw){
          echo '<script>';
          echo 'alert("Password not matched!");';
          echo '</script>';
      }else if (!preg_match($pattern, $pw)) {
        echo '<script>';
        echo 'alert("Password must contain at least one special character, one digit, one lowercase letter, one uppercase letter, and have a minimum length of 8 characters.");';
        echo '</script>';
        // Additional error handling or redirection logic can be added here
    } else {

        
        $query = "SELECT * FROM user WHERE email = ? LIMIT 1";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result->num_rows > 0) {
          echo '<script>';
          echo 'alert("The email you entered already exists!");';
          echo '</script>';
        }
        else{
           // Hash the password
           $hashedPassword = password_hash($pw, PASSWORD_DEFAULT);

           $sql = "INSERT INTO user (uname, email, contactNo, uAddress, password, gender, userType) VALUES ('$name', '$email', '$contactNo', '$address', '$hashedPassword', '$gender', '$utype')";
           
           if ($conn->query($sql) === TRUE) {
               header("Location: /Book-Mart/login.php");
               exit();
           } else {
               echo '<script>';
               echo 'alert("Registration Fail! Please try again!");';
               echo '</script>';
           }

        } 
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
    <input type="Password" name="re-password" placeholder="Re-Enter Password"  required >

    <div class="radio-box">
      <input class="radio" type="radio" name="gender" value="Male" required> Male &nbsp;&nbsp;&nbsp;
      <input class="radio" type="radio" name="gender" value="Female" required> Female
    </div>
    <div class="text-center">
      <input type="submit" name="action" value="submit" class="submit bg-primary">
      <a  href="login.php">Already have an account?  login</a>
    </div>
    
  </form>
</body>
</html>