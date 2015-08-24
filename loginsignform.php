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
        <!-- wrap all things together -->
			<div id = "container">
           
		   
		<!--Logo-->
			
			<div id = "logo" >
				<a href="index.php"><img name="slide" src = "images/coffee-logo.jpg" alt ="none"/></a>	
			</div>
			
			
		<!--slogan-->
			<div id="slogan">
				<b><i>Good till the last drop</i></b>
			</div>
			
			
		<!-- top -->
			
			<div id="login" class="login">
				<a href="login.php" id="logintext">Log in or Sign up</a>
			</div>
			
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
			</div>
			

		<!--menu list -->

			<div id="menuwrap">
				<table id="tablemenu"> 
					<tr id="trmenu">
						<td class="menu"><div class="datawrap" style="background-color:gray;"><a class="menutext" href="index.php">
                        <?php
                            include("pass.php");
                            $sql = "select displayname from menu where ordernumber = 1";
                            $result = $pdo->query($sql);
                            $row = $result->fetch();
                            echo $row[0];
                        ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="index.php">Special offer
                        
                        </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="index.php">Menudrink</a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="index.php">Booking</a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="index.php">About us</a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="index.php">Feedback</a></div></td>
					</tr>
				</table>
			</div>
			
			
		<!--content-->
			<div id="content">
                   <FRAMESET
                    COLS="columnWidthList"
                    ROWS="rowHeightList"
                    BORDER="pixWidth"
                    BORDERCOLOR="color"
                    FRAMEBORDER="YES"|"NO"
                    ONBLUR="JScode"
                    ONFOCUS="JScode"
                    ONLOAD="JScode"
                    ONUNLOAD="JScode"
                    >
			</div>
			
			
		<!--footer-->
			<div id = "footer">	
				<div style="position:relative"><img  src="images/footer3.jpg" alt="nothing" width = "1070"/>
					<div id="contact">	
						<table id="contactinfo">
							<tr id="trcontact">
								<td class="tdcontact">
										<b>Ngo Tan Thinh:</b> Owner of CiFFEE<br />
										<u>email</u>:<a href = "">ngotanthinh92@gmail.com</a> <br />
										<b>Dao Tien Minh:</b> Manager of CiFFEE <br />
										<u>email</u>: <a href = "">minhdao6@gmail.com </a><br />	
								</td>
								<td class="tdcontact">
										RMIT Viet Nam <br />
										02 Nguyen Van Linh <br />
										District 7, Ho Chi Minh City <br />
										Tel: (+848) 3776 1300 <br />
										Fax: (+848) 3776 1399 <br />
								</td>
							</tr>
						</table>	
					</div>
				</div>
			</div>
		</div>
</body>
</html>