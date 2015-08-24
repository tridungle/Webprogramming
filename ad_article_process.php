<?php
	session_start();
    include("pass.php");
    $button=$_POST['button'];
    $subject = $_POST['subject'];
    $display = $_POST['display'];
    $foodtype = $_POST['foodtype'];
	$introtext = $_POST['introtext'];
	$content = $_POST['content'];
	$promo = $_POST['promo'];
	$originalprice = $_POST['originalprice'];
	$newprice = $_POST['newprice'];
	$available = $_POST['available'];
	$file_upload_permission=false; // if the file passes all the condition, it will have permission to be uploaded along with everything else 
	
	
	
	$file_path='<img src="images/'.$_FILES['file']['name'].'" />';
	$sql_update = "insert into article(subject, display, foodtype, introtext, maincontent, promo, image, originalprice, newprice, available) values ('$subject', '$display', '$foodtype', '$introtext', '$content', '$promo', '$file_path', '$originalprice', '$newprice', '$available')";
    
    $save = $pdo->prepare($sql_update);
    
    
    /*	first the code will check if the file is in one of the format specify below
    	if the file is one of the correct format, if not inform user then redirect them
    	if file is correct, check for posible
    	if file has error, print error, if not check if the file already exists in the folder
    	if the file has already exists in the folder, inform user and never move to file to the folder
    	if the file has no conflict with other files, permission granted to upload
   	*/
   	
   	if($_FILES['file']['type']=="image/jpeg"
    	||$_FILES['file']['type']=="image/png"
    	||$_FILES['file']['type']=="image/jpg"){
    	if($_FILES['file']['error']>0){
    		$_SESSION['upload_permission']=false;// session is set to indicate that something has gone wrong with the file
    		echo "Error: ".$_FILES['file']['error']."<br/>";
    		header("refresh:3, url=add_article_editor.php");
    	}else{
    		$file_upload_permission=true;
    	}
    }else{
    	echo "image must be .jpeg or.png";
    	header("refresh:3, url=add_article_editor.php");
    	$_SESSION['upload_permission']=false;
    }
   	
    /*	to avoid missing file in the database, the file and other contents must be uploaded at the SAME TIME	
    	so if user press upload and file_upload_permission is true, everything is uploaded
    	NOTE: any possible error might happen to the file (if occured) has been detected during the process, so no need to do so anymore
    */
    
    if ($button=="Upload" && $file_upload_permission==true){
    	$save->execute();
    	//move_uploaded_file($_FILES['file']['tmp_name'],"images/{$_FILES['file']['name']}");
		//header("location: ".$_SESSION['page']);
	}else if ($button=="Cancel") {
		//header("location:Article.php");
	}
	
	/*	now we will create a conventional way to name the files, so that files name will never be the same(hopefully !)
		to do that, we will name files after that article id that they are assosiated with
		first, we will upload the file to the data base to create a new id
		then, we will change the name of the file to the id and use that name to upload back to the database and its folder
	*/
	
	$sql_get_id="select articleid from article where image = '$file_path'"; // I think this is the only way to get the id of the newly created row, because the $file_path now has a unique name
	$get_id = $pdo->prepare($sql_get_id);// prepare to execute
	$get_id->execute();// execute the sql
	$data=$get_id->fetch(); // fetch data from a row, then assign the value into $id in the form of array
	$data['articleid']; // this is the id of the newly created row, we will use this for the file name :D
	$id = $data['articleid'];
	// we have to keep the originnal file format of the file, so we user condition to check the file format, then use concatenation to put the extension in :D
	if($_FILES['file']['type']=="image/jpeg"||$_FILES['file']['type']=="image/jpg"){
  		$file_path2 = '<img src="images/'.$data['articleid'].'.jpeg" />'; // PATH to the file in database
  		$file_name2 = $data['articleid'].'.jpeg';  // NAME of the file in the folder
  	} else {
  		$file_path2 = '<img src="images/'.$data['articleid'].'.png" />'; // PATH to the file in database
  		$file_name2 = $data['articleid'].'.png';	// NAME of the file in the folder
  	}
  	
  	// up to now the file name and its extension has been changed, all we need to do now is to save it to the image folder and reupload the new file name back to database
  	
  	$sql_update="update article set image = '$file_path2' where articleid = $id";
  	$update = $pdo -> prepare($sql_update);
  	$update -> execute();
  	move_uploaded_file($_FILES['file']['tmp_name'],"images/{$file_name2}");
  	header("location:".$_SESSION['page']);
?>
