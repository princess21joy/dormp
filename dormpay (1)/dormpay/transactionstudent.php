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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction</title>
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
        .table-proof {
            width: 300px; /* Adjust the width to your preference */
        }
    </style>

</head>
<body>
    <h1 style = "background:lightgreen;font-size:small;text-align:left;">You are interacting as student</h1>
    <h1>Welcome to DormPay</h1>
    <div class="connn1">
        <img src="logo.png" alt="Placeholder Image">
        <a href="dormpaystudentdashboard.php"><button>Back</button></a>
    </div>

    <div class="connn2">
        <h1>Transactions</h1>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Room</th>
                    <th scope="col">Firstname</th>
                    <th scope="col">Lastname</th>
                    <th scope="col">Middlename</th>
                    <th scope="col">Date</th>
                    <th scope="col" class="table-proof">GcashTransactID</th>
                    <th scope="col">Amount</th>


                </tr>
            </thead>
            <tbody>
            <?php
                $sql = "select * from transaction where username = '$username' ORDER BY date DESC";											
				$result = mysqli_query($connect,$sql);
				$num_rows = mysqli_num_rows($result);
				if(mysqli_num_rows($result) > 0){
					while($row = mysqli_fetch_array($result)){
                        $room = $row['room'];
						$firstname = $row['firstname'];
						$lastname = $row['lastname'];
                        $middlename = $row['middlename'];
						$date = $row['date'];
						$gcash = $row['gcashtransactid'];
                        $address = $row['amount'];
						?>

							<tr>
								<td><?= $room  ?></td>
								<td><?= $firstname ?></td>
								<td><?= $lastname ?></td>
								<td><?= $middlename?></td>
                                <td><?= $date ?></td>
                                <td><?= $gcash ?></td>
                                <td><?= $address ?></td>
							</tr> 

					<?php
					}				
				}else{
                    echo"<td colspan ='7'>Your Transaction is Empty</td>";
                }
                ?>              
            </tbody>
        </table>
        
    </div>
</body>
</html>