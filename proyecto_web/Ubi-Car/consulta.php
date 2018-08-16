<?php
$response = array();
include 'db/db_connect.php';
include 'functions.php';
       
    $sql_query = "SELECT Nombre,Password FROM Usuario WHERE Usuario = ?";
    $result = mysqli_query($connection, $sql_query);
    $rows = array();
while($r = mysqli_fetch_assoc($result)) {
  $rows[] = $r;
}
print json_encode($rows);
?>

