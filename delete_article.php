<?php
	session_start();
	include("pass.php");
	$id = $_SESSION['articleid'];
	$sql_delete="delete from article where articleid=$id";
	$result = $pdo->prepare($sql_delete);
	$result -> execute();
	header("location:productcontrol.php");
?>
