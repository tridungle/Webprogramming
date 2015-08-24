<?php
    session_start();
	include ("pass.php");
	$username=$_SESSION['username'];
	$oldpassword=md5($_POST['oldpassword']);
	$newpassword=md5($_POST['newpassword']);
	$retypenewpassword=md5($_POST['retypenewpassword']);
    $_SESSION['password'] = md5($_POST['newpassword']);
	
	$check_credentials_sql="select * from user where username='$username' and password ='$oldpassword'";
	$change_password_sql="update user set password='$newpassword' where username='$username'";
	
	$result_check=$pdo->prepare($check_credentials_sql);
	$result_check->execute();
	
	if ($numRow=$result_check->rowCount() == 0){
		$_SESSION['error'] = 1;
		header("location:adminpasswordform.php");
	} else {
		if($newpassword==$retypenewpassword){
			$result_update=$pdo->prepare($change_password_sql);	
			$result_update->execute();
            $_SESSION['error'] = 3;
            header("location: admincontrol.php");
		}
		else {
            $_SESSION['error'] = 2;
			header("location:adminpasswordform.php");			
		}
	}
?>
