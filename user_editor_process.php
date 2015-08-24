<?php
	session_start();
    include("pass.php");
    $username = $_POST['username'];
    $email = $_POST['email'];
    $button = $_POST['button'];

	$sql_save = "update user set username='$username', email='$email' where id ='".$_SESSION['id']."'";
    $sql_delete = "delete from user where id='".$_SESSION['id']."'";
    
    $save = $pdo->prepare($sql_save);
    $delete = $pdo->prepare($sql_delete);
    
    if ($button=="Save"){
		$save->execute();
		header("location: ".$_SESSION['page']);
	}else if ($button=="Delete"){
		$delete->execute();
		header("location: ".$_SESSION['page']);
	}else if ($button=="Cancel") {
		header("location: ".$_SESSION['page']);
	}
    
?>
