<?php
	include("pass.php");
	session_start();
	$id = $_SESSION['css_id'];
    $sql = "select location from csstable where id=$id";
    $ketqua = $pdo->query($sql);
    $getter = $ketqua->fetch();
    $location = $getter['location'];
    unlink($location);
	$sql_delete="delete from csstable where id=$id";
	$result = $pdo->prepare($sql_delete);
	$result->execute();
	header("location: css_table.php");
?>
