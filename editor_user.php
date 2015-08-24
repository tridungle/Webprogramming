<html>
    
    
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
    	<h1>User Editor</h1>
        <div id="wrapper">
            <form action="user_editor_process.php" method="post">
            <label for="username">Username</label><br />
            <textarea name="username" rows="2" cols="20">
                <?php
                	if (isset($_SESSION['go_back'])){
                		$sql="select username from user where id='".$_SESSION['id']."'";
		                $result = $pdo->query($sql);
		                $row = $result->fetch();
		                echo $row[0];
                	}else {                   
		                $sql="select username from user where id='".$_POST['key']."'";
		                $result = $pdo->query($sql);
		                $row = $result->fetch();
		                echo $row[0];
		                $_SESSION['id'] = $_POST['key'];
                    }
                    
                ?>
            </textarea>
            <br />
            
            <label for="email">Email</label><br />
            <textarea name="email" rows="2" cols="20">
                <?php
                if (isset($_SESSION['go_back'])){
                		$sql="select email from user where id='".$_SESSION['id']."'";
		                $result = $pdo->query($sql);
		                $row = $result->fetch();
		                echo $row[0];	
                	}else {
		                $sql="select email from user where id='".$_POST['key']."'";
		                $result = $pdo->query($sql);
		                $row = $result->fetch();
		                $_SESSION['id']=$_POST['key'];
		                echo $row[0];
		                
                    }
                ?>
            </textarea>
           
            <br />
            <input name='button' type="submit" value="Save"/>
            <input name='button' type="button" value="Delete" onclick="confirmDelete();"/>
            <input name='button' type="submit" value="Cancel"/>
            </form>
 	</div>
    </body>
    <script>
    	function confirmDelete(){
    		var answer = confirm("You really want to DELETE ?");
    		if (answer){
    			alert("User has been deleted.");
    			window.location="delete_user.php";
    		} else {
    			window.location="editor_user.php";
    			<?php
					$_SESSION['go_back']=false;    			
    			?>
    		}
    	}
	</script>
</html>



