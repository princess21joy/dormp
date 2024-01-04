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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background: linear-gradient(to bottom, rgb(117, 230, 230), rgb(249, 162, 162),rgb(117, 230, 230));
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .connn1 {
            padding-top: 10px;
            float: left;
            width: 20%; 
        }
        .connn2 {
            padding-top: 10px;
            float: right;
            width: 80%; 
        }
        img{
            width: 200px;
            height: 200px;
        }
        h1{
            padding: 10px;
            background:linear-gradient(to right, rgb(87, 199, 251), rgb(190, 154, 242), rgb(227, 113, 235),rgb(238, 0, 91));
            border: solid black 2px;
            text-align: center;
        }
        table{
            border: solid black 2px;
            table-layout: fixed;
        }
        td {
            word-wrap: break-word;
            max-width: 200px; 
            font-size: small;
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
        .table-address {
            width: 300px; /* Adjust the width to your preference */
        }
    </style>

</head>
<body>
    <h1 style = "background:lightgreen;font-size:small;text-align:left;">You are interacting as admin</h1>
    <h1>Welcome to DormPay</h1>
    <div class="connn1">
        <img src="logo.png" alt="Placeholder Image">
        <a href="add.php"><button>Add Student</button></a>
        <a href = "transactionadmin.php"><button>Transaction</button></a>
        <form method ="POST" action = "logoutadmin.php">
        <button>Log-out</button>
        </form>
    </div>

    <div class="connn2">
        <h1>ROOM1</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Status</th>
                    <th scope="col">Sex</th>
                    <th scope="col" class="table-address">Address</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "select * from room1 limit 5";											
				$result = mysqli_query($connect,$sql);
				$num_rows = mysqli_num_rows($result);
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$status = $row['status'];
						$sex = $row['sex'];
                        $address = $row['address'];
						?>

							<tr>
								<td><?= $firstname   ?></td>
								<td><?= $lastname ?></td>
								<td><?= $status ?></td>
								<td><?= $sex ?></td>
                                <td><?= $address ?></td>
                                <td>
                                    <a href ="update_r1.php?id=<?= $id; ?>"><button style = "background: green;font-size: xx-small;">Update</button></a>
                                </td>
                                <td>
                                    <a href ="delete_r1.php?id=<?= $id; ?>"><button style = "background: red;font-size: xx-small;">Delete</button></a>
                                </td>
							</tr> 

					<?php
					}				
				}else{
                    echo"<td colspan ='7'>This Room is empty</td>";
                }
                ?>
                
            </tbody>
        </table>
        <h1>ROOM2</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Status</th>
                    <th scope="col">Sex</th>
                    <th scope="col" class="table-address">Address</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "select * from room2 limit 5";											
				$result = mysqli_query($connect,$sql);
				$num_rows = mysqli_num_rows($result);
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$status = $row['status'];
						$sex = $row['sex'];
                        $address = $row['address'];
						?>

							<tr>
								<td><?= $firstname   ?></td>
								<td><?= $lastname ?></td>
								<td><?= $status ?></td>
								<td><?= $sex ?></td>
                                <td><?= $address ?></td>
                                <td>
                                    <a href ="update_r2.php?id=<?= $id; ?>"><button style = "background: green;font-size: xx-small;">Update</button></a>
                                </td>
                                <td>
                                    <a href ="delete_r2.php?id=<?= $id; ?>"><button style = "background: red;font-size: xx-small;">Delete</button></a>
                                </td>
							</tr> 

					<?php
					}				
				}else{
                    echo"<td colspan ='7'>This Room is empty</td>";
                }
                ?>
                
                
            </tbody>
        </table>
        <h1>ROOM3</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Status</th>
                    <th scope="col">Sex</th>
                    <th scope="col" class="table-address">Address</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "select * from room3 limit 5";											
				$result = mysqli_query($connect,$sql);
				$num_rows = mysqli_num_rows($result);
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$status = $row['status'];
						$sex = $row['sex'];
                        $address = $row['address'];
						?>

							<tr>
								<td><?= $firstname   ?></td>
								<td><?= $lastname ?></td>
								<td><?= $status ?></td>
								<td><?= $sex ?></td>
                                <td><?= $address ?></td>
                                <td>
                                    <a href ="update_r3.php?id=<?= $id; ?>"><button style = "background: green;font-size: xx-small;">Update</button></a>
                                </td>
                                <td>
                                    <a href ="delete_r3.php?id=<?= $id; ?>"><button style = "background: red;font-size: xx-small;">Delete</button></a>
                                </td>
							</tr> 

					<?php
					}				
				}else{
                    echo"<td colspan ='7'>This Room is empty</td>";
                }
                ?>
                
                
            </tbody>
        </table>
        <h1>ROOM4</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Status</th>
                    <th scope="col">Sex</th>
                    <th scope="col" class="table-address">Address</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "select * from room4 limit 5";											
				$result = mysqli_query($connect,$sql);
				$num_rows = mysqli_num_rows($result);
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$status = $row['status'];
						$sex = $row['sex'];
                        $address = $row['address'];
						?>

							<tr>
								<td><?= $firstname   ?></td>
								<td><?= $lastname ?></td>
								<td><?= $status ?></td>
								<td><?= $sex ?></td>
                                <td><?= $address ?></td>
                                <td>
                                    <a href ="update_r4.php?id=<?= $id; ?>"><button style = "background: green;font-size: xx-small;">Update</button></a>
                                </td>
                                <td>
                                    <a href ="delete_r4.php?id=<?= $id; ?>"><button style = "background: red;font-size: xx-small;">Delete</button></a>
                                </td>
							</tr> 

					<?php
					}				
				}else{
                    echo"<td colspan ='7'>This Room is empty</td>";
                }
                ?>
                
                
            </tbody>
        </table>
        <h1>ROOM5</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Status</th>
                    <th scope="col">Sex</th>
                    <th scope="col" class="table-address">Address</th>
                    <th scope="col">Update</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "select * from room5 limit 5";											
				$result = mysqli_query($connect,$sql);
				$num_rows = mysqli_num_rows($result);
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
                        $id = $row['id'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
						$status = $row['status'];
						$sex = $row['sex'];
                        $address = $row['address'];
						?>

							<tr>
								<td><?= $firstname   ?></td>
								<td><?= $lastname ?></td>
								<td><?= $status ?></td>
								<td><?= $sex ?></td>
                                <td><?= $address ?></td>
                                <td>
                                    <a href ="update_r5.php?id=<?= $id; ?>"><button style = "background: green;font-size: xx-small;">Update</button></a>
                                </td>
                                <td>
                                    <a href ="delete_r5.php?id=<?= $id; ?>"><button style = "background: red;font-size: xx-small;">Delete</button></a>
                                </td>
							</tr> 

					<?php
					}				
				}else{
                    echo"<td colspan ='7'>This Room is empty</td>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>