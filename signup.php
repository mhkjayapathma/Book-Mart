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
  <form class="signform" method="post" action="">
    <h3>Sign Up Here</h3>
    <input type="text" name="name" placeholder="Enter Name" required>
    <input type="email" name="email" placeholder="Enter e-mail" required>
    <input type="text"  name="phoneNo" maxlength="10" placeholder="Phone Number"  required>
    <input type="text"  name="address" placeholder="Enter Address"  required>
    <input type="Password" name="password" placeholder="Enter Password"  required >

    <div class="radio-box">
      <input class="radio" type="radio" name="Gender" value="Male" required> Male &nbsp;&nbsp;&nbsp;
      <input class="radio" type="radio" name="Gender" value="Female" required> Female
    </div>
    <input type="Submit" name="Submit" class="submit">
  </form>
</body>
</html>