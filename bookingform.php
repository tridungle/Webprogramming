
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr">

    <head>
		<?php
			include("headercss.php");
		?>

    </head>
    
<body>	
<?php
	session_start();
    include("pass.php");
	if (!isset($_SESSION['username'])){
		header("location:booking_not_signedin.php");
	}
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
			<div id='login' class='login'>
                <?php			
					if(isset($_SESSION['username'])){
						echo "<span class='logintext'>Welcome ".$_SESSION['username'].".</span>";
						echo "<span><a style='color:green; text-decoration:none;' href='profile.php'> Profile </a></span>";
						echo "<a style='color:yellow; text-decoration:none;'href='logout.php'> Logout </a></span>";
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
		<?php
			include("themeplace.php");
		?>
			<div id="aboutusmenuwrap">
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
						<td class="menu"><div class="datawrap" style="background-color:gray;"><a class="menutext" href="bookingform.php">
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
			<div id="bookingformcontent">
				<div id="bookingform">
					<h2 style="color:#a45618; text-decoration:underline;">Booking Form</h2>
					<p>Please fill out the information below to book your table.</p>
					<form action="ActionBookingForm.php" method="post">
						<label>Name</label><br/><input type = 'text' name='name'/><br/><br/>
						<label>Date(dd/mm)</label><br/><input type = 'text' name='date'/><br/><br/>
						<label>Time(hh/mm)</label><br/><input type = 'text' name='time'/><br/><br/>
						<label>Number of Guests</label><br/><input type = 'text' name='numbguess'/><br/><br/>
						
						<input type = 'submit' value ='Book!'/> or <a href ="index.php">go back to home page</a>
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
