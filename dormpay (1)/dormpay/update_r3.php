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

?>
<!DOCTYPE html>
<html>
<head>
    <title>Update</title>
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
    <h1 style = "border-bottom: 2px solid black;">Update Student</h1>
    <div class="con">
        <div>
            <img src="logo.png" alt="Placeholder Image">
        </div>
        <div>
            <form method = "POST">
                    <?php
						$id = mysqli_real_escape_string($connect, $_GET['id']);
						$sql = "select * from room3 where id = '$id'";											
						$result = mysqli_query($connect,$sql);
						$num_rows = mysqli_num_rows($result);
						if(mysqli_num_rows($result) > 0){
							while($row = mysqli_fetch_array($result)){
								$firstname = $row['firstname'];
								$lastname = $row['lastname'];
								$status = $row['status'];
                                $sex = $row['sex'];
                                $address = $row['address'];
						
						
					?>
                <label for="firstName">First Name:</label>
                <input type="text" id="firstName" name="firstname" value = "<?=  $firstname ?>" placeholder="First Name" required>
                <br>
                <label for="lastName">Last Name:</label>
                <input type="text" id="lastName" name="lastname" value = "<?=  $lastname ?>" placeholder="Last Name" required>
                <br>
                <label for="status">Status:</label>
                <input type="text" id="status" name="status" value = "<?=  $status ?>" placeholder="Status" required>
                <br>
                <label for="sex">Sex:</label>
                <select id="sex" name="sex">
                    <option value="female" <?php if ($sex === 'female') echo 'selected'; ?>>Female</option>
                    <option value="male" <?php if ($sex === 'male') echo 'selected'; ?>>Male</option>
                </select>
                <br>
                <label for="address">Address:</label>
                <input type="text" id="address" name="address" value = "<?=  $address ?>" placeholder="Address" required>
                <input type="submit" value="Update">
                
                
                <?php
							}
					}
					if(isset($_POST['firstname'])){
				            $firstnamae = mysqli_real_escape_string($connect, $_REQUEST['firstname']);
				            $lastname = mysqli_real_escape_string($connect, $_REQUEST['lastname']);
				            $status = mysqli_real_escape_string($connect, $_REQUEST['status']);
                            $sex = mysqli_real_escape_string($connect, $_REQUEST['sex']);
                            $address = mysqli_real_escape_string($connect, $_REQUEST['address']);
				            $sql = "update room1 set firstname = '$firstname' , lastname = '$lastname',
                                     status = '$status', sex = '$sex', address = '$address' where id = '$id'";		
					        if(mysqli_query($connect, $sql) == false){																														
					        	echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
                            
					        } 
					        else{
					        	header("Location:dormpayadmindashboard.php");	
					        }	
			        }
					?>
            </form>
        </div>
    </div>
    <footer>
        <h3>Created &#169; 2023</h3>
    </footer>
</body>
</html>
