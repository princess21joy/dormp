<?php
$connect = mysqli_connect("localhost", "root", "", "dormpay");

if ($connect === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
session_start();
$username = $_SESSION['username'];
if(!$username){
    header("Location:dormypayLogin.php");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $room = mysqli_real_escape_string($connect, $_POST['room']);
    $lastName = mysqli_real_escape_string($connect, $_POST['lastname']);
    $firstName = mysqli_real_escape_string($connect, $_POST['firstname']);
    $middleName = mysqli_real_escape_string($connect, $_POST['middlename']);
    $amount = mysqli_real_escape_string($connect, $_POST['amount']);
    $gcashTransactId = mysqli_real_escape_string($connect, $_POST['gcashtransactid']);

    $table = 'room' . substr($room, -1); // Create table name based on selected room

    $sql_insert = "INSERT INTO transaction (username,room,lastname, firstname, middlename, date, gcashtransactid, amount)
                    VALUES ('$username','$table','$lastName', '$firstName', '$middleName', NOW(), '$gcashTransactId', '$amount')";

    if (mysqli_query($connect, $sql_insert)) {
        echo '<script>alert("Payment Successful");';
        echo 'window.location.href = "transactionstudent.php";</script>';
        exit();
    } else {
        echo "Error: " . $sql_insert . "<br>" . mysqli_error($connect);
    }
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
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
            width: 80%;
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
        input[type="number"],
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
            width: 400px;
            height: 400px;
            border:solid black 1px;
        }
        footer{
            margin-top: 50px;
            background: rgb(0, 0, 0);
            padding: 5px;
            color: orange;
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
    </style>
</head>
<body>
    <h1>Payment Transaction</h1>
    <p style = "border-bottom: 2px solid black;">FILL OUT THE FORM CAREFULLY FOR REGISTRATION ON PAYMENT</p>
    <div class="con">
        <div>
                 
            <img src="gcash.jpg" alt="Placeholder Image">
        </div>
        <div>
            <form method = "POST">
                <label for="room">Room:</label>
                <select id="room" name="room">
                    <option value="room1">Room1</option>
                    <option value="room2">Room2</option>
                    <option value="room2">Room3</option>
                    <option value="room2">Room4</option>
                    <option value="room2">Room5</option>
                </select>
                <br>
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastname" placeholder="Last Name" required>
                <br>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstname" placeholder="First Name" required>
                <br>
                <label for="middleName">Middle Name:</label>
                <input type="text" id="middleName" name="middlename" placeholder="Middle Name">
                <br>
                <label for="amount">Amount:</label>
                <input type="number" id="amount" name="amount" placeholder="amount">
                <br>
                <label for="gcashtransactid">Gcash TransactId:</label>
                <input type="text" id="gcashtransactid" name="gcashtransactid" placeholder="Gcash TransactId">
                <br>
                
                <input type="submit" value="PAY">
                
            </form>
            <a href="dormpaystudentdashboard.php" ><button style="background: red;">Cancel</button></a> 
        </div>
    </div>
    <footer>
        <h3>Created &#169; 2023</h3>
    </footer>
</body>
</html>
