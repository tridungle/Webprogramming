<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Welcome to CiFFee | Good to the last drop</title>
		<link rel = "Shorcut Icon" href = "images/coffee-icon.png" type = "image/x-icon" />	
		<script type="text/javascript" src="js/switchstyle.js"></script>		
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				set_style_from_cookie();
				$('.buttonclicktheme').hide();
			});
		</script>		
		<link rel="stylesheet" type="text/css" href="engine/css/slideshow.css" media="screen" />
		<style type="text/css">.slideshow a#vlb{display:none}</style>
		<script type="text/javascript" src="engine/js/mootools.js"></script>
		<script src = "https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<script type="text/javascript" src="engine/js/visualslideshow.js"></script>
		<script type="text/javascript" src="js/jquery-1.7.1.min.js"></script>
		<script type="text/javascript" src="js/jquery-ui-1.8.18.custom.min.js"></script>
<?php
    include("pass.php");
	echo "<link href='Css-file/boxcomment.css' rel='stylesheet' type='text/css'/>";
    $sql = "select count(id) from csstable";
    $result = $pdo->query($sql);
    $answer = $result->fetch();
    $count = $answer[0];
    
    $sql1 = "select * from csstable";
    $result1 = $pdo->query($sql1);
    
    while($count > 0 && $answer1 = $result1->fetch() ){
            $location = $answer1['location'];
            $rel = $answer1['rel'];
            $title = $answer1['title'];
        echo "<link href='$location' rel='$rel' type='text/css' title='$title'/>";
        $count--;
    }
    
    //echo "<link href='Css-file/CSS.css' rel='stylesheet' type='text/css' title='classic' />";
    //echo "<link href='Css-file/CSS2.css' rel='alternate stylesheet' type='text/css' title='bright' />";
?>