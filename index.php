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
			<div id="menuwrap">
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
			<div id="content">
				<table id="contenttable">
					<tr id="contenttablerow">
					
		<!-- first special -->
						<td class="contenttabledata">
							<div id="newoffer1">
								<?php
									$sql = "select image from article where display = 'main1'";
									$result = $pdo->query($sql);
									$row = $result->fetch();
									echo $row[0];
								?>
							</div>
							<div class="newoffer-text">
                                
								<?php
								$sql = "select introtext from article where display = 'main1'";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
								?>
                                
								<img id="new" src="images/new_icon.gif" alt=""/>
							</div>
							<br />
							<div>
								<span class="originalprice">Original Price: </span>
								<span class="originalnumber">
									<?php
									$sql = "select originalprice from article where display = 'main1'";
									$result = $pdo->query($sql);
									$row = $result->fetch();
									echo $row[0];
									?>
								</span><br />
								<span class="newprice">New Price: </span>
								<span class="newnumber" style="text-decoration:blink;"><i>
									<?php
									$sql = "select newprice from article where display = 'main1'";
									$result = $pdo->query($sql);
									$row = $result->fetch();
									echo $row[0];
									?>
								</i></span><br />
								<span class="available"><u>Available</u>: </span>
								<span class="availablevalue">
								<?php
								$sql = "select available from article where display = 'main1'";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
								?>
								</span>
							</div><br />
							<div class="infotext">
								<span>
								<?php
									$sql = "select promo from article where display = 'main1'";
									$result = $pdo->query($sql);
									$row = $result->fetch();
									echo $row[0];
								?>
								</span>
							</div>
						</td>
					
		<!-- second special -->
						<td class="contenttabledata">
							<div id="newoffer2">
								<?php
									$sql = "select image from article where display = 'main2'";
									$result = $pdo->query($sql);
									$row = $result->fetch();
									echo $row[0];
								?>
							</div>
							<div class="newoffer-text">
								<?php
								$sql = "select introtext from article where display = 'main2'";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
								?>
								<img id = "new2" src="images/new_icon.gif" alt=""/>
							</div>
							<br />
							<div>
								<span class="originalprice">Original Price: </span>
								<span class="originalnumber">
									<?php
									$sql = "select originalprice from article where display = 'main2'";
									$result = $pdo->query($sql);
									$row = $result->fetch();
									echo $row[0];
									?>
								</span><br />
								<span class="newprice">New Price: </span>
								<span class="newnumber" style="text-decoration:blink;"><i>
									<?php
									$sql = "select newprice from article where display = 'main2'";
									$result = $pdo->query($sql);
									$row = $result->fetch();
									echo $row[0];
									?>
								</i></span><br />
								<span class="available"><u>Available</u>: </span>
								<span class="availablevalue">
									<?php
									$sql = "select available from article where display = 'main2'";
									$result = $pdo->query($sql);
									$row = $result->fetch();
									echo $row[0];
									?>	
								</span>
							</div><br />
							<div class="infotext">
								<span>
									<?php
									$sql = "select promo from article where display = 'main2'";
									$result = $pdo->query($sql);
									$row = $result->fetch();
									echo $row[0];
								?>
								</span>
							</div>
						</td>
						
		<!--Welcome and location-->
						<td class="contenttabledata">
							<div id="welcomewrap">
								<div id="welcome">
                                    <span style="font-size: 20px;"><b>
                                         <?php
                                            $sql = "select introtext from article where subject='welcome'";
                                            $result = $pdo->query($sql);
                                            $row = $result->fetch();
                                            echo $row[0];
                                        ?>
                                    </b></span>		
								</div><br />
								<div id="welcometext">
									<span style="font-size: 15px;"> 
                                        <?php
                                            $sql = "select maincontent from article where subject='welcome'";
                                            $result = $pdo->query($sql);
                                            $row = $result->fetch();
                                            echo $row[0];
                                        ?>
                                    </span>
								</div><br />
								
								<div id="location">
									<span style="font-size: 20px;">
                                        <?php
                                        $sql = "select introtext from article where subject='location'";
                                        $result = $pdo->query($sql);
                                        $row = $result->fetch();
                                        echo $row[0];
                                        ?>
                                    </span>		
								</div><br />
								<div id="locationtext">
									<span style="font-size: 15px;"> 
										<?php
                                        $sql = "select maincontent from article where subject='location'";
                                        $result = $pdo->query($sql);
                                        $row = $result->fetch();
                                        echo $row[0];
                                        ?> 
									</span>
								</div><br />
		<!--Pictures-->
								<table>
									<tr>
										<td class="imageintro"> 
											<div id="place">
												<div id="place1">
													<img src="images/coffee-place.jpg" alt=""/>
												</div>
										</td>
										<td class="imageintro">
												<div id="place2">
													<img src="images/coffee-place2.jpg" alt=""/>
												</div>
											</div>
										</td>
										<td class="imageintro">
												<div id="place3">
													<img src="images/coffee-place3.jpg" alt=""/>
												</div>
											</div>
										</td>
									</tr>
								</table>
							
						</td>
						
					</tr>
					
				</table>
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