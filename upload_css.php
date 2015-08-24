<?php
	
	include("pass.php");
	$file_upload_permission = false;
	if($_FILES['file']['type']=="text/css"){
		if($_FILES['file']['error']==0){
			if(file_exists("Css-file/".$_FILES['file']['name'])){
				echo "File name has been used. Please choose another file name.";
				header("refresh:5;url='css_table.php'");
			}else{
				$file_upload_permission=true;
			}
		}else{
			echo "Please try again.";
			header("refresh:5;url='css_table.php'");
			
		}
	}else{
		echo "Can only upload CSS file";
		header("refresh:5;url='css_table.php'");
	}
	
	// name of the file will be its title
	
	$css_name = $_FILES['file']['name'];
    $title = $_POST['css_title'];
	
	// location will be the the folder in which the file is saved and its name
	$location = "Css-file/".$css_name."";
	
	// rel for css
	$rel = $_POST['stylesheet'];
	
	// sql to insert into values  into css table
<<<<<<< HEAD
	$sql_upload="insert into csstable(cssname,location,rel,title) values('$css_name','$location', '$rel','$title')";
=======
	$sql_upload="insert into csstable(location,rel,title) values('$location', '$rel','$title')";
>>>>>>> 0badfa6c00bfe8347703b01f81d29e5c99bde655
	$result = $pdo->prepare($sql_upload);
	
	if($file_upload_permission){
		$result->execute();
		move_uploaded_file($_FILES['file']['tmp_name'],"Css-file/{$_FILES['file']['name']}");	
		header("location: css_table.php");	
    }
	 
?>
