<?php
	include("pass.php");
	$comment_id = $_POST['comment_id'];
	$sql_delete="delete from comment where id=$comment_id";
	$result = $pdo->prepare($sql_delete);
	$result->execute();
	header("location:menudrink.php");
?>
