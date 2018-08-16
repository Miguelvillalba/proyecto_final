<html>
<head>
<title>
</title>
<?php
	require_once('auth.php');
?>
 <link href="css/estilo1.css" rel="stylesheet">
  
  <link rel="stylesheet" href="css/f.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>

<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<!--sa poip up-->
<script src="jeffartagame.js" type="text/javascript" charset="utf-8"></script>
<script src="js/application.js" type="text/javascript" charset="utf-8"></script>
<link href="src/facebox.css" media="screen" rel="stylesheet" type="text/css" />
<script src="lib/jquery.js" type="text/javascript"></script>
<script src="src/facebox.js" type="text/javascript"></script>
<script type="text/javascript">
  jQuery(document).ready(function($) {
    $('a[rel*=facebox]').facebox({
      loadingImage : 'src/loading.gif',
      closeImage   : 'src/closelabel.png'
    })
  })
</script>
	
<?php include('navfixed.php');?>
<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span10">
	<div class="contentheader">
			<i class="icon-group"></i> Clientes
			</div>
	<ul class="breadcrumb"><li class="active"></li>
		</ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Volver</button></a>
<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * FROM usuario ORDER BY ID_usuario DESC");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">
			Número Total de Clientes: <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Buscar Cliente..." autocomplete="off" />
<a rel="facebox" href="addcustomer.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Agregar Cliente</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%">Nombre de usuario</th>
			<th width="23%"> Nombre(s)</th>
			<th width="9%">Apellido Materno</th>
			<th width="17%">Apellido Paterno</th>
			<th width="17%">Telefono</th>
			<th width="9%"> Fecha de Nacimiento</th>
			<th width="17%">Estado</th>
			<th width="17%">Municipio</th>
			<th width="17%">CP</th>
			<th width="17%">Calle</th>
			<th width="17%">No#</th>
			<th width="17%">Colonia</th>
			<th width="17%">Tipo de Usuario</th>
			<th width="14%"> Accion </th>
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT *, edo.estado as edoo,mun.municipio as mun FROM usuario us 
					LEFT JOIN t_estado edo on edo.id_estado = us.Estado 
					LEFT JOIN t_municipio mun on mun.id_municipio = us.Municipio
					ORDER BY ID_usuario DESC ");

				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['ID_usario']; ?></td>
			<td><?php echo $row['Nombre']; ?></td>
			<td><?php echo $row['Ap_mat']; ?></td>
			<td><?php echo $row['Ap_pat']; ?></td>
			<td><?php echo $row['Sexo']; ?></td>
			<td><?php echo $row['Fecha_Nacimiento']; ?></td>
			<td><?php echo $row['edoo']; ?></td>
			<td><?php echo $row['mun']; ?></td>
			<td><?php echo $row['CP']; ?></td>
			<td><?php echo $row['Calle']; ?></td>
			<td><?php echo $row['Numero']; ?></td>
			<td><?php echo $row['Colonia']; ?></td>
			<td><?php echo $row['Tipo_usario']; ?></td>

			<td><a  title="Click To Edit Customer" rel="facebox" href="editcustomer.php?id=<?php echo $row['ID_usuario']; ?>"><button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Editar </button></a> 
			<a href="#" id="<?php echo $row['ID_usuario']; ?>" class="delbutton" title="Click To Delete"><button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Borrar</button></a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>

</div>
</div>
</div>




<?php
}
if($position=='admin') {
?>
<div class="container-fluid">
      <div class="row-fluid">
	<div class="span10">
	<div class="contentheader">
			<i class="icon-group"></i> Clientes
	  </div>
	<ul class="breadcrumb"><li class="active"></li>
	  </ul>

<div style="margin-top: -19px; margin-bottom: 21px;">
<a  href="index.php"><button class="btn btn-default btn-large" style="float: left;"><i class="icon icon-circle-arrow-left icon-large"></i> Volver</button></a>
<?php 
			include('../connect.php');
				$result = $db->prepare("SELECT * from personas");
				$result->execute();
				$rowcount = $result->rowcount();
			?>
			<div style="text-align:center;">Lista de clientes : <font color="green" style="font:bold 22px 'Aleo';"><?php echo $rowcount;?></font>
			</div>
</div>
<input type="text" name="filter" style="padding:15px;" id="filter" placeholder="Buscar Cliente..." autocomplete="off" />
<a rel="facebox" href="addcustomer.php"><Button type="submit" class="btn btn-info" style="float:right; width:230px; height:35px;" /><i class="icon-plus-sign icon-large"></i> Agregar Cliente</button></a><br><br>

<table class="table table-bordered" id="resultTable" data-responsive="table" style="text-align: left;">
	<thead>
		<tr>
			<th width="17%">Nombre de usuario</th>
			<th width="23%"> Nombre(s)</th>
			<th width="9%">Apellido Materno</th>
			<th width="17%">Apellido Paterno</th>
			<th width="17%">Telefono</th>
			<th width="9%"> Fecha de Nacimiento</th>
			<th width="17%">Estado</th>
			<th width="17%">Municipio</th>
			<th width="17%">CP</th>
			<th width="17%">Calle</th>
			<th width="17%">No#</th>
			<th width="17%">Colonia</th>
			<th width="17%">Tipo de Usuario</th>
			<th width="17%">Accion</th>
			
		</tr>
	</thead>
	<tbody>
		
			<?php
				include('../connect.php');
				$result = $db->prepare("SELECT * FROM personas");
				$result->execute();
				for($i=0; $row = $result->fetch(); $i++){
			?>
			<tr class="record">
			<td><?php echo $row['Usuario']; ?></td>
			<td><?php echo $row['Nombre']; ?></td>
			<td><?php echo $row['Ap_mat']; ?></td>
			<td><?php echo $row['Ap_pat']; ?></td>
			<td><?php echo $row['Sexo']; ?></td>
			<td><?php echo $row['Fecha_Nacimiento']; ?></td>
			<td><?php echo $row['Tipo']; ?></td>
			<td><?php echo $row['']; ?></td>
			<td><?php echo $row['CP']; ?></td>
			<td><?php echo $row['Calle']; ?></td>
			<td><?php echo $row['Numero']; ?></td>
			<td><?php echo $row['Colonia']; ?></td>
			<td><?php echo $row['Tipo_usuario']; ?></td>

			<td><a  title="Click To Edit Customer" rel="facebox" href="editcustomer.php?id=<?php echo $row['ID_usuario']; ?>">
			  <button class="btn btn-warning btn-mini"><i class="icon-edit"></i> Editar </button>
			  </a> <a href="#" id="<?php echo $row['ID_usuario']; ?>" class="delbutton" title="Click To Delete">
			    <button class="btn btn-danger btn-mini"><i class="icon-trash"></i> Borrar</button>
			    </a></td>
			</tr>
			<?php
				}
			?>
		
	</tbody>
</table>
<div class="clearfix"></div>

</div>
</div>
</div>
<?php
}?>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

var element = $(this);

var del_id = element.attr("id");

var info = 'id=' + del_id;
 if(confirm("Are you sure want to delete? There is NO undo!"))
		  {

 $.ajax({
   type: "GET",
   url: "deletecustomer.php",
   data: info,
   success: function(){
   
   }
 });
         $(this).parents(".record").animate({ backgroundColor: "#fbc7c7" }, "fast")
		.animate({ opacity: "hide" }, "slow");

 }

return false;

});

});
</script>
</body>


</html>