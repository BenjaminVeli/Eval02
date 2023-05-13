<?php
// Conexión a la base de datos
$conn = mysqli_connect("localhost", "root", "", "Eval02");

// Verificar la conexión
if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Procesar el formulario de búsqueda
if (isset($_GET['busqueda'])) {
    $busqueda = $_GET['busqueda'];

    // Consulta SQL para buscar coincidencias en la base de datos
    $query = "SELECT * FROM Producto WHERE nombre LIKE '%$busqueda%' OR Descripcion LIKE '%$busqueda%'";
    $result = mysqli_query($conn, $query);

    // Mostrar los resultados de la búsqueda
    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Resultados de la búsqueda:</h2>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<p>Nombre: " . $row['Nombre'] . "</p>";
            echo "<p>Descripción: " . $row['Descripcion'] . "</p>";
            echo "<p>Stock: " . $row['Stock'] . "</p>";
            echo "<p>Precio de venta: " . $row['PrecioVenta'] . "</p>";
            echo "<hr>";
        }
    } else {
        echo "<p>No se encontraron resultados.</p>";
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
    <title>Buscar productos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 50px;
            text-align: center;
        }
        form {
            display: inline-block;
        }
        input[type="text"] {
            width: 200px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            border: none;
            color: #fff;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <form action="" method="GET">
        <input type="text" name="busqueda" placeholder="Buscar productos">
        <input type="submit" value="Buscar" class="btn btn-primary">
    </form>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


