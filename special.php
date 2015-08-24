<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr">
    <head>
		<?php
			include("headercss.php");
		?>
		<script>
			$(function() {
				$( "#menuspecialcontent" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
				$( "#menuspecialcontent li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
			});
			
			function show(){
				$('.infotext1').animate({
					width: '95%',
					opacity: "toggle"
				  }, 1000, function(){
					$('.infotext1').removeAttr('style'); 
				});
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
            </div><br /><br />
            
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
						<td class="menu"><div><a href="index.php">
                            <img src="images/homepage-icon3.ico" alt=""/>
                            </a></div></td>
						<td class="menu"><div class="datawrap"  style="background-color:gray;"><a class="menutext" href="special.php">
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
			<div id="menuspecialcontent"> 
				<!-- item tabs -->
					<?php
                    $tabnum = 1;
                    $number = 0;
                    $sql = "select count(display) from article where display in ('main1','main2','special')";
                    $result = $pdo->query($sql);
                    $answer = $result->fetch();
                    $count = $answer[0];
                    $count1 = $answer[0];
                    $main = new SplFixedArray($count+2);
                    echo"<ul>";
          
                while($count > 0){
					echo"<li><a href='#tabs-".$tabnum."' onclick='show();'>";
                        
									$sql = "select introtext from article where display in ('main1','main2','special')";
									$result = $pdo->query($sql);
                                    $num = 0;
									while($row = $result->fetch()){
                                        $main[$num] = $row['introtext'];       
                                        if(($num) == ($tabnum - 1)){
                                            echo $main[$num]; 
                                            break;
                                        }
                                        $num++;
                                    }
                                    
					echo"</a></li>";
                     $count = $count - 1;
                     $number++;
                     $tabnum++;
                    }
                    echo"</ul>";
                    
                    $number = 0;
                    $tabnum = 1;
                    
                while($count1 > 0){
					
				/*<!--description-->*/
					echo"<div id='tabs-".$tabnum."' >
						<div class='infotext1'>
								<center>";
                                
									$sql = "select image from article where display in ('main1','main2','special')";
									$result = $pdo->query($sql);
                                    $num = 0;
									while($row = $result->fetch()){                                      
                                        $main[$num] = $row['image'];       
                                        if(($num) == ($tabnum - 1)){
                                            echo $main[$tabnum - 1]; 
                                            break;
                                        }
                                        $num++;
                                    }
                                    
                           echo"</center>
						</div><br />
					<div class='infotext1'>
						<center><span class='originalprice1'>Original Price: </span>
						<span class='originalnumber'>";
                            
							$sql = "select originalprice from article where display in ('main1','main2','special')";
							$result = $pdo->query($sql);
                            $num = 0;
							while($row = $result->fetch()){
                                $main[$num] = $row['originalprice'];       
                                if(($num) == ($tabnum - 1)){
                                    echo $main[$tabnum - 1]; 
                                    break;
                                }
                                $num++;
                            }
                            
					echo"</span><br />
						<span class='newprice1'>New Price: </span>
						<span class='newnumber'  style='text-decoration:blink;'><i>";
							
							$sql = "select newprice from article where display in ('main1','main2','special')";
							$result = $pdo->query($sql);
                            $num = 0;
							while($row = $result->fetch()){
                                $main[$num] = $row['newprice'];       
                                if(($num) == ($tabnum - 1)){
                                    echo $main[$tabnum - 1]; 
                                    break;
                                }
                                $num++;
                            }
							
					echo"</i></span><br />
						<span class='available1'><u>Available</u>: </span>
						<span class='availablevalue'>";
                        
						$sql = "select available from article where display in ('main1','main2','special')";
						$result = $pdo->query($sql);
                        $num = 0;
						while($row = $result->fetch()){
                            $main[$num] = $row['available'];       
                            if(($num) == ($tabnum - 1)){
                                echo $main[$tabnum - 1]; 
                                break;
                            }
                            $num++;
                        }

					echo"</span>
					</div></center><br />
						<div class='infotext1'>
							<span>";
							
								$sql = "select maincontent from article where display in ('main1','main2','special')";
								$result = $pdo->query($sql);      
                                $num = 0;
								while($row = $result->fetch()){
                                $main[$num] = $row['maincontent'];       
                                if(($num) == ($tabnum - 1)){
                                    echo $main[$tabnum - 1]; 
                                    break;
                                }
                                $num++;
                                }
                            echo"
							</span>
						</div>
					</div>	";	
                $count1 = $count1 - 1;
                $number++;
                $tabnum++;
                }
                ?>
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
