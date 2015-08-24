<html>
    <head>
    	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
		<meta charset=utf-8 />
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
	
	/*	this code is used to prevent users to directly acess the page without logging in as admin */
	if(isset($_SESSION['username'])&&$row==1){
		// do nothing and how the contents below 
	} else{
		header("location:index.php");
	}
?>


    	<h1>Product Editor</h1>
        <div id="wrapper">
            <form action="process_editor_product.php" method="post" enctype="multipart/form-data">
            
            <label for="subject">Subject</label><br />
            <textarea name="subject" rows="10" cols="15" class="ckeditor"><?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select subject from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
                    	echo $row[0];
                	}else {
		                $sql="select subject from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
						$_SESSION['articleid']=$_POST['key'];
		                echo $row[0];
                    }
                ?></textarea>
            <br/>
            
            <label for="display">Display</label><br />
            <textarea name="display" rows="2" cols="15"><?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select display from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
                    	echo $row[0];
                	}else {
		                $sql="select display from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
		                echo $row[0];
                    }
                ?></textarea>
            <br/>
            
           	<label for="content">Food type</label><br />
            <textarea name="foodtype" rows="2" cols="15"><?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select foodtype from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
                    	echo $row[0];
                	}else {
		                $sql="select foodtype from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
		                echo $row[0];
                    }
                ?></textarea>
            <br/>
            
           	<label for="introtext">Intro Text</label><br />
            <textarea name="introtext" rows="10" cols="15" class="ckeditor"><?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select introtext from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
                    	echo $row[0];
                	}else {
		                $sql="select introtext from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
		                echo $row[0];
                    }
                ?></textarea>
            <br/>
            
            <label for="content">Main Content</label><br />
            <textarea name="content" rows="10" cols="15" class="ckeditor"><?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select maincontent from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
                    	echo $row[0];
                	}else {
		                $sql="select maincontent from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
		                echo $row[0];
                    }
                ?></textarea>
            <br/>
            
            <label for="promo">Promo</label><br />
            <textarea name="promo" rows="10" cols="15" class="ckeditor"><?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select promo from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
                    	echo $row[0];
                	}else {
		                $sql="select promo from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
		                echo $row[0];
                    }
                ?></textarea>
            <br/>
            
            <label for="originalprice">Original Price</label><br />
            <textarea name="originalprice" rows="2" cols="30"><?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select originalprice from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
                    	echo $row[0];
                	}else {
		                $sql="select originalprice from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
		                echo $row[0];
                    }
                ?></textarea>
            <br/>
            
            <label for="newprice">New Price</label><br />
            <textarea name="newprice" rows="2" cols="30"><?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select newprice from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
                    	echo $row[0];
                	}else {
		                $sql="select newprice from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
		                echo $row[0];
                    }
                ?></textarea>
            <br/>
            
           	<label for="available">Available</label><br />
            <textarea name="available" rows="5" cols="30"><?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select available from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
                    	echo $row[0];
                	}else {
		                $sql="select available from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
		                echo $row[0];
                    }
                ?></textarea>
            <br/>
            
            <label for="image">Image</label><br />
             <?php
                	if(isset($_SESSION['go_back'])){
                		$sql="select image from article where articleid=".$_SESSION['articleid']."";
                    	$result = $pdo->query($sql);
						$row = $result->fetch();
						
                    	echo $row['image'];
                	}else {
		                $sql="select image from article where articleid=".$_POST['key']."";
		                $result = $pdo->query($sql);
						$row = $result->fetch();
		                echo $row[0];
                    }
                ?>
            <br />
            <input type='radio' name='image' value="old" id='old' checked>Keep Old Image or
            <input type='radio' name='image' value="new" id='new' >Upload New Image 
            
            <br/>
            <div>
            	<input type="file" name="file" id="fileform" style="display:none;" onchange="readURL(this)" /><br/>
            	<img src="#" id="blah">
            </div>
            <br />
            <br />
            
            <input name='button' type="submit" value="Save"/>
            <input name='button' type="button" value="Delete" onclick="confirmDelete();"/>
            <input name='button' type="button" value="Cancel" onclick="cancel();"/>
            </form>
 	</div>
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script>
    	$("#old").click(function(){
    		$("#fileform").hide();
    	});
    	
    	$("#new").click(function(){
    		$("#fileform").show();
    	
    	});
    	
		function confirmDelete(){
    		var answer = confirm("Are you sure ?");
    		if (answer){
    			window.location="delete_article.php";
    		}else{
    			<?php
    				$_SESSION['go_back']=true;
    			?>
    			window.location="editor_product.php";
    		}
    	}
    	
    	function cancel(){
    		window.location="productcontrol.php";
    	}
    	
    	 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(100)
                        .height(100);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</html>



