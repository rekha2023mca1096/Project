<?php
	session_start();
	
	$USN1 = $_POST['USN'];
	$password = $_POST['PASSWORD'];
	$confirm = $_POST['repassword'];
	$USN2 = ($_SESSION['reset']);
	
	$connect = mysql_connect("localhost", "root", ""); // Establishing Connection with Server
    mysql_select_db("placement") or die("Cant Connect to database"); // Selecting Database from Server
	
			if($USN1 && $password && $confirm ){
		
	
	if($password == $confirm) {
		
		if($USN2 == $USN1){
		if($sql = mysqli_query("UPDATE `placement`.`slogin` SET `PASSWORD` ='$password' WHERE `slogin`.`USN` = '$USN1'")){
		echo "<center>Password Reset Complete</center>";
		session_unset();
		}
		} else {
			session_unset();
			die("Enter Your Username only");		
			
			} 
	} else
	{
	echo "Update Failed";
	session_unset();
	}
	}
	else
	{
	echo "Field cannot be left blank";
	session_unset();
	}
?>