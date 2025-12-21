<?php
// 1. Conexión a la base de datos (USANDO PUERTO 3307)
// Ajustamos la conexión para usar el puerto 3307
$mysqli = new mysqli("localhost", "root", "", "ajaxbd", 3307);

// Manejo de errores de conexión
if ($mysqli->connect_errno) {
    die("Error de conexión a MySQL: " . $mysqli->connect_error);
}

// 2. Consultamos datos
$query = "SELECT * FROM personas";
$datos = [];

if ($result = $mysqli->query($query)) {
    // Recorremos los resultados
    while ($row = $result->fetch_assoc()) {
        // Almacenamos id, nombres, y apellidos en un array [cite: 364]
        $datos[] = [$row["id"], $row["nombres"], $row['apellidos']];
    }
    $result->free();
}

// 3. Devolvemos el array codificado como JSON
echo json_encode($datos);
?>