<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bookmart";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "database connected successfully";
}


// Fetching New Arival from the database
$queryAllBook = "SELECT * FROM book ORDER BY bookID ASC";
$resultAllBook = $conn->query($queryAllBook);

$books = [];
if ($resultAllBook->num_rows > 0) {
    while ($rowNewArrival = $resultAllBook->fetch_assoc()) {
        $books[] = $rowNewArrival;
    }
}

// Function to sanitize user input
function sanitizeInput($data)
{
    global $conn;  // Access the global connection variable
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $conn->real_escape_string($data);
}

// Inserting a book into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = sanitizeInput($_POST["bname"]);
    $author = sanitizeInput($_POST["bauthor"]);
    $price = sanitizeInput($_POST["bprice"]);
    $type = sanitizeInput($_POST["btype"]);

    $sql = "INSERT INTO book (bname, bauthor, bprice, btype) VALUES ('$name', '$author', '$price', '$type')";

    if ($conn->query($sql) === TRUE) {
        echo "Book inserted successfully!";
        $queryAllBook = "SELECT * FROM book ORDER BY bookID ASC";
        $resultAllBook = $conn->query($queryAllBook);

        $books = [];
        if ($resultAllBook->num_rows > 0) {
            while ($rowNewArrival = $resultAllBook->fetch_assoc()) {
                $books[] = $rowNewArrival;
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="css/AdminPanel.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - Insert Book</title>
</head>

<body>
    <?php include 'header.html'; ?>
    <h2>Insert Book</h2>
    <br><br><br>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card bg-Dark text-light">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" enctype="multipart/form-data">
                    <div class="card-header text-center">
                        <h1>Add Books</h1>
                    </div>
                    <div class="body container">
                        <div class="row">
                            <div class="col-md-3"> </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title">Book Name:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="bname" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="author">Author:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="bauthor" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="published_year">Price:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="bprice" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="dropdown">Book Types:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dropdown">
                                            <select id="dropdown" name="btype">
                                                <option value="N">Novels</option>
                                                <option value="S">Short story</option>
                                                <option value="T">Thriller</option>
                                                <option value="F">Fantasy</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="bookImage">Book Image:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" id="bookImage" name="bookImage" accept="image/*" >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-10"> </div>
                            <div class="col-md-2">
                                <input type="submit" value="Add" class="btn btn-success">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br><br>
    <div class="row">
        <div class="container">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Book Name</th>
                        <th scope="col">Type</th>
                        <th scope="col">Author</th>
                        <th scope="col">Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming $books is an array of books fetched from the database
                    foreach ($books as $book) {
                        echo "<tr>";
                        echo "<th scope='row'>" . $book['bookID'] . "</th>";
                        echo "<td>" . $book['bname'] . "</td>";
                        
                        // Check if btype is 'N' and display 'Novel' accordingly
                        echo "<td>";
                        if ($book['btype'] == 'N') {
                            echo "Novel";
                        } else if ($book['btype'] == 'S') {
                            echo "Short Story";
                        } else if ($book['btype'] == 'T') {
                            echo "Thriller";
                        } else if ($book['btype'] == 'F') {
                            echo "Fantacy";
                        }
                        echo "</td>";

                        echo "<td>" . $book['bauthor'] . "</td>";
                        echo "<td>" . $book['bprice'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>