<?php
// Usamos $_POST porque el formulario tiene method="POST"
// Si usaras method="GET", aquí usarías $_GET

$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$curso = $_POST['selCurso'];

echo "<h1>¡Registro Recibido!</h1>";
echo "El estudiante <strong>$nombre $apellido</strong> ";
echo "se ha inscrito correctamente al curso de <span style='color:red'>$curso</span>.";

echo "<br><br>";
echo "<a href='formulario.html'>Volver al formulario</a>";
?>