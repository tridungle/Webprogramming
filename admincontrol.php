<!-- This is the first page to see when logged in as admin -->
<html>

<head>

    <style>
        #outer_div{
		width:300px;
		height:75%;
		border:1px solid black;
		padding: 20px;
		margin-right:auto;
		margin-left:auto;
}
	
input{
		width:125px;
}
	
#inner_div{
		width:150px;
		height:320px;
		margin-right:auto;
		margin-left:auto;
}
    </style>
</head>
<?php
	
	// the codes below make sure that no one is able to access this admin page with out logging in as admin
	session_start();
	$password=$_SESSION['password'];
	include("pass.php");
	$sql = "select * from user where username='admin' and password='$password'";
	/*$result = $pdo->prepare($sql);
	$result->execute();
	$row = $result->rowCount();
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
	<center><h1>Admin Control Panel</h1></center>
	
	<div id="outer_div">
		<div id	='inner_div'>
			<form action='adminpasswordform.php' method=''>
				<input type='submit' value="Change Password" title="Change admin password"/>
			</form><br/>
	
			<form action='banner_footer.php' method=''>
				<input type='submit' value="Edit Banner/Footer" title="Show text in footer for edit"/>
			</form><br/>
	
			<form action='Article.php' method=''>
				<input type='submit' value="Edit Article" title="Show a list of artitles in database for edit"/>
			</form><br/>
	
			<form action='usercontrol.php' method=''>
				<input type='submit' value="User Control" title="Show a list of users in database for edit"/>
			</form><br/>
			
			<form action='css_table.php' method=''>
				<input type='submit' value="Upload CSS" title="Show a list of products for edit"/>
			</form><br/>
					
			
			<form action='productcontrol.php' method=''>
				<input type='submit' value="Product Control" title="Show a list of products for edit"/>
			</form><br/>
	
			<form action='logout.php' method=''>
				<input type='submit' value="Log Out" title="Log out admin page and go back to homepage"/>
			</form><br/>
			
			<form action='index.php' method=''>
				<input type='submit' value="Back to Home Page" title="go back to homepage"/>
			</form><br/>
			
		</div>
	</div>

</html>
