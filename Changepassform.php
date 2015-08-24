
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr">

    <head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Welcome to CiFFee | Good to the last drop</title>
		<link rel = "Shorcut Icon" href = "images/coffee-icon.png" type = "image/x-icon" />		
		<?php
            include("headercss.php");
        ?>
		
		<link rel="stylesheet" type="text/css" href="engine/css/slideshow.css" media="screen" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.5.0/jquery.min.js"></script>
		<style type="text/css">.slideshow a#vlb{display:none}</style>
		<script type="text/javascript" src="engine/js/mootools.js"></script>
		<script type="text/javascript" src="engine/js/visualslideshow.js"></script>

    </head>
    
<body>	
<?php
    include("pass.php");
?>
        <!-- wrap all things together -->
			<div id = "container">
           
		   
		<!--Logo-->
			
			<?php
                include("logoplace.php");
            ?>
			
			
		<!--slogan-->
			<div id="slogan">
				<b><i>Good till the last drop</i></b>
			</div>
			
			
		<!-- top -->
			<div id='login' class='login'">
                <?php
					session_start();
                    if(isset($_SESSION['username'])){
                        echo "<span class='logintext'>Welcome ".$_SESSION['username'].".</span>";
                        echo "<span><a style='color:green; text-decoration:none;' href='profile.php'> Profile </a></span>";
                        echo "<a style='color:yellow; text-decoration:none;'href='logout.php'> Logout</a></span>";
                    }else{
                        session_destroy();
                        echo"<a href='login_register_page.php' class='logintext'>Log in or Sign up</a>";
                    }
                ?>
            </div><br /><br />
		   
           <div id="show" class="slideshow">
				<div class="slideshow-images">
					<a href=""><img id="slide-0" src="data/images/coffeebanner2edit.jpg" alt=""/></a>
					<a href=""><img id="slide-1" src="data/images/coffeetop.jpg" alt=""/></a>
					<a href=""><img id="slide-2" src="data/images/coffeetop3.jpg" alt=""/></a>
				</div>
			</div>
			
			
		<!--background music-->
			
			<div id = "player">
				<object type="application/x-shockwave-flash" 
						data="dewplayer.swf?mp3=music/Coffee - Feather and Down.mp3" 
						width="200" height="20" id="dewplayer">				
						<param name="wmode" value="transparent" />
						<param name="movie" value="dewplayer.swf?mp3=music/Coffee - Feather and Down.mp3"/>
						<param name="flashvars" value="dewplayer.swf?mp3=music/Coffee - Feather and Down.mp3&amp;autostart=0&amp;autoreplay=1&amp;" />
				</object>
			</div><br /><br />
        <!--menu list -->

			<div id="changepassformmenuwrap">
				<table id="tablemenu"> 
					<tr id="trmenu">
						<td class="menu"><div><a href="index.php">
                            <img src="images/homepage-icon3.ico" alt=""/>
                            </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="special.php">
                            <?php
                                $sql = "select displayname from menu where ordernumber = 2";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="menudrink.php">
                            <?php
                                $sql = "select displayname from menu where ordernumber = 3";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="bookingform.php">
                            <?php
                                $sql = "select displayname from menu where ordernumber = 4";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="aboutus.php">
                            <?php
                                $sql = "select displayname from menu where ordernumber = 5";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap" ><a class="menutext" href="feedback.php">
                            <?php
                                $sql = "select displayname from menu where ordernumber = 6";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="ournews.php">
                            <?php
                                $sql = "select displayname from menu where ordernumber = 7";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
					</tr>
				</table>
			</div>
            
		<!--content-->
			<div id="changepassformcontent">
				<div id="passform">
				<!--username-->
					<?php
						$user = $_SESSION['username'];
					?>
					<div class='usertext'><u>User</u>: <span class='userinfotext'>
						<?php
							echo $user;
						?>
					</span>
					</div><br />
					
				<!--password-->	
					<form action="ActionChangePassword.php" method="post">
						<div class="rawtext"><label for="oldpassword">Old Password:</label></div>
						<input class ="inputtext" type='password' name='oldpassword' id="oldpassword"/><br /><br />
						<div class="rawtext"><label for="newpassword">New Password:</label></div>
						<input class ="inputtext" type='password' name='newpassword' id="newpassword"/><br /><br />
						<div class="rawtext"><label for="retypenewpassword">Retype Password:</label></div>
						<input class ="inputtext" type='password' name='retypenewpassword' id="retypenewpassword"/><br /><br />
							<input style="float:right; margin-right:10%;" id="buttonchange" type="submit" value="Change"/>
                            <div id="error">
                                <?php
                                    if(isset($_SESSION['error']) && $_SESSION['error'] == 1){
                                        echo "<span style='color:red;'>*Wrong username or password</span>";
                                        $_SESSION['error'] = 0;
                                    }elseif(isset($_SESSION['error']) && $_SESSION['error'] == 2){
                                        echo "<span style='color:red;'>*New password did not match</span>";
                                        $_SESSION['error'] = 0;
                                    }
                                ?>
                            </div>
					</form>
				
					<div id="goback">
					<a style="color:darkblue;" href="profile.php">Go back to Profile</a>
					</div>
				</div>
			</div>
			
			
		<!--footer-->
			<div id = "footer">	
				<div style="position:relative; border:1px solid yellow;"><img  src="images/footer3.jpg" alt="nothing" width = "1070"/>
					<div id="contact">	
						<table id="contactinfo">
							<tr id="trcontact">
								<td class="tdcontact">
									<?php
                                        include("footerplace.php");
                                    ?>	
								</td>
							</tr>
						</table>	
					</div>
				</div>
			</div>
		</div>
</body>
</html>
