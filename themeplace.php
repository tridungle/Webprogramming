<br />
        <div id="switchstyle" style="width:150px;height:40px;margin-right:0%;margin-top:2%;float:right;">
			<input id="buttonchangetheme" type="button" value="Change Theme"/>
			<br />
            <?php
                $sql = "select count(id) from csstable";
                $result = $pdo->query($sql);
                $answer = $result->fetch();
                $count = $answer[0];
                
                $sql1 = "select * from csstable";
                $result1 = $pdo->query($sql1);
    
                while($count > 0 && $answer1 = $result1->fetch()){
                    $title = $answer1['title'];
                    $title_upper = ucfirst($answer1['title']);
                ?>
                    <input type='button' class='buttonclicktheme' onclick="switch_style('<?php echo $title?>');return false;" name='theme' value='<?php echo $title_upper?>' id='<?php echo $title?>' />
                <?php    
                    $count--;
                }

            ?>
			
        </div>
		<script>
			$('#buttonchangetheme').click(function(){
				if($('#buttonchangetheme').val() == 'Change Theme'){
					$('.buttonclicktheme').show(500);
					$('#buttonchangetheme').val('Hide');
				}else{
					$('.buttonclicktheme').hide(500);
					$('#buttonchangetheme').val('Change Theme');
				}
			});
		</script>