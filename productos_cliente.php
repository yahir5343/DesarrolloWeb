<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1>Productos Disponibles</h1>
    <div class="productos">
        <!-- Supongamos que tienes un array con los productos y sus existencias -->
        <?php
        $productos = array(
            array('nombre' => 'Producto 1', 'precio' => 10, 'existencias' => 20),
            array('nombre' => 'Producto 2', 'precio' => 15, 'existencias' => 15),
            array('nombre' => 'Producto 3', 'precio' => 20, 'existencias' => 10),
            // Agrega más productos según sea necesario
        );

        // Mostrar los productos en forma de lista
        foreach ($productos as $producto) {
            echo '<div class="producto">';
            echo '<p>' . $producto['nombre'] . ' - $' . $producto['precio'] . ' - Existencias: ' . $producto['existencias'] . '</p>';
            // Agregar un campo para seleccionar la cantidad de este producto
            echo '<input type="number" id="cantidad_' . str_replace(' ', '_', $producto['nombre']) . '" min="1" max="' . $producto['existencias'] . '" value="1">';
            // Agregar un botón para agregar este producto al carrito
            echo '<button onclick="agregarAlCarrito(\'' . $producto['nombre'] . '\', ' . $producto['precio'] . ', ' . $producto['existencias'] . ')">Agregar al carrito</button>';
            echo '</div>';
        }
        ?>
    </div>
    <!-- Espacio entre los botones -->
    <div style="margin-top: 20px;"></div>
    <!-- Botón para proceder al pago -->
    <div class="boton-pago">
        <button onclick="procederAlPago()">Proceder al Pago</button>
    </div>

    <!-- Espacio entre los botones -->
    <div style="margin-top: 20px;"></div>

    <!-- Botón para regresar al formulario de inicio de sesión -->
    <div class="boton-regresar">
        <button onclick="regresarAlInicio()">Cerrar Sesión</button>
    </div>

    <!-- Script JavaScript para agregar productos al carrito y proceder al pago -->
    <script>
        var carrito = []; // Array para almacenar los productos agregados al carrito

        function agregarAlCarrito(nombre, precio, existencias) {
            var cantidad = document.getElementById('cantidad_' + nombre.replace(/ /g, '_')).value;
            if (parseInt(cantidad) <= existencias) {
                carrito.push({ nombre: nombre, precio: precio, cantidad: cantidad });
                alert(cantidad + ' ' + nombre + '(s) agregado(s) al carrito.');
            } else {
                alert('La cantidad seleccionada excede las existencias disponibles.');
            }
        }

        function procederAlPago() {
            // Aquí puedes implementar la lógica para proceder al pago
            if (carrito.length > 0) {
                // Redirigir a la página de total del cliente para mostrar el total a pagar
                window.location.href = 'total_cliente.php?productos=' + JSON.stringify(carrito);
            } else {
                alert('Por favor, seleccione al menos un producto para proceder al pago.');
            }
        }

        function regresarAlInicio() {
            // Redirigir al formulario de inicio de sesión (index.php)
            window.location.href = 'index.php';
        }
    </script>
</body>
</html>
