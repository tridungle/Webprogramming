<?php
	session_start();
	if(isset($_SESSION['username'])){
        include("pass.php");
        $user = $_SESSION['username'];
        $sql = "select * from user where username = '$user'";
        $result = $pdo->query($sql);
        $row = $result->fetch();
        if( $_SESSION['password'] == $row['password']){
            if($_SESSION['username'] == 'admin'){
                echo"<input type='button' value='Admin Control Panel' onclick='flytoadmin()'/>";
            }
		echo "<span class='logintext'>Welcome ".$_SESSION['username'].".</span>";
		echo "<span><a style='color:green; text-decoration:none;' href='profile.php'> Profile </a></span>";
		echo "<a style='color:yellow; text-decoration:none;'href='logout.php'> Logout </a></span>";
            
        }else{
            session_destroy();
            echo"<a href='login_register_page.php' class='logintext'>Log in or Sign up</a>";
        }
	}else{
		session_destroy();
		echo"<a href='login_register_page.php' class='logintext'>Log in or Sign up</a>";
	}
?>
<script type="text/javascript">
    function flytoadmin(){
        window.location='admincontrol.php';
    }
</script>