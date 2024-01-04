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

if (isset($_POST['admin']) && isset($_POST['password'])) {
    $admin = mysqli_real_escape_string($connect, $_POST['admin']);
    $password = mysqli_real_escape_string($connect, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE admin = '$admin'";
    $result = mysqli_query($connect, $sql);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $db_password = $row['password'];
            if ($password === $db_password) {
                $_SESSION['admin'] = $admin;
                header("Location: dormpayadmindashboard.php");
                exit();
            } else {
                echo "<center><div class='form'><h2 style ='color:red'>Incorrect admin/password.</h2></div></center>";
            }
        } else {
            echo "<center><div class='form'><h2 style ='color:red'>Incorrect admin/password.</h2></div></center>";
        }
    } else {
        echo "Error: " . mysqli_error($connect);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login Admin</title>
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
            height: 400px;
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
        input[type = "password"] {
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
            width: 100px;
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
    <h1 style = "color:brown">Admin Login Form</h1>
    <p style = "border-bottom: 2px solid black;">FILL OUT THE FORM CAREFULLY FOR REGISTRATION ON PAYMENT</p>
    <div style ="min-height:500px">
    <div class="con">
        <div>
            <img src="logo.png" alt="Placeholder Image">
        </div>
        <div>
            <form method = "POST">
                <label for="username">Admin:</label>
                <input type="text" id="username" name="admin" placeholder="Username" required>
                <br>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Password" required>
                <br>
                <input type="submit" value="Log in">
                <p style = "text-align: center;">Login as student <a href="dormypayLogin.php" style ="text-decoration: none;">click here</a></p>
                
            </form>
            
        </div>
        
        
    </div>
    </div>
    
    <footer>
        <h3>Created &#169; 2023</h3>
    </footer>
</body>
</html>
