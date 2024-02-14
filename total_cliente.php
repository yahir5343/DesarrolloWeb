<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total a Pagar</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Total a Pagar</h1>
<div class="carrito">
    <h2>Carrito de Compras</h2>
    <ul id="listaProductos">
        <?php
        // Verificar si se pasaron productos en la URL
        if (isset($_GET['productos'])) {
            // Obtener los productos del carrito desde la URL
            $productos = json_decode($_GET['productos'], true);

            // Mostrar los productos en el carrito
            foreach ($productos as $producto) {
                $precioBase = $producto['precio'];
                echo '<li>';
                // Mostrar la imagen del producto
                echo '<img src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '" width="100">';
                // Mostrar detalles del producto
                echo $producto['nombre'] . ' - Cantidad: ' . $producto['cantidad'] . ' - Precio Base: $' . $precioBase . ' - Total: $' . ($precioBase * $producto['cantidad']);
                echo '</li>';
            }

            // Calcular el total a pagar
            $total = 0;
            foreach ($productos as $producto) {
                $total += ($producto['precio'] * $producto['cantidad']);
            }
            echo '<h3>Total: $' . $total . '</h3>';
        } else {
            // Si no se pasaron productos en la URL, mostrar un mensaje de error
            echo '<p>No se encontraron productos en el carrito.</p>';
        }
        ?>
    </ul>
</div>

<!-- Botón para regresar al formulario de inicio de sesión -->
<div class="boton-regresar">
    <button onclick="regresarAlInicio()">Cerrar Sesión</button>
</div>

<!-- Script JavaScript para regresar al formulario de inicio de sesión -->
<script>
    function regresarAlInicio() {
        // Redirigir al formulario de inicio de sesión (index.php)
        window.location.href = 'index.php';
    }
</script>
</body>
</html>
