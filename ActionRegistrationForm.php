<?php
	// this will have to check to see if the username they chose is available
	// this will also have to check to see if the chosen password and retype password matches each other
	// this will use md5 function to encrypt the password
	
	include("pass.php");
	session_start();
	
	// assign values from form feilds to varibles 
 	$email=$_POST['email'];
	$username=$_POST['username'];
	$password_to_check_regexp = $_POST['password']; 
	$password=md5($_POST['password']);
	$retypepassword=md5($_POST['retypepassword']);
	
	// 
	
	// regular expression
	$reg_exp_email="/^[a-zA-Z0-9]{1,}@(yahoo|gmail|hotmail).(com|vn)$/";
	$reg_exp_username="/^[a-zA-Z0-9]{5,20}$/";
	$reg_exp_password="/^[a-zA-Z0-9]{6,12}$/";
	
	// sql query
	$sql_insert="insert into user(email,username,password) values ('$email','$username','$password' )";
	$insert_result= $pdo->prepare($sql_insert);
	$sql_check_email="select * from user where email='$email'";
	$sql_check="select count(username) from user where username='$username'";//1
	
	// 
	$check_result=$pdo->query($sql_check);//2
	$check_email_result=$pdo->prepare($sql_check_email);
	$check_result->execute();
	$check_email_result->execute();
	$numcheckresult = $check_result->fetch();//3
    $num_check_result = $numcheckresult[0];
	$num_check_email_result= $check_email_result->rowCount();
	
	
	// condition to check all the feilds in the forms
	if(preg_match($reg_exp_email, $email)){
		if($num_check_email_result!=1){
			if(preg_match($reg_exp_username, $username)){
				if($num_check_result==0){
					if(preg_match($reg_exp_password, $password_to_check_regexp )){
						if($password==$retypepassword){
							$insert_result->execute();
                            echo "<div style='margin-left:auto; margin-right:auto;border: 1px dashed black'>";
							echo "Registered successfully ! "."<br/>";
							echo "You will be redirected to login page shortly ";
                            echo "</div>";
							header("refresh:4 ; url=login_register_page.php");
						}else{
							$_SESSION['password_match']=false;
							header("Location: registerform.php");
						}
					}else{
						$_SESSION['password_reg']=false;
						header("Location: registerform.php");
					}
					
				}else{
					$_SESSION['username_data']=false;
                    header("Location: registerform.php");
				}	
			}else{
				$_SESSION['username_reg']=false;
				header("Location: registerform.php");	
			}
		}
		else {
			$_SESSION['email_database']=false;
			header("Location: registerform.php");	
		}
	}else{
		$_SESSION['email_reg']=false;
		header("Location: registerform.php");
	}
	
	//if($num_check_result == 0){
		//if ($password==$retypepassword){
			//$insert_result->execute();
			//echo "Registered successfully ! "."<br/>";
			//echo "You will be redirected to login page shortly ";
			//header("refresh:5, url=index.php");
		//} else {
		//	echo "Passwords did not match ! Please try again"."<br/>";
	//		echo "<a href='registerform.php'>Go back to registration form</a>"."<br/>";
  //          header("refresh: 4, url=registerform.php");
		//	}	
	//}else {
		//echo "Username taken ! Please choose another username for your account"."<br/>";
		//echo "<a href='registerform.php'>Go back to registration form</a>"."<br/>";
	//}
?>
