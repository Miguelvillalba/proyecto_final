<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("UPDATE usuario SET Activo = 0 WHERE ID_usuario= :memid");	
	$result->bindParam(':memid', $id);
	$result->execute();
?>