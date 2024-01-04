<?php
	$connect = mysqli_connect("localhost","root","","dormpay");
	if($connect == false){
		die();
	}
    $sql = " CREATE TABLE if not exists students(id int not null primary key auto_increment,
									lastname varchar(50) not null,
                                    firstname varchar(50) not null,
                                    middlename varchar(50) not null,
									username varchar(50) not null,
                                    sex varchar(20) not null,
                                    address varchar(100) not null,
									password varchar(50) not null
									)";

	if(mysqli_query($connect, $sql) == false){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}



	$sql = " CREATE TABLE if not exists admin(id int not null primary key auto_increment,
									admin varchar(50) not null,
									password varchar(50) not null
									)";
	if(mysqli_query($connect, $sql) == false){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}
	$sql ="INSERT INTO admin(admin,password)VALUES('admin','admin123')";

	if(mysqli_query($connect, $sql) == false){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}



    $sql = " CREATE TABLE if not exists transaction(id int not null primary key auto_increment,
									username varchar(50) not null,
									room varchar(50) not null,
									lastname varchar(50) not null,
                                    firstname varchar(50) not null,
                                    middlename varchar(50) not null,
                                    date date not null,
                                    gcashtransactid varchar(50) not null,
                                    amount int not null
									)";
	if(mysqli_query($connect, $sql) == false){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}




    $sql = " CREATE TABLE if not exists room1 (id int not null primary key auto_increment,
									lastname varchar(50) not null,
                                    firstname varchar(50) not null,
                                    status varchar(50) not null,
									username varchar(50) not null,
                                    sex varchar(20) not null,
                                    address varchar(100) not null
									)";
	if(mysqli_query($connect, $sql) == false){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}




    $sql = " CREATE TABLE if not exists room2(id int not null primary key auto_increment,
									lastname varchar(50) not null,
                                    firstname varchar(50) not null,
                                    status varchar(50) not null,
									username varchar(50) not null,
                                    sex varchar(20) not null,
                                    address varchar(100) not null
									)";
	if(mysqli_query($connect, $sql) == false){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}



    $sql = " CREATE TABLE if not exists room3(id int not null primary key auto_increment,
									lastname varchar(50) not null,
                                    firstname varchar(50) not null,
                                    status varchar(50) not null,
									username varchar(50) not null,
                                    sex varchar(20) not null,
                                    address varchar(100) not null
									)";
	if(mysqli_query($connect, $sql) == false){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}




    $sql = " CREATE TABLE if not exists room4(id int not null primary key auto_increment,
									lastname varchar(50) not null,
                                    firstname varchar(50) not null,
                                    status varchar(50) not null,
									username varchar(50) not null,
                                    sex varchar(20) not null,
                                    address varchar(100) not null
									)";
	if(mysqli_query($connect, $sql) == false){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}



    $sql = " CREATE TABLE if not exists room5(id int not null primary key auto_increment,
									lastname varchar(50) not null,
                                    firstname varchar(50) not null,
                                    status varchar(50) not null,
									username varchar(50) not null,
                                    sex varchar(20) not null,
                                    address varchar(100) not null
									)";
	if(mysqli_query($connect, $sql) == false){
		echo "ERROR: Could not able to execute $sql. " . mysqli_error($connect);
	}
?>