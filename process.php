<?php
	session_start();
    include("pass.php");
    $title = $_POST['title'];
    $content = $_POST['content'];
    $button = $_POST['button'];
    $id = $_SESSION['articleid'];
	
	$sql_save = "update article set introtext='$title', maincontent='$content' where articleid = $id";
    $sql_delete = "delete from article where articleid='".$_SESSION['articleid']."'";
    
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
