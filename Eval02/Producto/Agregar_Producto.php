<?php

include('ConexionBD.php');

//obtenemos los valores del formulario
$Nombre = $_POST['Nombre'];
$Descripcion = $_POST['Descripcion'];
$Stock =$_POST['Stock'];
$PrecioVenta =$_POST['PrecioVenta'];

//abrimos la conexion de la base de datos

$conexion = Conectar();

//consultar a la base de datos
$query = $conexion->prepare("INSERT INTO Producto (Nombre, Descripcion, Stock, PrecioVenta) VALUES (?, ?, ?, ?)");
$query ->bind_param('ssss', $Nombre, $Descripcion, $Stock, $PrecioVenta);
$msg = '';
if ($query ->execute()){
    header("location: index.php");
    $msg = 'Producto registrado';
}
else{
    $msg= 'No se pudo registrar al Producto';
}
//cerramos la conexion a la base de datos
Desconectar($conexion)
?>

