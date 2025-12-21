<?php
require('conexion.php');

header("Content-Type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=reporte_alumnos.xls");

$consulta = "SELECT * FROM alumnos";
$resultado = $mysqli->query($consulta);
?>

<table border="1">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th>ID</th>
            <th>Nombre</th>
            <th>Asistencia (%)</th>
            <th>Nota Final</th>
        </tr>
    </thead>
    <tbody>
        <?php while($row = $resultado->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo utf8_decode($row['nombre']); ?></td>
                <td><?php echo $row['asistencia']; ?></td>
                <td><?php echo $row['nota']; ?></td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>