<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr">
    <head>
		<?php
			include("headercss.php");
		?>
		<script type="text/javascript">
			function changeImg(){
				  document.getElementById("new").src = (document.getElementById("new").src.indexOf("images/new_icon.gif") == -1)?"images/new_icon.gif":"images/new_icon2.gif";
				  document.getElementById("new2").src = (document.getElementById("new2").src.indexOf("images/new_icon.gif") == -1)?"images/new_icon.gif":"images/new_icon2.gif";				  
				}
				window.onload = function(){
				  var xTimer = window.setInterval("changeImg()",200);
				}
			
		</script>
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
			<!--login or signup-->
            <div id='login' class='login'>
				<?php
                include("loginplace.php");
				?>
            </div>
			<br />
			<br />

			
			<div id="show" class="slideshow">
				<div class="slideshow-images" >
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
			<?php
				include("themeplace.php");
			?>
			<div id="menuwrap"">
				<table id="tablemenu"> 
					<tr id="trmenu">
						<td class="menu"><div ><a href="index.php">
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
						<td class="menu"><div class="datawrap"><a class="menutext" href="feedback.php">
                            <?php
                                $sql = "select displayname from menu where ordernumber = 6";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap" style="background-color:gray;"><a class="menutext" href="ournews.php">
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
			<div id="ournewscontent">
				<div id="ournewsblock">
					<table style="padding:1px 20px 1px 20px;">
						<tr>
							<th class = "contentth" ><div class = "headerth">Our News</div></th>
							<th class = "contentth"><div class = "headerth">Our Location</div></th>
							<th class = "contentth"><div class = "headerth">Learn More</div></th>
						</tr>
						
						<tr>
							<td>								
                                <div class = "alldivtd" >
                                    <?php
                                        $sql = "select count(*) from ournews where type = 'news'";
                                        $answer = $pdo->query($sql);
                                        $result = $answer->fetch();
                                        $count = $result[0];
                                        
                                        $sql2 = "select * from ournews where type = 'news'";
                                        $answer2 = $pdo->query($sql2);

                                        
                                        while($count > 0 && $result2 = $answer2->fetch()){
                                            $id = $result2['id'];
											$text = $result2['introtext'];
											echo "<span class = 'headertd'><center><b>".$text."</b></center></span>";
                                            $sub = substr($result2['content'],0,80);
                                            echo "<span class = 'infotd'>".$sub."...</span><br />";
                                            echo "<a href='ournewscontent.php?id=$id'>More details</a>";
                                            echo "<hr />";                                           
                                            $count--;
                                        }
                                        
                                    ?>
                                </div>								
							</td>
							<td>
								<div class = "alldivtd" >
                                    <?php
                                        $sql = "select count(*) from ournews where type = 'location'";
                                        $answer = $pdo->query($sql);
                                        $result = $answer->fetch();
                                        $count = $result[0];
                                        
                                        $sql2 = "select * from ournews where type = 'location'";
                                        $answer2 = $pdo->query($sql2);

                                        
                                        while($count > 0 && $result2 = $answer2->fetch()){
                                            $id = $result2['id'];
											$text = $result2['introtext'];
											echo "<span class = 'headertd'><center><b>".$text."</b></center></span>";
                                            $sub = substr($result2['content'],0,80);
                                            echo "<span class = 'infotd'>".$sub."...</span><br />";
                                            echo "<a href='ournewscontent.php?id=$id'>More details</a>";
                                            echo "<hr />";                                         
                                            $count--;
                                        }
                                        
                                    ?>
                                </div>				
							</td>
							<td>
								<div class = "alldivtd" >
                                    <?php
                                        $sql = "select count(*) from ournews where type = 'learn'";
                                        $answer = $pdo->query($sql);
                                        $result = $answer->fetch();
                                        $count = $result[0];
                                        
                                        $sql2 = "select * from ournews where type = 'learn'";
                                        $answer2 = $pdo->query($sql2);

                                        
                                        while($count > 0 && $result2 = $answer2->fetch()){
                                            $id = $result2['id'];
											$text = $result2['introtext'];
											echo "<span class = 'headertd'><center><b>".$text."</b></center></span>";										
                                            $sub = substr($result2['content'],0,80);
                                            echo "<span class = 'infotd'>".$sub."...</span><br />";
                                            echo "<a href='ournewscontent.php?id=$id'>More details</a>";
                                            echo "<hr />";                                           
                                            $count--;
                                        }
                                        
                                    ?>
                                </div>				
							</td>
						</tr>
					</table>
				</div>
			</div>
			
			
			
		<!--footer-->
			<div id = "footer">	
				<div style="position:relative;"><img  src="images/footer3.jpg" alt="nothing" width = "1070"/>
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