<?php
// $_GET es una variable super-global que lee la URL

// Verificamos si en la URL viene el dato "nombre"
// isset() pregunta: "¿Existe esta variable?"
$nombre = isset($_GET['nombre']) ? $_GET['nombre'] : "Visitante";
$edad = isset($_GET['edad']) ? $_GET['edad'] : "Desconocida";

echo "<h1>Bienvenido, $nombre</h1>";
echo "<p>Tu edad registrada es: $edad</p>";
?>