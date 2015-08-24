<?php
	include("pass.php");
	session_start();
	$name=$_POST['name'];
	$date=$_POST['date'];
	$time=$_POST['time'];
	$numbguess=$_POST['numbguess'];
	
	
	$_SESSION['name']=$name;
	$_SESSION['date']=$date;
	$_SESSION['time']=$time;
	$_SESSION['numbguess']=$numbguess;
	
	$sql ="insert into booking(name, date, time, numbguess) values ('$name','$date','$time','$numbguess'))";
	
	$result = $pdo->prepare($sql);
	$result->execute();
	
	echo "Table reservation successful";
	echo "<a href='index.php'>Back to home page</a>";
?> 
