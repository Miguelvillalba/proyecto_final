<?php
	include('../connect.php');
	$id=$_GET['id'];
	$result = $db->prepare("SELECT * FROM usuario WHERE ID_usuario= :userid");
	$result->bindParam(':userid', $id);
	$result->execute();
	for($i=0; $row = $result->fetch(); $i++){
?>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="saveeditcustomer.php" method="post">
<center><h4><i class="icon-edit icon-large"></i> Editar Cliente</h4></center>
<hr>
<div id="ac">
<p>
  <input type="hidden" name="memi" value="<?php echo $id; ?>" />
  <span>Nombre de usuario: </span><input type="text" required style="width:265px; height:30px;" name="usuario" value="<?php echo $row['Usuario']; ?>" /><br>
  <span>Contraseña:</span><input type="password" required style="width:265px; height:30px;" name="contraseña" value="<?php echo $row['Password']; ?>" /><br>

<p>Datos personales</p>

  <span>Nombre(s) : </span><input type="text" required style="width:265px; height:30px;" name="nombre" value="<?php echo $row['Nombre']; ?>" /><br>
  <span>Apellido Materno: </span><input type="text" required style="width:265px; height:30px;" name="apellido_m" value="<?php echo $row['Ap_mat']; ?>" /><br>

  <span>Apellido Paterno: </span><input type="text" required style="width:265px; height:30px;" name="apellido_p" value="<?php echo $row['Ap_pat']; ?>" /><br>
  <span>Telefono: </span><input type="" required style="width:265px; height:30px;" name="telefono"  value="<?php echo $row['Telefono']; ?>" /><br>
  <span>Fecha de nacimiento:</span><input type="date" required="required" style="width:265px; height:30px;" name="fecha" value="<?php echo $row['Fecha_Nacimiento']; ?>" />
  <br>Direccion <br>
<input type="text" required style="width:80px; height:30px;" name="estado" placeholder="Estado" value="<?php echo $row['Estado']; ?>" /><br>
<input type="text" required style="width:265px; height:30px;" name="municipio" placeholder="Municipio" value="<?php echo $row['Municipio']; ?>" /><br>
<input type="text" required style="width:80px; height:30px;" name="cp" placeholder="CP" value="<?php echo $row['CP']; ?>" /><br>
<input type="text" required style="width:265px; height:30px;" name="calle" placeholder="Calle" value="<?php echo $row['Calle']; ?>" /><br>
<input type="text" required style="width:200px; height:30px;" name="no" placeholder="NO#" value="<?php echo $row['Numero']; ?>" /><br> 
<input type="text" required style="width:200px; height:30px;" name="colonia" placeholder="Colonia" value="<?php echo $row['Colonia']; ?>" /><br>

<div style="float:right; margin-right:10px;">
  
  <button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Save Changes</button>
</div>
</div>
</form>
<?php
}
?>