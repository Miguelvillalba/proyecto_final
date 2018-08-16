<?php
	
	session_start();
	
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
<head>
<title>

</title>
    <link rel="shortcut icon" href="">

  <link href="main/css/estilo1.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="main/css/DT.css">
  
  <link rel="stylesheet" href="main/css/f.min.css">
    <style type="text/css">
      body {
        padding-top: 60px;
        padding-bottom: 40px;
      }
      .sidebar-nav {
        padding: 9px 0;
      }
    </style>
    <link href="main/css/responsivo.css" rel="stylesheet">

<link href="style.css" media="screen" rel="stylesheet" type="text/css" />
<style type="text/css">
a:link {
	color: #00CC00;
}
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>
    <div class="container-fluid">
      <div class="row-fluid">
		<div class="span4">
		</div>
	
</div>
<div id="login">
<?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
	foreach($_SESSION['ERRMSG_ARR'] as $msg) {
		echo '<div style="color: red; text-align: center;">',$msg,'</div><br>'; 
	}
	unset($_SESSION['ERRMSG_ARR']);
}
?>
<form action="login.php" method="post">

			<font style=" font:bold 44px 'Aleo'; text-shadow:1px 1px 15px #000; color:#fff;"><center></center></font>
		<br>

		
<div class="input-prepend">
		<span style="height:30px; width:25px;" class="add-on"><i class="icon-user icon-2x"></i></span><input style="height:40px;" type="text" name="username" Placeholder="Usuario" required/><br>
</div>
<div class="input-prepend">
	<span style="height:30px; width:25px;" class="add-on"><i class="icon-lock icon-2x"></i></span><input type="password" style="height:40px;" name="password" Placeholder="Password" required/><br>
		</div>
		<div class="qwe">
		 <button class="btn btn-large btn-primary btn-block pull-right" href="dashboard.html" type="submit"><i class="icon-signin icon-large"></i> Iniciar sesion</button>
</div>
		 </form>
</div>
</div>
</div>
</div>
</body>
</html>