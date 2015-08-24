<!-- 
	this page will display a list of articles that are in the database for admin to edit
		to do this, first you must have a table for article and access to that table
	this page also have to store some info under session like id of the article to use latter in editor page
		
	this page will only show the list ONLY if admin has logged in
		think latter when the primary objective is done
 -->
<html>

<?php
	// the codes below make sure that no one is able to access this admin page with out logging in as admin
	session_start();
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
			footer
		</title>
        
        <style>
            .data{
                padding:7px;
            }
        </style>
        
	</head>
	<body>
		<h1>Banner/Footer</h1>
		<table border = "1" style="border-collapse:collapse;">
			<tr>
				<th>ID</th>
				<th>Name</th>
                <th>Text</th>
                <th>Edit</th>
				
			</tr>
				<?php
					$_SESSION['page'] = 'banner_footer.php';
					include("pass.php");
					$sql="select * from footer";
					$result = $pdo->query($sql);
			
					
					while($title=$result->fetch()){ 
                ?>
            <tr>
            
                <td class="data">
                    <?php
                        printf($title['id']);
                        $_SESSION['id']=$title['id'];
                    ?>
                </td>
                
                <td class="data">
                    <?php 
                        printf($title['name']);
                    ?>
                </td>
                
                <td class="data">
                    <?php
                        printf($title['htmltext']);
                    ?>
                </td>
           
               
             <td class="data">						
                    <form action='editor_footer.php' method='post' name='key' value="" >
                        <input type='hidden' name='key' value="<?php echo $_SESSION['id']; ?>" >
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
