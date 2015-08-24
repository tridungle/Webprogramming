<html>
    <head>
    	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>
    
    <body>

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
    	<h1>Footer/Banner Editor</h1>
        <div id="wrapper">
            <form action="process_footer.php" method="post">
            <label for="name">Name</label><br />
            <textarea name="name" rows="2" cols="20"><?php
                	
                    $sql="select name from footer where id='".$_POST['key']."'";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();
                    echo $row[0];
                ?></textarea>
            <br />
            
            <label for="content">Footer Content</label><br />
            <textarea name="content" rows="10" cols="30" class="ckeditor"><?php
                    $sql="select htmltext from footer where id='".$_POST['key']."'";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();
                    $_SESSION['id']=$_POST['key'];
                    echo $row[0];
                    
                ?></textarea>
            
           
            <br />
            <input name='button' type="submit" value="Save"/>
            <input name='button' type="submit" value="Delete"/>
            <input name='button' type="submit" value="Cancel"/>
            </form>
 	</div>
    </body>
</html>



