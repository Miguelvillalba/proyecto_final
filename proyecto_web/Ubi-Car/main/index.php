<!DOCTYPE html>
<html>
<head>
<title>
</title>
 <link href="css/estilo1.css" rel="stylesheet">
  
  <link rel="stylesheet" href="css/f.min.css">
    <style type="text/css">
    
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
<link href="../style.css" media="screen" rel="stylesheet" type="text/css" />
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
<?php
	require_once('auth.php');
?>
</SCRIPT>	
</head>
<body>
<?php include('navfixed.php');?>
<?php
$position=$_SESSION['SESS_LAST_NAME'];
if($position=='cashier') {
?>
	<p>&nbsp;</p>
	<div class="container-fluid">
      <div class="row-fluid">
	<div class="span10"><font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;"><center>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	  <p>&nbsp;</p>
	</center></font>
<div id="mainmain">                     
<a href="customer.php"><i class="icon-group icon-2x"></i><br> Clientes</a>    

<?php
}
?>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
<p>
  <?php
if($position=='admin') {
?>
</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp; </p>
    <div class="container-fluid">
      <div class="row-fluid"><!--/span-->
	<div class="span10"><font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 25px #000; color:#fff;"><center></center></font>
<div id="mainmain">
    
<a href="customer.php"><i class="icon-group icon-2x"></i><br> 
Clientes</a>     
<a href="supplier.php"><i class="icon-group icon-2x"></i><br>
Autos</a>     

<?php
}
?>
<div class="clearfix"></div>
</div>
</div>
</div>
</div>
</body>

</html>
