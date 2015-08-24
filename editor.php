<html>
    <head>
    	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>
    
    <body>

<?php
	// the codes below make sure that no one is able to access this admin page with out logging in as admin
	session_start();
	include("pass.php");
	$password=$_SESSION['password'];
	
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
    	<h1>Admin Editor</h1>
        <div id="wrapper">
            <form action="process.php" method="post">
            <label for="title">Title</label><br />
            <textarea name="title" rows="2" cols="20"><?php
                
                	if(isset($_SESSION['go_back'])){
                		$sql="select introtext from article where articleid='".$_SESSION['articleid']."'";
		                $result = $pdo->query($sql);
		                $row = $result->fetch();
		                echo $row[0];
                	}else{	
		                $sql="select introtext from article where articleid='".$_POST['key']."'";
		                $result = $pdo->query($sql);
		                $row = $result->fetch();
		                $_SESSION['articleid']=$_POST['key'];
		                echo $row[0];
                	}
                ?></textarea>
            <br />
            
            <label for="content">Main Content</label><br />
            <textarea name="content" rows="10" cols="30" class="ckeditor"><?php
                
                	if(isset($_SESSION['go_back'])){
                		$sql="select maincontent from article where articleid='".$_SESSION['articleid']."'";
		                $result = $pdo->query($sql);
		                $row = $result->fetch();
		                echo $row[0];
                	}else{	
		                $sql="select maincontent from article where articleid='".$_POST['key']."'";
		                $result = $pdo->query($sql);
		                $row = $result->fetch();
		                $_SESSION['articleid']=$_POST['key'];
		                echo $row[0];
                	}
                ?></textarea>
            
           
            <br />
            <input name='button' type="submit" value="Save"/>
            <input name='button' type="button" value="Delete" onclick="confirmDelete();"/>
            <input name='button' type="submit" value="Cancel"/>
            </form>
 	</div>
    </body>
    <script>
    	function confirmDelete(){
    		var answer = confirm("Are you sure ? ");
    		if(answer){
    			window.location="delete_article.php";
    		}else{
    			<?php
    				$_SESSION['go_back']=true;
    			?>
    			window.location="editor.php";
    		}
    	}
    </script>
</html>



