<?php
    session_start();
    include("pass.php");
    $email = $_POST['email'];
    $name = $_POST['name'];
    $feedback = $_POST['feedback'];
    
    $checkemail = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    if(preg_match($checkemail,$email)){
        $sql = "insert into feedback(email,name,feedback) values ('$email','$name','$feedback')";
        $result = $pdo->prepare($sql);
        $result->execute();
        header("location: index.php");
    }else{
        $_SESSION['emailcheck'] = 1;
        header("location: feedback.php");
    }
?>