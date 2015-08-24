<html>

	
<?php
	// the codes below make sure that no one is able to access this admin page with out logging in as admin
	session_start();
	$password1 = $_SESSION['password'];
	$username1 = $_SESSION['username'];
	session_destroy();
	session_start();
	$_SESSION['username']=$username1;
	$password=$password1;
	$_SESSION['password']=$password1;
	$_SESSION['page']="productcontrol.php";
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
			admin_product_control
		</title>
        
        <style>
            .data{
                padding:7px;
            }
        </style>
	</head>
	<body>
		<h1>
			Product Control
			<form action='add_article_editor.php' method='post'>
				<input type='submit' value='Add' />
			</form>
		</h1>
		<table border = "1" style="border-collapse:collapse;">
			<tr>
				<th>ID</th>
				<th>Subject</th>
                <th>Display</th>
				<th>Food Type</th>
                <th>Intro Text</th>				
                <th>Main Content</th>
                <th>Promo</th>
                <th>Images</th>
				<th>Original Price</th>
                <th>New Price</th>
                <th>Available</th>
				<th>Edit</th>
			</tr>
				<?php
					
					include("pass.php");
					$sql="select * from article where foodtype != ''";
					$_SESSION['page']='productcontrol.php';
					$result = $pdo->query($sql);
					$i=1;
					
					while($title=$result->fetch()){ ?>
					<tr>
                        <td class="data">
                        <?php
                            printf($title['articleid']);
                            $i=$title['articleid'];
                        ?>
                        </td>
                        
                        <td class="data">
                        <?php 
                            printf($title['subject']);
                        ?>
                        </td>
                        
                        <td class="data">
                        <?php 
                            printf($title['display']);
                        ?>
                        </td>
                        
                        <td class="data">
                        <?php 
                            printf($title['foodtype']);
                        ?>
                        </td>
                        
                        <td class="data">
                        <?php 
                            printf($title['introtext']);
                        ?>
                        </td>

                        <td class="data">
                        <?php 
                            printf($title['maincontent']);
                        ?>
                        </td>

                        <td class="data">
                        <?php 
                            printf($title['promo']);
                        ?>
                        </td>
                        
                        <td class="data">
                        <?php 
                            printf($title['image']);
                        ?>
                        </td>
                        
                        <td class="data">
                        <?php 
                            printf($title['originalprice']);
                        ?>
                        </td>
                        
                        <td class="data">
                        <?php 
                            printf($title['newprice']);
                        ?>
                        </td>
                        
                        <td class="data">
                        <?php 
                            printf($title['available']);
                        ?>
                        </td>
                        
                        <td class="data">
                        
                            <form action='editor_product.php' method='post' name='key' value="<?=$i;?>" >
                                <input type='hidden' name='key' value="<?php echo $i ?>" />
                                <input type='submit' value='Edit' />
                            </form>
                        </td>					
                    </tr>
							
				<?php } ?> 
		</table>
		
		<form action='admincontrol.php'>
			<input type='submit' value="Back to Admin Control Panel">
		</form>		
	</body>	
</html>

