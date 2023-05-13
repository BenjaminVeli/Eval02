<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "Eval02");

// Verificar la conexión
if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

// Obtener el ID del producto a editar
$id = $_GET['id'];

// Obtener los datos actuales del producto
$query = "SELECT * FROM Producto WHERE Producto_id = $id";
$resultado = mysqli_query($conn, $query);
$Producto = mysqli_fetch_assoc($resultado);

// Comprobar si se envió el formulario de edición
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los nuevos datos del formulario
    $Nombre = $_POST['Nombre'];
    $Descripcion = $_POST['Descripcion'];
    $Stock = $_POST['Stock'];
    $PrecioVenta = $_POST['PrecioVenta'];

    // Actualizar los datos del producto en la base de datos
    $query = "UPDATE Producto SET Nombre = '$Nombre', Descripcion = '$Descripcion', Stock = $Stock, PrecioVenta = $PrecioVenta WHERE Producto_id = $id";
    if (mysqli_query($conn, $query)) {
        echo "Producto actualizado correctamente";
        // Redireccionar a la página de lista de productos o mostrar un mensaje de éxito
    } else {
        echo "Error al actualizar el producto: " . mysqli_error($conn);
    }
    if ($query){
        header("location: index.php");
    }
}

// Cerrar la conexión a la base de datos
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
        }
        .form-group label {
            font-weight: bold;
        }
        .btn-primary {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="text-center">Editar Producto</h1>
        <form method="POST">
            <div class="form-group">
                <label for="Nombre">Nombre:</label>
                <input type="text" class="form-control" name="Nombre" value="<?php echo $Producto['Nombre']; ?>">
            </div>
            
            <div class="form-group">
                <label for="Descripcion">Descripción:</label>
                <input type="text" class="form-control" name="Descripcion" value="<?php echo $Producto['Descripcion']; ?>">
            </div>
            
            <div class="form-group">
                <label for="Stock">Stock:</label>
                <input type="number" class="form-control" name="Stock" value="<?php echo $Producto['Stock']; ?>">
            </div>
            
            <div class="form-group">
                <label for="PrecioVenta">Precio de Venta:</label>
                <input type="number" step="0.01" class="form-control" name="PrecioVenta" value="<?php echo $Producto['PrecioVenta']; ?>">
            </div>
            
            <input type="submit" class="btn btn-primary btn-block" value="Guardar cambios">
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

