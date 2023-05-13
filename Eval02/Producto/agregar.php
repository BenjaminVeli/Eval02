<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }
        .card {
            max-width: 500px;
            margin: 0 auto;
            padding: 20px;
        }
        .btn-danger {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2 class="card-title text-center">Agregar Productos</h2>
            <form action="Agregar_Producto.php" method="post">
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre:</label>
                    <input type="text" name="Nombre" id="nombre" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="Descripcion" class="form-label">Descripción:</label>
                    <input type="text" name="Descripcion" id="descripcion" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="Stock" class="form-label">Stock:</label>
                    <input type="text" name="Stock" id="stock" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label for="PrecioVenta" class="form-label">Precio de Venta:</label>
                    <input type="text" name="PrecioVenta" id="precioventa" class="form-control" required>
                </div>
                <input class="btn btn-danger btn-block" name="Agregar" type="submit" value="Agregar producto">
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
