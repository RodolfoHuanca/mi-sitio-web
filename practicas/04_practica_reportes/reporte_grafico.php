<?php
require('conexion.php');
$nombres = [];
$notas = [];

$consulta = "SELECT nombre, nota FROM alumnos";
$resultado = $mysqli->query($consulta);

while($row = $resultado->fetch_assoc()){
    $nombres[] = $row['nombre'];
    $notas[] = $row['nota'];
}

$json_nombres = json_encode($nombres);
$json_notas = json_encode($notas);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gráfico de Notas</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body { font-family: sans-serif; text-align: center; padding: 20px; }
        .contenedor-grafico { width: 60%; margin: auto; }
    </style>
</head>
<body>

    <h1>Promedio de Notas de Alumnos</h1>
    
    <div class="contenedor-grafico">
        <canvas id="miGrafico"></canvas>
    </div>

    <script>
        const ctx = document.getElementById('miGrafico');

        new Chart(ctx, {
            type: 'bar', 
            data: {
                labels: <?php echo $json_nombres; ?>, 
                datasets: [{
                    label: 'Nota Final',
                    data: <?php echo $json_notas; ?>, 
                    borderWidth: 1,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)', 
                    borderColor: 'rgba(54, 162, 235, 1)'
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        max: 20 
                    }
                }
            }
        });
    </script>
</body>
</html>