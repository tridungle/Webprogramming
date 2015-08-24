<?php
	session_start();
    include("pass.php");
    $name = $_POST['name'];
    $content = $_POST['content'];
    $button = $_POST['button'];

	$sql_save = "update footer set name='$name', htmltext='$content' where id ='".$_SESSION['id']."'";
    $sql_delete = "delete from footer where id='".$_SESSION['articleid']."'";
    
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
