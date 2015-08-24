<!-- 
	this page will display a list of users that are in the database for admin to edit
		to do this, first you must have a table for users and access to that table
	this page also have to store some info under session like id of the article to use latter in editor page
		
	this page will only show the list ONLY if admin has logged in
		think latter when the primary objective is done
 -->
<html>
	
<?php
	
	// the codes below make sure that no one is able to access this admin page with out logging in as admin
	session_start();
		$userr = $_SESSION['username'];
		$passs = $_SESSION['password'];
	session_destroy();
	session_start();
	$_SESSION['username'] = $userr;
	$_SESSION['password'] = $passs;	
	$password=$_SESSION['password'];
	include("pass.php");
	$sql = "select * from user where username='admin' and password='$password'";
	$result = $pdo->prepare($sql);
	$result->execute();
	$row = $result->fetchColumn();
	if(isset($_SESSION['username'])&&$row==1){
		// do nothing and how the contents below 
	} else{
		header("location:index.php");
	}
?>
	<head>
		<title>
			admin_user
		</title>
	</head>
	<body>
		<h1>User Control</h1>
		<table border = "1" style="border-collapse:collapse;">
			<tr>
				<th>ID</th>
				<th>Email</th>
				<th>Username</th>
				<th>Edit</th>
			</tr>
				<?php
					$sql="select * from user";
					$result = $pdo->query($sql);
					$_SESSION['page']="usercontrol.php";
					
					
					while($title=$result->fetch()){ ?>
							<tr>
							
							<td>
							<?php
								printf($title['id']);
								$_SESSION['id']=$title['id'];
							?>
							</td>
							
							<td>
							<?php 
								printf($title['email']);
							?>
							</td>

							<td>
							<?php 
								printf($title['username']);
							?>
							</td>
							
							<td>
							
								<form action='editor_user.php' method='post' name='key' value="" >
									<input type='hidden' name='key' value="<?php echo $_SESSION['id'] ?>" >
									<input type='submit' value='Edit' />
								</form>
							</td>
							
							</tr>
							
				<?php } ?>
		</table>	
		<br/>
		<form action='admincontrol.php'>
			<input type='submit' value="Back to Admin Control Panel">
		</form>
	</body>	
</html>




