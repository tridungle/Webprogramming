<html>
    <head>
    	<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    </head>
    
    <body>
<?php
    include("pass.php");
    session_start();
?>
    	<h1>Footer/Banner Editor</h1>
        <div id="wrapper">
            <form action="process.php" method="post">
            <label for="banner">Banner</label><br />
            <textarea name="banner" rows="2" cols="20">
                <?php
                	
                    $sql="select htmltext from banner where id='".$_POST['key']."'";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();
                    echo $row[0];
                ?>
            </textarea>
            <br />
            
            <label for="content">Main Content</label><br />
            <textarea name="content" rows="10" cols="30" class="ckeditor">
                <?php
                    $sql="select maincontent from article where articleid='".$_POST['key']."'";
                    $result = $pdo->query($sql);
                    $row = $result->fetch();
                    $_SESSION['articleid']=$_POST['key'];
                    echo $row[0];
                    
                ?>
            </textarea>
            
           
            <br />
            <input name='button' type="submit" value="Save"/>
            <input name='button' type="submit" value="Delete"/>
            <input name='button' type="submit" value="Cancel"/>
            </form>
 	</div>
    </body>
</html>



