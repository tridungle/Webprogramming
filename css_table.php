<html>
	<head>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    	<link class="jsbin" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1/themes/base/jquery-ui.css" rel="stylesheet" type="text/css" />
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
		<script class="jsbin" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.0/jquery-ui.min.js"></script>
		<meta charset=utf-8 />
    </head>
	
	<body>
		<h1>CSS TABLE</h1>
		<div>
			<input type='button' value="New CSS" id='new_css'><br />
		</div>	
		<div style='float:left;'>
			<form action='upload_css.php' method='post' enctype="multipart/form-data" />
				<input type='file' name='file' class='toggle' style="display:none;" />
				<input type='submit' name='file2' value="Upload" class='toggle' style="display:none;" /><br />
                <span class='toggle' style="display:none;">Put tittle of css: </span><input type='text' name='css_title' class='toggle' id='css_title' style="display:none;"/>
                <span class='toggle' style="display:none;">Choose rel: <select name='stylesheet'> 
                <option value='stylesheet'>Stylesheet</option>
                <option value='alternate stylesheet'>Alternate Stylesheet</option>
                </select> 
			</form>
		</div><br /><br /><br /><br />
		
		<table id='table' style='float:left;'>
			<th>ID</th>
			<th>Title</th>
			<th></th>
			<?php
				include("pass.php");
				session_start();
				$sql_get="select id, title from csstable";
				$result = $pdo->query($sql_get);
				while($title=$result->fetch()){
			?>
			<tr>
				<td>
					<?php
						printf($title['id']);
						$_SESSION['css_id']=$title['id'];
					?>	
				</td>
			
				<td>
					<?php
						printf($title['title']);
					?>	
				</td>
			
				<td>
						<input type='button' value='Delete' id='delete' onclick="deleteCSS();" />
				</td>
			</tr>
		
			<?php } ?>
		
		
		</table>
		<br /> <br /><br /><br /><br />
		<input type='button' value="Back to Admin Control Panel" id="back" style='float:left;'/>
	<body>

<script>

	$("#new_css").click(function(){
		$(".toggle").toggle(500);	
	});
	
	$("#back").click(function(){
		window.location="admincontrol.php";
	});

</script>

<script>
	function deleteCSS(){
			var answer = confirm("Are you sure?");
			if (answer){
				window.location="delete_css.php";
			}
			else{
				window.location="css_table.php";
			}
		}
</script>
	
<style>
	div{
		float:left;
	}
	th{
		border:1px solid black;
	}
	td{
		border:1px solid black;
	}
	#table{
		border-collapse:collapse;
	}
</style>

</html>
