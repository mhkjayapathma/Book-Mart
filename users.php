<?php
@include 'header.php';
@include 'configDatabase.php';

    // Fetching All users from the database
    $queryAllUser = "SELECT * FROM user ORDER BY userID DESC";
    $resultAllUser = $conn->query($queryAllUser);

    $Users = [];
    if ($resultAllUser->num_rows > 0) {
        while ($rowUser = $resultAllUser->fetch_assoc()) {
            $Users[] = $rowUser;
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST['action']) && $_POST['action'] == 'Add') {
            // inserting an user
            $email = $_POST["email"];
            $uname = $_POST["uname"];
            $contactNo = $_POST["contactNo"];
            $address = $_POST["uAddress"];
            $gender = $_POST["gender"];
            $userType = $_POST["userType"];
            //insert to databse
            $sql = "INSERT INTO user (email, uname, contactNo, uAddress, gender, userType) VALUES ('$email', '$uname', '$contactNo', '$address', '$gender',$userType)";
            if ($conn->query($sql) === TRUE) {
                header("Location: users.php");
            } else {
                echo '<script>';
                echo 'alert("User insertion failed!");';
                echo '</script>';
            }
        }
        elseif (isset($_POST['action']) && $_POST['action'] == 'Save') {
            $userID = $_POST["userID"];
            $email = $_POST["email"];
            $uname = $_POST["uname"];
            $contactNo = $_POST["contactNo"];
            $address = $_POST["address"];
            $gender = $_POST["gender"];
            $userType = $_POST["userType"];
            
            $sql = "UPDATE user SET email='$email', uname='$uname', contactNo='$contactNo',  uAddress='$address', gender='$gender', userType='$userType' WHERE userID='$userID'";
            if ($conn->query($sql) === TRUE) {
                // Fetching All users from the database
                $queryAllUser = "SELECT * FROM user ORDER BY userID DESC";
                $resultAllUser = $conn->query($queryAllUser);

                $Users = [];
                if ($resultAllUser->num_rows > 0) {
                    while ($rowUser = $resultAllUser->fetch_assoc()) {
                        $Users[] = $rowUser;
                    }
                }
            } else {
                echo '<script>';
                echo 'alert("User updated fail!");';
                echo '</script>';
            }    
        }

    }
    

    // Check if the 'delete' parameter is in the URL
    if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_query = mysqli_query($conn, "DELETE FROM user WHERE userID = '$delete_id' ") or die('query failed');
    if($delete_query){
       header('location:users.php');
       $message[] = 'User has been deleted';
    }else{
       header('location:users.php');
       $message[] = 'User could not be deleted';
    };
 }
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
</head>
<body style="padding: 100px;">
    <br><br><br>
    <div class="row">
    <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="card bg-dark text-light">
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >
                    <div class="card-header text-center">
                        <h1>Edit User</h1>
                    </div>
                    <div class="body container">
                        <div class="row">
                            <div class="col-md-2"> </div>
                            <div class="col-md-6">
                                <input type="hidden" name="userID" id="userID" value="1234">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="title">User Name :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="uname" id="uname" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="email">Email :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="email" id="email" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="ContactNo">Contact No. :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="number" name="contactNo" id="contactNo" maxlength="10" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Address">Address :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="text" name="address" id="address" required>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="Gender">Gender :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input class="radio" type="radio" id="gender" name="gender" value="Male" required>
                                        <lable>Male</lable>
                                    
                                        <input class="radio" type="radio" id="gender" name="gender" value="Female" required>
                                        <lable>Female</lable>
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="dropdown">User Type :</label>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="dropdown">
                                            <select id="userType" name="userType" id="userType">
                                                <option value="User">User</option>
                                                <option value="Admin">Admin</option>
                                            </select>
                                        </div>
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
                        <th scope="col">User ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact No</th>
                        <th scope="col">Gender</th>
                        <th scope="col">User Type</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //display all the Users
                    foreach ($Users as $User) {
                        echo "<tr>";
                        echo "<td>" . $User['userID'] . "</td>";
                        echo "<td>" . $User['uname'] . "</td>";
                        echo "<td>" . $User['email'] . "</td>";
                        echo "<td>" . $User['contactNo'] . "</td>";
                        echo "<td>" . $User['gender'] . "</td>";
                        echo "<td>" . $User['userType'] . "</td>";
                        echo "<td>
                                <button class='btn btn-warning' onclick='editUser(" . json_encode($User) . ")'>Edit</button>
                                <a class='btn btn-danger' onclick='return confirm('Are you sure you want to delete this?');' href='users.php?delete=".$User['userID']. "'>
                                <i class='fas fa-trash'></i> Delete
                                </a>
                              </td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <script>
        function editUser(user) {
            // Populate the form fields with the existing values
            console.log(user );
            document.getElementById('userID').value = user.userID;
            document.getElementById('uname').value = user.uname;
            document.getElementById('email').value = user.email;
            document.getElementById('contactNo').value = user.contactNo;
            document.getElementById('address').value = user.uAddress;
            document.getElementById('userType').value = user.userType; 
            // Handle gender radio buttons
            var genderRadios = document.getElementsByName('gender');
            for (var i = 0; i < genderRadios.length; i++) {
                if (genderRadios[i].value === user.gender) {
                    genderRadios[i].checked = true;
                    break;
                }
            } 
            //Add and Save button changing
            var addBtn = document.getElementById('actionAdd');
            var saveBtn = document.getElementById('actionSave');

            addBtn.style.display = 'none';
            saveBtn.style.display = 'block';        
        }
    </script>
</body>
</html>