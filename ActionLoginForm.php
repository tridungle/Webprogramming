<?php

	echo login();
	
	function login(){
        include("pass.php");
        session_start();
        $_SESSION['username']=$_POST['username'];
		$username = $_POST['username'];
		$password = md5($_POST['password']);
		$_SESSION['password']=md5($_POST['password']);
        
		$sql = "select count(username) from user where username='$username' and password='$password'";
        
		$sth=$pdo ->prepare($sql);
		$sth->execute();
		$result = $sth->fetchColumn();
		
		// evaluate result to decide what to do next
		if ($result == 0){
			
			$_SESSION['result']=$result;
			header("location:login_register_page.php");
		// if logged in successfully as username = "admin"	
		}else if ($username=="admin"){
			// for security purpose, no session for password will be used if admin logs in
			
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			header("location:index.php");
		}else{        	
			$_SESSION['username']=$username;
			$_SESSION['password']=$password;
			header("location:index.php");
     	}
	}
?>

