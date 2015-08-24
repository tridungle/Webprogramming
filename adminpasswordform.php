
<?php
	// the codes below make sure that no one is able to access this admin page with out logging in as admin
	session_start();
	$password=$_SESSION['password'];
	include("pass.php");
	$sql = "select * from user where username='admin' and password='$password'";
	/*$result = $pdo->prepare($sql);
	$result->execute();
	$row = $result->fetchColumn();
	if(isset($_SESSION['username'])&&$row==1){
		// do nothing and how the contents below 
	} else{
		header("location:index.php");
	}*/
    $result = $pdo->query($sql);
    $answer = $result->fetch();
    if(isset($_SESSION['username']) && $answer['password'] == $password){
        
    }else{
       header("location: index.php");
    }
?>
<form action="AdminActionChangePassword.php" method="post">
	<div class="rawtext"><label for="oldpassword">Old Password:</label></div>
	<input class ="inputtext" type='password' name='oldpassword' id="oldpassword"/><br /><br />
	<div class="rawtext"><label for="newpassword">New Password:</label></div>
	<input class ="inputtext" type='password' name='newpassword' id="newpassword"/><br /><br />
	<div class="rawtext"><label for="retypenewpassword">Retype Password:</label></div>
	<input class ="inputtext" type='password' name='retypenewpassword' id="retypenewpassword"/><br /><br />
		<input id="buttonchange" type="submit" value="Change"/> or 
		
		<div id="error">
			<?php
				if(isset($_SESSION['error']) && $_SESSION['error'] == 1){
					echo "<span style='color:red;'>*Wrong username or password</span>";
					$_SESSION['error'] = 0;
				}elseif(isset($_SESSION['error']) && $_SESSION['error'] == 2){
					echo "<span style='color:red;'>*New password did not match</span>";
					$_SESSION['error'] = 0;
				}
			?>
		</div>
</form>

<div style='float:left'>
<form action='admincontrol.php'>
		<input type="submit" value="Cancel"/>
</form>
</div>
