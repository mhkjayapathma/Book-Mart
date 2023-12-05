<?php
@include 'configDatabase.php';

    // Fetching New Arrival from the database
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

// Inserting or updating a book into the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['action']) && $_POST['action'] == 'Add') {
        // Inserting a new book
        $name = sanitizeInput($_POST["bname"]);
        $author = sanitizeInput($_POST["bauthor"]);
        $price = sanitizeInput($_POST["bprice"]);
        $type = sanitizeInput($_POST["btype"]);

        $sql = "INSERT INTO book (bname, bauthor, bprice, btype) VALUES ('$name', '$author', '$price', '$type')";
        
        if ($conn->query($sql) === TRUE) {
            // Fetching New Arrival from the database
            // $queryAllBook = "SELECT * FROM book ORDER BY bookID ASC";
            // $resultAllBook = $conn->query($queryAllBook);

            // $books = [];
            // if ($resultAllBook->num_rows > 0) {
            //     while ($rowNewArrival = $resultAllBook->fetch_assoc()) {
            //         $books[] = $rowNewArrival;
            //     }
            //     // Redirect to a relative URL
                

            // }
            header("Location: /Book-Mart/AdminPanel.php");
        } else {
            echo '<script>';
            echo 'alert("Book inserted fail!");';
            echo '</script>';
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'Save') {
        // Updating an existing book
        $bookID = sanitizeInput($_POST["bookID"]);
        $name = sanitizeInput($_POST["bname"]);
        $author = sanitizeInput($_POST["bauthor"]);
        $price = sanitizeInput($_POST["bprice"]);
        $type = sanitizeInput($_POST["btype"]);

        $sql = "UPDATE book SET bname='$name', bauthor='$author', bprice='$price', btype='$type' WHERE bookID=$bookID";

        if ($conn->query($sql) === TRUE) {
            // Fetching New Arrival from the database
            $queryAllBook = "SELECT * FROM book ORDER BY bookID ASC";
            $resultAllBook = $conn->query($queryAllBook);

            $books = [];
            if ($resultAllBook->num_rows > 0) {
                while ($rowNewArrival = $resultAllBook->fetch_assoc()) {
                    $books[] = $rowNewArrival;
                }
            }
        } else {
            echo '<script>';
            echo 'alert("Book updated fail!");';
            echo '</script>';
        }
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
                                <input type="hidden" name="bookID" id="bookID" value="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title">Book Name:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="bname" id="bname" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="author">Author:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="bauthor" id="bauthor" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="published_year">Price:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="bprice" id="bprice" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="dropdown">Book Types:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dropdown">
                                            <select id="btype" name="btype" id="btype">
                                                <option value="N">Novels</option>
                                                <option value="S">Short story</option>
                                                <option value="T">Thriller</option>
                                                <option value="F">Fantasy</option>
                                                <option value="F">Fiction</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="bookImage">Book Image:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="file" id="bookImage" name="bookImage" accept="image/*">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2" id='actionAdd'>
                            <input type="submit" name="action" value="Add" class="btn btn-success">
                        </div>
                        <div class="col-md-2" style="display:none" id='actionSave'>
                            <input type="submit" name="action" value="Save" class="btn btn-primary">
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Assuming $books is an array of books fetched from the database
                    foreach ($books as $book) {
                        echo "<tr>";
                        echo "<td>" . $book['bookID'] . "</td>";
                        echo "<td>" . $book['bname'] . "</td>";
                        
                        // Check if btype is 'N' and display 'Novel' accordingly
                        echo "<td>";
                        if ($book['btype'] == 'Novel') {
                            echo "Novel";
                        } else if ($book['btype'] == 'Story') {
                            echo "Short Story";
                        } else if ($book['btype'] == 'Thriller') {
                            echo "Thriller";
                        } else if ($book['btype'] == 'Fantasy') {
                            echo "Fantasy";
                        }
                        else if ($book['btype'] == 'Fiction') {
                            echo "Fiction";
                        }
                        echo "</td>";

                        echo "<td>" . $book['bauthor'] . "</td>";
                        echo "<td>" . $book['bprice'] . "</td>";
                        echo "<td><button class='btn btn-warning' onclick='editBook(" . json_encode($book) . ")'>Edit</button></td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function editBook(book) {
            // Populate the form fields with the existing values
           
            document.getElementById('bookID').value = book.bookID;
            document.getElementById('bname').value = book.bname;
            document.getElementById('bauthor').value = book.bauthor;
            document.getElementById('bprice').value = book.bprice;
            document.getElementById('btype').value = book.btype;

            var addBtn = document.getElementById('actionAdd');
            var saveBtn = document.getElementById('actionSave');

            addBtn.style.display = 'none';
            saveBtn.style.display = 'block';
        }
    </script>
</body>

</html>
