<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookmart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "database connected succesfull";
}

// Function to sanitize user input
function sanitizeInput($data) {
    global $conn;  // Access the global connection variable
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

// Inserting book into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = sanitizeInput($_POST["bname"]);
    $author = sanitizeInput($_POST["bauthor"]);
    $price = sanitizeInput($_POST["bprice"]);

    $sql = "INSERT INTO book (bname, bauthor, bprice) VALUES ('$title', '$author', '$price')";

    if ($conn->query($sql) === TRUE) {
        echo "Book inserted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Insert Book</title>
</head>
<body>

<h2>Insert Book</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="title">Book Name:</label>
    <input type="text" name="bname" required><br><br>

    <label for="author">Author:</label>
    <input type="text" name="bauthor" required><br><br>

    <label for="published_year">Price</label>
    <input type="number" name="bprice" required><br><br>

    <input type="submit" value="Insert Book">
</form>

</body>
</html>
