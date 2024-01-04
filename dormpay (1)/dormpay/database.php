<?php
	$connect = mysqli_connect("localhost","root","");
	if($connect == false){
		die();
	}
	$sql = "Create database if not exists dormpay ";
		if(mysqli_query($connect, $sql) == false){
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
        <form method ="post" action = "createtable.php">
            <input type  ="submit" value ="start database">
        </form>
</body>
</html>