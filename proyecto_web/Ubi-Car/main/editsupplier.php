required<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM automovil WHERE ID_automovil= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditsupplier.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Editar Auto</h4></center><hr>
<div id="ac">
<p>
  <input type="hidden" name="memi" value="<?php echo $id; ?>" />
  <span>Nombre del propietario: </span><input type="text" style="width:265px; height:30px;" name="propetario" value="<?php echo $row['Nombre_propietario']; ?>" /><br>
  <span>Placa : </span><input type="text" required style="width:265px; height:30px;" name="Placa" value="<?php echo $row['Placa']; ?>" /><br>
  <span>Marca : </span><input type="text" required style="width:265px; height:30px;" name="Marca" value="<?php echo $row['Marca']; ?>" /><br>
  <span>Modelo: </span><input type="text" required style="width:265px; height:30px;" name="Modelo" value="<?php echo $row['Modelo']; ?>" /><br>
  <span>Tipo: </span><input type="text" required style="width:265px; height:30px;" name="Tipo" value="<?php echo $row['Tipo']; ?>" /><br>
  <span>Clase: </span><input type="text" required style="width:265px; height:30px;" name="Clase" value="<?php echo $row['Clase']; ?>" /><br>
  <span>Color: </span><input type="text" required style="width:265px; height:30px;" name="Color" value="<?php echo $row['Color']; ?>" /><br>
  <span>NIV: </span><input type="text" required style="width:265px; height:30px;" name="NIV" value="<?php echo $row['NIV']; ?>" /><br>

<div style="float:right; margin-right:10px;">
  
  <button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Guardar Cambios</button>
</div>
</div>
</form>
<?php
}
?>