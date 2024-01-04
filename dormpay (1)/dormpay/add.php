<?php
$connect = mysqli_connect("localhost", "root", "", "dormpay");

if ($connect === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
session_start();
$admin = $_SESSION['admin'];
if(!$admin){
    header("Location:dormypayloginadmin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room = mysqli_real_escape_string($connect, $_POST['room']);
    $lastname = mysqli_real_escape_string($connect, $_POST['lastname']);
    $firstname = mysqli_real_escape_string($connect, $_POST['firstname']);
    $status = mysqli_real_escape_string($connect, $_POST['status']);
    $sex = mysqli_real_escape_string($connect, $_POST['sex']);
    $address = mysqli_real_escape_string($connect, $_POST['address']);

    $table = 'room' . substr($room, -1); // Create table name based on selected room

    $sql_insert = "INSERT INTO $table (lastname,firstname,status, sex, address)
                    VALUES ('$lastname','$firstname','$status', '$sex', '$address')";

    if (mysqli_query($connect, $sql_insert)) {
        echo '<script>alert("Insert Successful");';
        echo 'window.location.href = "dormpayadmindashboard.php";</script>';
        exit();
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($connect);
    }
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Add student</title>
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
        button{
            width: 80%;
            background:linear-gradient(to right, rgb(87, 199, 251), rgb(190, 154, 242), rgb(227, 113, 235),rgb(238, 0, 91));
            padding: 10px; 
            margin: 5px 5px; 
            border: none; 
            cursor: pointer; 
            border-radius: 10px;
            border: 1px solid black;
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
    <h1 style = "border-bottom: 2px solid black;">ADD Student</h1>
    <div class="con">
        <div>
            <img src="logo.png" alt="Placeholder Image">
        </div>
        <div>
            <form method = "POST">
                <label for="room">Room:</label>
                <select id="room" name="room">
                    <option value="room1">Room1</option>
                    <option value="room2">Room2</option>
                    <option value="room3">Room3</option>
                    <option value="room4">Room4</option>
                    <option value="room5">Room5</option>
                </select>
                <br>
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastname" name="lastname" placeholder="Last Name" required>
                <br>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstname" name="firstname" placeholder="First Name" required>
                <br>
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" placeholder="Status" required>
                <br>
                <label for="sex">Sex:</label>
                <select id="sex" name="sex">
                    <option value="female">Female</option>
                    <option value="male">Male</option>
                </select>
                <br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" placeholder="Address" required>
                <input type="submit" value="ADD">
                
            </form>
            <a href="dormpayadmindashboard.php" ><button style="background: red;">Cancel</button></a> 
        </div>
    </div>
    <footer>
        <h3>Created &#169; 2023</h3>
    </footer>
</body>
</html>
