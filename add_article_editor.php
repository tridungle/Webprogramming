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
    include("pass.php");
    session_start();
?>
    	<h1>Upload Article</h1>
    	<div id="notice_box">
			<?php // this is to inform user that some thing has gone wrong with the file 
				if(isset($_SESSION['upload_permission'])){
					echo "Article fail to upload ! ";
					echo "*file could not be uploaded";
					$_SESSION['upload_permission']=""; // destroy this session immidiately after used to prevent it from showing up unexpectedly
				}else{
					echo "this is for error message";
				}
			 
			?>    			 
    	
    	</div>
        <div id="wrapper">
            <form action="ad_article_process.php" method="post" enctype="multipart/form-data">
				
				<label for="subject">Subject</label><br />
				<textarea name="subject" rows="2" cols="10"></textarea><br/>
				    
			    
				    
			    <label for="display">Display</label><br />
				<textarea name="display" rows="10" cols="30"></textarea><br/>
				
				<label for="foodtype">Food Type</label><br />
				<textarea name="foodtype" rows="10" cols="30"></textarea><br/>
				
				<label for="introtext">Intro Text</label><br />
				<textarea name="introtext" rows="10" cols="30" class="ckeditor"></textarea><br/>
				
				<label for="content">Main Content</label><br />
				<textarea name="content" rows="10" cols="30" class="ckeditor"></textarea><br/>
				
				<label for="promo">Promo</label><br />
				<textarea name="promo" rows="10" cols="30" class="ckeditor"></textarea><br/>
				
				<label for="originalprice">Original Price</label><br />
				<textarea name="originalprice" rows="2" cols="5"></textarea><br/>
				
				<label for="newprice">New Price</label><br />
				<textarea name="newprice" rows="2" cols="5"></textarea><br/>
				
				<label for="availabe">Available</label><br />
				<textarea name="available" rows="10" cols="30"></textarea><br/>
				
				<label for="file">Image</label><br />
				<div id="picture_box">
					<input type="file" name="file" id="file" onchange="readURL(this)"/><br/><br/><br/>
					<img id="blah" src="#"/>
				</div>   
				
				<div style="float:right">   
					<input name='button' type="submit" value="Upload"/>
					<input name='button' type="submit" value="Cancel"/>
				</div><br/><br/>
			</form>
 	</div>
    </body>
    
    <style>
    	
    	#notice_box{
    		width: 300px;
    		height: 200px;
    		border: 1px solid black;
    		color: red;
    		float:right; 	
    	}
    	#picture_box{
    		width: 300px;
    		height: 200px;
    	}
    	
    </style>
    
    <script>
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



