<?php
$connect = mysqli_connect("localhost", "root", "", "dormpay");

if ($connect === false) {
    die("Error: Could not connect. " . mysqli_connect_error());
}
	$id = mysqli_real_escape_string($connect, $_GET['id']);
	$sql = "DELETE FROM room3 WHERE id='$id' ";
	if(mysqli_query($connect, $sql) == false){																														
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
		} 
		else{
			header("Location:dormpayadmindashboard.php");		
		}
	
?>