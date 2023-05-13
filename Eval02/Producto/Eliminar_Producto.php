<?php
include("ConexionBD.php");

$conexion = Conectar();

$A = $_REQUEST['id'];
$sql = "DELETE FROM Producto WHERE Producto_id='$A'";
$query = mysqli_query($conexion,$sql);

if ($query){
    header("location: index.php");
}
?>