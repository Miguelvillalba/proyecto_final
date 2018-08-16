
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
<form action="savecustomer.php" method="post">
<center><h4><i class="icon-plus-sign icon-large"></i> Agregar Cliente</h4></center>
<hr>
<div id="ac">
<p><span>Nombre de usario : </span><input type="text" required style="width:265px; height:30px;" name="usuario" placeholder="" Required/><br>
  <span>Contraseña : </span><input type="password" required style="width:265px; height:30px;" name="contraseña" placeholder=""/><br>
  
    
    <p> Datos personales</p>
        <p><br>
          <span>Nombre  : </span><input type="text" required style="width:265px; height:30px;" name="nombre" placeholder=""/><br>
          <span>Apellido materno: </span><input type="text" required style="width:265px; height:30px;" name="apellido_m" placeholder=""/><br>
          <span>Apellido paterno:</span><input type="text" required style="width:265px; height:30px;" name="apellido_p" placeholder=""/><br>
          <span>Telefono: </span><input type="phone" style="width:265px; height:30px;" name="telefono" size="10" maxlength="10" onkeypress="return aceptNum(event)" onpaste="return false;"/><br>
          <span>Fecha de nacimiento: </span><input type="date" required style="width:265px; height:30px;" name="fecha" placeholder=""/>
          <span>Tipo: </span><input type="text" required style="width:265px; height:30px;" name="tipo" placeholder=""/>
          <span>Sexo: </span><input type="text" required style="width:265px; height:30px;" name="sexo" placeholder=""/>

        </p>
    <p>Direccion</p>
         
     <?php
  require ('conexion.php');
  
  $query = "SELECT id_estado, estado FROM t_estado ORDER BY estado";
  $resultado=$mysqli->query($query);
?>

<html>
  <head>
    <title>ComboBox Ajax, PHP y MySQL</title>
    
    <script language="javascript" src="js/jquery-3.1.1.min.js"></script>
    
    <script language="javascript">
      $(document).ready(function(){
        $("#cbx_estado").change(function () {

          $('#cbx_localidad').find('option').remove().end().append('<option value="whatever"></option>').val('whatever');
          
          $("#cbx_estado option:selected").each(function () {
            id_estado = $(this).val();
            $.post("includes/getMunicipio.php", { id_estado: id_estado }, function(data){
              $("#cbx_municipio").html(data);
            });            
          });
        })
      });
      
      $(document).ready(function(){
        $("#cbx_municipio").change(function () {
          $("#cbx_municipio option:selected").each(function () {
            id_municipio = $(this).val();
            $.post("includes/getLocalidad.php", { id_municipio: id_municipio }, function(data){
              $("#cbx_localidad").html(data);
            });            
          });
        })
      });
    </script>
    
  </head>
  
  <body>
    <form id="combo" name="combo" action="guarda.php" method="POST">
      <div>Selecciona Estado : <select name="cbx_estado" id="cbx_estado">
        <option value="0">Seleccionar Estado</option>
        <?php while($row = $resultado->fetch_assoc()) { ?>
          <option value="<?php echo $row['id_estado']; ?>"><?php echo $row['estado']; ?></option>
        <?php } ?>
      </select></div>
      
      <br />
      
      <div>Selecciona Municipio : <select name="cbx_municipio" id="cbx_municipio"></select></div>
      
      <br />
      
      <div>Selecciona Localidad : <select name="cbx_localidad" id="cbx_localidad"></select></div>
      
      <br />
      
    </form>
  </body>
</html>

              <input type="text" required style="width:80px; height:30px;" name="cp" placeholder="CP" size="5" maxlength="5" onkeypress="return aceptNum(event)" onpaste="return false;"/>
              <input type="text" required style="width:265px; height:30px;" name="calle" placeholder="Calle"/>
              <input type="tel" required style="width:200px; height:30px;" name="no" placeholder="NO#" size="7" maxlength="7" onkeypress="return aceptNum(event)" onpaste="return false;"/>
              <input type="text" required style="width:200px; height:30px;" name="colonia" placeholder="Colonia"/>
    </p>
        <p><br>
  </p>
<div style="float:right; margin-right:10px;">
  <button class="btn btn-success btn-block btn-large" style="width:267px;"><i class="icon icon-save icon-large"></i> Guardar</button>
</div>
</div>
</form>


<script>
var nav4 = window.Event ? true : false;
function aceptNum(evt){
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key>= 48 && key <= 57));
}
</script>