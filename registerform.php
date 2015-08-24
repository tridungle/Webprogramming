
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr">
    <head>
        <?php
            include("headercss.php");
        ?>
    </head>
    
<body>	
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
			
			<div id="registerformshow" class="slideshow">
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
			<div id="registerformcontent">
				<div id="registerform">
					<h2>Register Form</h2>
					<p>Please fill out the information below to sign up for an online account.</p>
					<form action="ActionRegistrationForm.php" method="post">
						<label>Email</label><br/><input type = 'text' name='email'/>
                            <?php
                                session_start();
                                if(isset($_SESSION['email_reg'])){
                                    echo "<span style='color:red;'>Not a valid email(example:someone@yahoo.com)</span>";
                                }elseif(isset($_SESSION['email_database'])){
                                    echo "<span style='color:red;'>Email has been used</span>";
                                }
                            ?>
                        <br/><br/>
						<label>Username </label><br/><input type = 'text' name='username'/>
                            <?php
                                if(isset($_SESSION['username_reg'])){
                                        echo "<span style='color:red;'>Invalid username!</span>";                                   
                                }elseif(isset($_SESSION['username_data'])){
                                        echo "<span style='color:red;'>Username already taken!</span>";  
                                }
                            ?>
                        <br/><br/>
						<label>Password</label><br/><input type = 'password' name='password'/><br/><br/>
                        <?php
                                if(isset($_SESSION['password_reg'])){
                                        echo "<span style='color:red;'>Invalid password(should be 6~12 characters).</span>";
                                }
                            ?>
						<label>Retype Password</label><br/><input type = 'password' name='retypepassword'/>
                            <?php
                                if(isset($_SESSION['password_match'])){
                                        echo "<span style='color:red;'>The password did not match.</span>";
                                }
                            ?>
                        <br/><br/>
						<input type = 'submit' value ='Register'> or <a href ="index.php">go back to home page</a>
                        <?php // this code is to tell where the registration process goes wrong
							session_destroy();
						?>
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
