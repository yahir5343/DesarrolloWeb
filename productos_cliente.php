<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <!-- Enlace al archivo CSS -->
    <link rel="stylesheet" href="bootstrap.css">
    <style>
        .producto {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 20px;
            display: inline-block;
            width: 300px;
        }
        .producto img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .producto p {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<h1>Productos Disponibles</h1>
<div class="productos">
    <?php
    $productos = array(
        array('nombre' => 'Computadora', 'precio' => 15000, 'existencias' => 20, 'imagen' => 'computadora.jpg'),
        array('nombre' => 'Laptop', 'precio' => 10000, 'existencias' => 15, 'imagen' => 'laptop.jpg'),
        array('nombre' => 'Celular', 'precio' => 7000, 'existencias' => 10, 'imagen' => 'celular.jpg'),
        // Agrega más productos según sea necesario
    );

    foreach ($productos as $producto) {
        echo '<div class="producto">';
        echo '<img src="' . $producto['imagen'] . '" alt="' . $producto['nombre'] . '">';
        echo '<p><strong>' . $producto['nombre'] . '</strong></p>';
        echo '<p>Precio: $' . $producto['precio'] . '</p>';
        echo '<p>Existencias: ' . $producto['existencias'] . '</p>';
        echo '<input type="number" id="cantidad_' . str_replace(' ', '_', $producto['nombre']) . '" min="1" max="' . $producto['existencias'] . '" value="1">';
        echo '<button onclick="agregarAlCarrito(\'' . $producto['nombre'] . '\', ' . $producto['precio'] . ', ' . $producto['existencias'] . ', \'' . $producto['imagen'] . '\')">Agregar al carrito</button>';
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

    function agregarAlCarrito(nombre, precio, existencias, imagen) {
        var cantidad = document.getElementById('cantidad_' + nombre.replace(/ /g, '_')).value;
        if (parseInt(cantidad) <= existencias) {
            carrito.push({ nombre: nombre, precio: precio, cantidad: cantidad, imagen: imagen });
            alert(cantidad + ' ' + nombre + '(s) agregado(s) al carrito.');
        } else {
            alert('La cantidad seleccionada excede las existencias disponibles.');
        }
    }

    function procederAlPago() {
        if (carrito.length > 0) {
            window.location.href = 'total_cliente.php?productos=' + JSON.stringify(carrito);
        } else {
            alert('Por favor, seleccione al menos un producto para proceder al pago.');
        }
    }

    function regresarAlInicio() {
        window.location.href = 'index.php';
    }
</script>
</body>
</html>
