<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" dir="ltr">
    <head>
		<?php
			include("headercss.php");
		?>
		<script>
			$(function() {
				$( ".itemlist" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
				$( ".itemlist li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
			});
			
			$(function(){
				$("#menudrinkcontent").tabs();
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
		<?php
			include("themeplace.php");
		?>
			<div id="menuwrap">
				<table id="tablemenu"> 
					<tr id="trmenu">
						<td class="menu"><div><a href="index.php">
                            <img src="images/homepage-icon3.ico" alt=""/>
                            </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="special.php">
                            <?php
                                include("pass.php");
                                $sql = "select displayname from menu where ordernumber = 2";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap" style="background-color:gray;"><a class="menutext" href="menudrink.php">
                            <?php
                                include("pass.php");
                                $sql = "select displayname from menu where ordernumber = 3";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="bookingform.php">
                            <?php
                                include("pass.php");
                                $sql = "select displayname from menu where ordernumber = 4";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="aboutus.php">
                            <?php
                                include("pass.php");
                                $sql = "select displayname from menu where ordernumber = 5";
                                $result = $pdo->query($sql);
                                $row = $result->fetch();
                                echo $row[0];
                            ?>
                        </a></div></td>
						<td class="menu"><div class="datawrap"><a class="menutext" href="feedback.php">
                            <?php
                                include("pass.php");
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
			<div id="menudrinkcontent" style="padding:20px;"> 
				<!-- item tabs -->
					<?php
                    $tabnum = 1;
                    $sql = "select count(foodtype)from (select distinct foodtype from article where foodtype != ' ' )bs";
                    $result = $pdo->query($sql);
                    $answer = $result->fetch();
                    $count = $answer[0];
					$count1 = $answer[0];
                    $main = new SplFixedArray($count);
					
                echo"<ul>			
					";					/* open ul 1*/
				
				$numtimes = 0;
                while($count > 0){
                   
					echo"<li><a href='#tabs-".$tabnum."' onclick='show();'> ";
                        
									$sql = "select distinct foodtype from article where foodtype not in ('')";
									$result = $pdo->query($sql);
                                    $num = 0;
									while($row = $result->fetch()){
                                        $main[$num] = $row['foodtype'];       
                                        if(($num) == ($tabnum - 1)){
                                            echo $main[$num]; 
                                            break;
                                        }
                                        $num++;
                                    }
                            $numtimes = $num;        
					echo"</a></li>
					";
                     $count = $count - 1;
                     $tabnum++;
                    }
				echo "</ul>";						/* close ul 1*/
				
                    $tabnum = 1;		
				 while($count1 > 0){
					
					echo"<div id='tabs-".$tabnum."'>";
						
						
						//--------------------------------------------//
						echo "<div class='itemlist' style='height:93%;'>";
								$tabnum1 = 1;
								$sql1 = "select count(display) from article where display != '' and foodtype = '".$main[$tabnum-1]."'";
								$result1 = $pdo->query($sql1);
								$answer1 = $result1->fetch();
								$count2 = $answer1[0];
								$count3 = $answer1[0];
								$main1 = new SplFixedArray($count2 + 3);

							echo"<ul>		
								";					/* open ul 2*/
						
							$numtimes1 = 0;
							$numm = 0;
							while($count2 > 0){		
							   
								echo"<li><a href='#item-".$tabnum1."' onclick='show();'>";
												
												$sql1 = "select introtext from article where display != '' and foodtype = '".$main[$tabnum-1]."'";
												$result1 = $pdo->query($sql1);
												$num1 = 0;
												while($row1 = $result1->fetch()){
													$main1[$num1] = $row1['introtext'];       
													if(($num1) == ($tabnum1 - 1)){
														echo $main1[$num1]; 
														break;
													}
													$num1++;
												}	
										$numtimes1 = $num1;
								echo"</a></li>
								";
								 $count2 = $count2 - 1;
								 $tabnum1++;
								}
							echo"</ul>";			/* close ul 2*/
							
								//*********************************************************//
								
								$tabnum1 = 1;
								while($count3 > 0){					/*open div item*/
									/*<!--description-->*/
									echo"<div id='item-".$tabnum1."'>				
										<div class='infotext1' id='newoffer1'>
												<center>";					/*LOOP ITEMS*/
													
													$sql1 = "select image from article where display != '' and foodtype = '".$main[$tabnum-1]."'";
													$result1 = $pdo->query($sql1);
													$num1 = 0;
													while($row1 = $result1->fetch()){                                      
														$main1[$num1] = $row1['image'];       
														if(($num1) == ($tabnum1 - 1)){
															echo $main1[$tabnum1 - 1]; 
															break;
														}
														$num1++;
													}
										   echo"</center>
										</div><br />
									<div class='infotext1'>
										<center><span class='originalprice'>Original Price: </span>
										<span class='originalnumber'>";
											
											$sql1 = "select originalprice from article where display != '' and foodtype = '".$main[$tabnum-1]."'";
											$result1 = $pdo->query($sql1);
											$num1 = 0;
											while($row1 = $result1->fetch()){
												$main1[$num1] = $row1['originalprice'];       
												if(($num1) == ($tabnum1 - 1)){
													echo $main1[$tabnum1 - 1]; 
													break;
												}
												$num1++;
											}
											
									echo"</span><br />
										<span class='newprice'>New Price: </span>
										<span class='newnumber'  style='text-decoration:blink;'><i>";
											
											$sql1 = "select newprice from article where display != '' and foodtype = '".$main[$tabnum-1]."'";
											$result1 = $pdo->query($sql1);
											$num1 = 0;
											while($row1 = $result1->fetch()){
												$main1[$num1] = $row1['newprice'];       
												if(($num1) == ($tabnum1 - 1)){
													echo $main1[$tabnum1 - 1]; 
													break;
												}
												$num1++;
											}
											
									echo"</i></span><br />
										<span class='available'><u>Available</u>: </span>
										<span class='availablevalue'>";
										
										$sql1 = "select available from article where display != '' and foodtype = '".$main[$tabnum-1]."'";
										$result1 = $pdo->query($sql1);
										$num1 = 0;
										while($row1 = $result1->fetch()){
											$main1[$num1] = $row1['available'];       
											if(($num1) == ($tabnum1 - 1)){
												echo $main1[$tabnum1 - 1]; 
												break;
											}
											$num1++;
										}

									echo"</span>
									</div></center><br />
										<div class='infotext1'>
											<div style='width: 100%; text-align:center;'><span>";
											
												$sql1 = "select maincontent from article where display != '' and foodtype = '".$main[$tabnum-1]."'";
												$result1 = $pdo->query($sql1);      
												$num1 = 0;
												while($row1 = $result1->fetch()){
												$main1[$num1] = $row1['maincontent'];       
												if(($num1) == ($tabnum1 - 1)){
													echo $main1[$tabnum1 - 1]; 
													break;
												}
												$num1++;
												}
											echo"
											</span></div>
										</div>
										<div class='infotext1'>
											<div style='width: 100%;'><span>";
											
												$sql1 = "select introtext from article where display != '' and foodtype = '".$main[$tabnum-1]."'";
												$result1 = $pdo->query($sql1);      
												$num1 = 0;
												$thename = "";											
												while($row1 = $result1->fetch()){
												if(isset($_POST['comment_id'])){
                                                                $comment_id = $_POST['comment_id'];
                                                                $sql_delete = "delete from comment where id=$comment_id";
                                                                $result = $pdo->prepare($sql_delete);
                                                                $result->execute();
                                                        }
												$main1[$num1] = $row1['introtext'];       
												if(($num1) == ($tabnum1 - 1)){
													$thename = $main1[$tabnum1 - 1];
													$sqlget = "select id,username,comment from comment where introtext = '$thename' order by id";
													$feedback = $pdo->query($sqlget);
													echo "<br />";
													echo "<span class = 'commentword' >Comments</span>";
													echo "<hr />";
													echo "<table id = 'tableforcomment'>";
													while($output = $feedback->fetch()){
														
                                                        //$xss_prevent = htmlspecialchars($output['comment']);
														echo "<tr class='commentbox'>";
														echo "<td class='commentbox'>";
                                                            if($output['username'] == 'admin'){
                                                                echo "<span class='commentboxusernameadmin'>".$output['username']."</span>";
                                                            }else{
                                                                echo "<span class='commentboxusername'>".$output['username']."</span>";
                                                            }
														echo "</td>";	
														echo "<td class='commentbox'>";
														echo "<span class='ui-tooltip-left'>".$output['comment']."</span>";
														echo "</td>";
                                                        $comment_id = $output['id'];
                                                        if(isset($_SESSION['username'])){
                                                            if($_SESSION['username'] == 'admin'){
                                                                echo "<td>";
                                                                    echo "<form action='menudrink.php' method='post'>
                                                                        <input class='deletepostbutton' type='submit' value='X'/>
                                                                        <input type='hidden' name='comment_id' value='$comment_id'/>
                                                                        </form>
                                                                    ";
                                                                echo "</td>";
                                                            }elseif($_SESSION['username'] == $output['username']){
                                                                echo "<td>";
                                                                    echo "<form action='menudrink.php' method='post'>
                                                                        <input class='deletepostbutton' type='submit' value='X'/>
                                                                        <input type='hidden' name='comment_id' value='$comment_id'/>
                                                                        </form>
                                                                    ";
                                                                echo "</td>";
                                                            }
                                                        }
														echo "</tr>";
													}
													echo "</table>";
													echo "<br />";
													echo "<span class = 'commentword'>Leave your comments </span>";
													echo "<hr />";
                                                    
														if(isset($_SESSION['username'])){
                                                            $user = $_SESSION['username'];
                                                            $sql = "select * from user where username = '$user'";
                                                            $result = $pdo->query($sql);
                                                            $row = $result->fetch();
                                                            if($_SESSION['password'] == $row['password']){
                                                                echo "<form action='postcomment.php' method='post'>";
                                                                    echo "<textarea rows='5' cols= '20' id = 'postcomment' name='postcomment'></textarea>"."<br />";
                                                                    echo "<input class='buttonpost' type = 'submit' value='Post comment'/>";
                                                                    echo "<input id='thename' type = 'hidden' name = 'thename' value = '".$thename."'/>";
                                                                    echo "<input id='hiddenusername' type = 'hidden' name = 'hiddenusername' value = '".$_SESSION['username']."'/>";
                                                                echo "</form>";
                                                            }else{
                                                                echo "Please login to post comments";
                                                            }
														}else{
															echo "Please login to post comments";
														}
													break;
												}
												$num1++;
												}
											echo"
											</span></div>
										</div>
									</div>	";	
								$count3 = $count3 - 1;
								$tabnum1++;
								}
																/*open div item*/
						echo"</div>";	
				
								//*********************************************************//
						//--------------------------------------------//
						
					echo"</div>";
					
					$count1 = $count1 - 1;
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
<!--<script type="text/javascript">
    
    $('.buttonpost').click(function(){
        $.ajax({
            type: "post",
            url: "postcomment.php",         
            data: "&postcomment=" + $('#postcomment').val() + "&thename=" + $('#thename').val(),
            success: function(data){
                //create a container for the new comment
                    var trcommentbox = $("<tr>").addClass("commentbox").appendTo("#tableforcomment");
                    var tdcommentbox = $("<td>").addClass("commentbox").appendTo(trcommentbox);
                    var tdcommentbox2 = $("<td>").addClass("commentbox").appendTo(trcommentbox);
                
                    //add author name and comment to container
                    $("<span>").addClass("commentboxusername").text($('#hiddenusername').val()).appendTo(tdcommentbox);
                    $("<span>").addClass("ui-tooltip-left").text($("#postcomment").val()).appendTo(tdcommentbox2);
                    //$("<div>").addClass("comment").text($("#leaveComment").find("textarea").val()).appendTo(div);
                    
                    //empty inputs
                    //$("#thename").val("");
                    //$("#postcomment").val("");
            }
        });
    });
</script>-->