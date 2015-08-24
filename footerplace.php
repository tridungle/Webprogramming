<?php
	$sql = "select htmltext from footer where name='contact'";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	echo $row[0];

	echo "</td>
<td class='tdcontact'>";

	$sql = "select htmltext from footer where name='contactrmit'";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	echo $row[0];
?>	