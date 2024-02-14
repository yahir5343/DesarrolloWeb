<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard del Administrador</title>
    <link rel="stylesheet" href="bootstrap.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    
</head>
<body>
    <h1>Dashboard del Administrador</h1>
    <div class="container">
        <div class="grafico-container">
            <canvas id="graficoVentas" width="500" height="250"></canvas>
        </div>

        <form action="index.php" method="post">
            <button type="submit">Cerrar Sesión</button>
        </form>

        <?php
            // Simulación de datos de ventas por mes (reemplazar con datos reales)
            $datosVentas = array(
                'Enero' => 65,
                'Febrero' => 59,
                'Marzo' => 80,
                'Abril' => 81,
                'Mayo' => 56,
                'Junio' => 55
            );

            // Convertir el array PHP a un array JavaScript
            $jsonVentas = json_encode($datosVentas);
        ?>

        <script>
            var datosVentas = <?php echo $jsonVentas; ?>;

            // Extracción de etiquetas y valores de ventas
            var meses = Object.keys(datosVentas);
            var ventas = Object.values(datosVentas);

            // Configuración de la gráfica de ventas
            var opcionesVentas = {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            };

            // Obtención del contexto del lienzo
            var ctx = document.getElementById('graficoVentas').getContext('2d');

            // Creación de la gráfica de barras
            var graficoVentas = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: meses,
                    datasets: [{
                        label: 'Ventas',
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 0,
                        data: ventas,
                    }]
                },
                options: opcionesVentas
            });
        </script>
    </div>
</body>
</html>
