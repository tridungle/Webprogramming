<?php
	include("pass.php");
	session_start();
	$userr = $_SESSION['username'];
	$post = $_POST['postcomment'];
	$thename = $_POST['thename'];
	
	$sql1 = "select foodtype from article 
	where introtext = '$thename'";
	$result1 = $pdo->query($sql1);
	$answer1 = $result1->fetch();
	$foodtype = $answer1[0];
    
    $breakdown = explode("'",$post);
    $totalbreakdown = "";
    for ($i = 0; $i < sizeof($breakdown);$i++){
        if($i == sizeof($breakdown)-1){
            $totalbreakdown = $totalbreakdown.$breakdown[$i];
        }else{
            $totalbreakdown = $totalbreakdown.$breakdown[$i]."\'";
        }
    }
    $xss_prevent = htmlspecialchars($totalbreakdown);
    
	$sql = "insert into comment(username,foodtype,introtext,comment) values('$userr','$foodtype','$thename','$xss_prevent')";
	$result = $pdo->prepare($sql);

	$result->execute();
	header("location: menudrink.php");

?>