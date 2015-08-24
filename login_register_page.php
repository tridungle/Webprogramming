
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
			
			<div id="loginregistershow" class="slideshow">
				<div class="slideshow-images">
					<a href=""><img id="slide-0" src="data/images/coffeebanner2edit.jpg" alt=""/></a>
					<a href=""><img id="slide-1" src="data/images/coffeetop.jpg" alt=""/></a>
					<a href=""><img id="slide-2" src="data/images/coffeetop3.jpg" alt=""/></a>
				</div>
			</div>
			
			
		<!--background music-->
			
			<div id = "loginregisterplayer">
				<object type="application/x-shockwave-flash" 
						data="dewplayer.swf?mp3=music/Coffee - Feather and Down.mp3" 
						width="200" height="20" id="dewplayer">				
						<param name="wmode" value="transparent" />
						<param name="movie" value="dewplayer.swf?mp3=music/Coffee - Feather and Down.mp3"/>
						<param name="flashvars" value="dewplayer.swf?mp3=music/Coffee - Feather and Down.mp3&amp;autostart=0&amp;autoreplay=1&amp;" />
				</object>
			</div><br /><br />

		<!--content-->
			<div id="loginregistercontent">
				<div id="signin">
					<h2>Sign in</h2>
					<p>Please sign in to book your table for upcoming events in advance.</p>
					<form action="ActionLoginForm.php" method="post">
						<label>Username</label><br/><input type = 'text' name='username'/><br />
						<label>Password</label><br/><input type = 'password' name='password'/><br/><br />
						<input type = 'submit' value ='Login' class ="formbutton"/> or <a class="message" href ="index.php">go back to home page</a>
					</form>
                    <?php
                        session_start();
                        if(isset($_SESSION['result'])){
                            echo "<br />";
                            echo " <span style='color:red;'>*Wrong username or password. Please try again.</span> ";
                        }
                        session_destroy();
                    ?>
				</div>
				
				<div id="register">
					<h2>Are you new ?</h2>
					<p>CiFFee online account is free of charge !<br /> Register now to book for your table.</p><br/>
					<form action="registerform.php" method="">
        				<input type ='submit' value="Register" class ="formbutton" id="registerbutton"/>
        			</form>
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
