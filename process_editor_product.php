<?php
	session_start();
    include("pass.php");
    
    
    $subject = $_POST['subject'];
    $display = $_POST['display'];
    $foodtype = $_POST['foodtype'];
    $introtext = $_POST['introtext'];   
    $content = $_POST['content'];
    $promo = $_POST['promo'];
    $originalprice = $_POST['originalprice'];
    $newprice = $_POST['newprice'];
    $available = $_POST['available'];
   	$id = $_SESSION['articleid'];    
    $button = $_POST['button'];
    
    if($_POST['image']=="old"){
		
		$sql_save = "update article set subject='$subject', display='$display', foodtype='$foodtype', introtext='$introtext', maincontent='$content', promo='$promo', originalprice='$originalprice', newprice='$newprice', available='$available' where articleid = $id";
		$save = $pdo->prepare($sql_save);
		$save->execute();		
		header("location:productcontrol.php");
    
    }else{
    
		if ($_FILES['file']['type']=="image/jpeg"
			||$_FILES['file']['type']=="image/jpg"
			||$_FILES['file']['type']=="image/png"){
			if($_FILES['file']['error']==0){
				$upload_permission=true;		
			}else{
				$upload_permission=false;
			}	
		}else{
			$upload_permission=false;
		}
	
		if ($_FILES['file']['type']=="image/jpeg"){
			$file_name=$_SESSION['articleid'].".jpeg";
		}else if($_FILES['file']['type']=="image/jpg"){
			$file_name=$_SESSION['articleid'].".jpg";
		}else if($_FILES['file']['type']=="image/png"){
			$file_name=$_SESSION['articleid'].".png";
		}
	
		$file_path = '<img src="images/'.$file_name.'"/>';
	
	
		$sql_save = "update article set subject='$subject', display='$display', foodtype='$foodtype', introtext='$introtext', maincontent='$content', promo='$promo', image='$file_path', originalprice='$originalprice', newprice='$newprice', available='$available' where articleid = $id";
	
	
		
		
		$save = $pdo->prepare($sql_save);
		
		
		if ($button=="Save"&&$upload_permission==true){
			$save->execute();
			move_uploaded_file($_FILES['file']['tmp_name'], "images/{$file_name}");
			header("location:".$_SESSION['page']);
		}else{
			echo "Something has gone wrong with the file";
			header("refresh: 5, url='productcontrol.php'");
		}
	}
?>
