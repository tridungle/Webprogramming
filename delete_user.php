<?php
	session_start();
	include("pass.php");
	$id = $_SESSION['id'];
	$sql_delete = "delete from user where id=$id";
	$result=$pdo->prepare($sql_delete);
	$result->execute();
	$_SESSION['go_back'] = false;
	header("location: usercontrol.php");
?>
