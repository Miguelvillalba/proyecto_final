<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("DELETE FROM automovil WHERE ID_automovil= :memid");
	$result->bindParam(':memid', $id);
	$result->execute();
?>