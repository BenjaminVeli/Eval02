<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="../style/estilos.css">
</head>

<body>
        <div class="card-body">
            <a href="agregar.php" class="btn btn-danger d-grid gap-2 col-2 mx-auto mb-3 mt-5">Agregar productos</a>
            <a href="Buscador.php" class="btn btn-danger d-grid gap-2 col-2 mx-auto mb-5">Buscar productos</a>
        </div>


    <div class="container bg-light ">
        <h1 class="text-center">Lista de productos</h1>
        <table class="table">
            <thead class="table-dark">
                <tr> 
                    <th scope="col">Producto_id</th>  
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Stock</th>
                    <th scope="col">PrecioVenta</th>
                    <th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "ConexionBD.php";

                $conex = Conectar();
                $sql2 = "SELECT * FROM Producto";
                $query2 = mysqli_query($conex, $sql2);


                while ($fila = mysqli_fetch_array($query2)) {
                ?>
                    <tr>
                        <td><?php echo $fila['Producto_id'] ?></td>
                        <td><?php echo $fila['Nombre'] ?></td>
                        <td><?php echo $fila['Descripcion'] ?></td>
                        <td><?php echo $fila['Stock'] ?></td>
                        <td><?php echo $fila['PrecioVenta'] ?></td>
                        <td>
                            <a class="btn btn-dark" href="Editar_Producto.php?id=<?php echo $fila['Producto_id']?>">Editar</a>
                            <a href="Eliminar_Producto.php?id=<?php echo $fila['Producto_id']?>" class="btn btn-success">Eliminar</a>
                        </td>
                    </tr>
                <?php
                }
                Desconectar($conex);
                ?>
            </tbody>
        </table>
    </div>


</body>

</html>

