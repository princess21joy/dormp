<?php
$connect = mysqli_connect("localhost", "root", "", "dormpay");

if ($connect === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
session_start();
if (isset($_SESSION['username'])) {
    header("Location: dormpaystudentdashboard.php");
    exit();
}
if (isset($_SESSION['admin'])) {
    header("Location:dormpayadmindashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $lastname = mysqli_real_escape_string($connect, $_POST['lastName']);
    $firstname = mysqli_real_escape_string($connect, $_POST['firstName']);
    $middlename = mysqli_real_escape_string($connect, $_POST['middleName']);
    $username = mysqli_real_escape_string($connect, $_POST['username']);
    $sex = mysqli_real_escape_string($connect, $_POST['sex']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);
    $cpassword = mysqli_real_escape_string($connect, $_POST['cpassword']);

    if ($password !== $cpassword) {
        echo "<br><center><h2 style='color:red'>Passwords Must Match</h2></center><br>";
    } else {
        // No hashing applied to the password
        $plain_password = $password;

        $sql_check = "SELECT * FROM students WHERE username = '$username'";
        $result_check = mysqli_query($connect, $sql_check);

        if (mysqli_num_rows($result_check) > 0) {
            echo "<br><center><h2 style='color:red'>Student Already Exists</h2></center><br>";
        } else {
            $sql_insert = "INSERT INTO students (lastname, firstname, middlename, username, sex, address, password)
                            VALUES ('$lastname', '$firstname', '$middlename', '$username', '$sex', '$address', '$plain_password')";

            if (mysqli_query($connect, $sql_insert)) {
                echo '<script>alert("Registration Successful");';
                echo 'window.location.href = "dormypaylogin.php";</script>';
                exit();
            } else {
                echo "Error: " . $sql_insert . "<br>" . mysqli_error($connect);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Registration Form</title>
    <style>
        body {
            background: linear-gradient(to bottom, rgb(117, 230, 230), white);
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .con {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 60%;
            margin: auto;
           background:linear-gradient(to right, rgb(87, 199, 251), rgb(190, 154, 242), rgb(227, 113, 235),rgb(238, 0, 91));
            border-radius: 20px;
            border:solid black 3px;
            box-shadow: 10px 10px;
            height: 520px;
        }
        .con > div {
            margin: 10px;
        }
        form {
            background:linear-gradient(to right, rgb(87, 251, 218), rgb(119, 218, 248), rgb(54, 137, 240),rgb(0, 107, 238));
            width: 100%;
            padding: 20px;
            border-radius: 5px;
            box-sizing: border-box;
            border:solid black 3px;
        }
        input[type="text"],
        input[type="password"],
        select {
            padding: 8px;
            margin-bottom: 10px;
            width: 200px;
            border-radius: 5px;
            border:solid black 1px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 70%;
            background:linear-gradient(to right, rgb(87, 199, 251), rgb(190, 154, 242), rgb(227, 113, 235),rgb(238, 0, 91));
            padding: 10px; 
            margin: 10px 15px; 
            border: none; 
            cursor: pointer; 
            border-radius: 20px;
            border: 1px solid black;
        }
        label {
            display: inline-block;
            width: 150px;
            text-align: right;
            margin-right: 10px;
        }
        img{
            width: 200px;
            height: 200px;
        }
        footer{
            margin-top: 50px;
            background: rgb(0, 0, 0);
            padding: 5px;
            color: orange;
        }
    </style>
</head>
<body>
    <h1>Student Registration Form</h1>
    <p style = "border-bottom: 2px solid black;">FILL OUT THE FORM CAREFULLY FOR REGISTRATION ON PAYMENT</p>
    <div class="con">
        <div>
            <img src="logo.png" alt="Placeholder Image">
        </div>
        <div>
            <form method ="POST">
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastName" placeholder="Last Name" required>
                <br>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstName" placeholder="First Name" required>
                <br>
                <label for="middleName">Middle Name:</label>
                <input type="text" id="middleName" name="middleName" placeholder="Middle Name">
                <br>
                <label for="username">UserName:</label>
                <input type="text" id="username" name="username" placeholder="UserName">
                <br>
                <label for="gender">Gender:</label>
                <select id="gender" name="sex">
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
                <br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Address" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <br>
                <label for="cpassword">Confirm Password:</label>
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" required>
                <br>
                <input type="submit" value="Sign in">
                
            </form>
            <p style = "text-align: left;">Already have an account? <a href="dormypayLogin.php" style ="text-decoration: none;">click here</a></p>
        </div>
    </div>
    <footer>
        <h3>Created &#169; 2023</h3>
    </footer>
</body>
</html>
