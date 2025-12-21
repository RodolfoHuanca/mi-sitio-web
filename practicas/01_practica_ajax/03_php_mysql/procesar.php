<?php
$mysqli = new mysqli("localhost", "root", "", "ajaxbd", 3307);

if ($mysqli->connect_errno) {
    die("Error de conexión a MySQL: " . $mysqli->connect_error);
}
// Recibimos datos del formulario enviados por POST
$nombres  = $_POST['nombres']; 
$apellidos = $_POST['apellidos']; 
// Consulta SQL para insertar los datos
$sql = "INSERT INTO personas(nombres,apellidos) 
        VALUES('{$nombres}','{$apellidos}')"; 
// Ejecución de la consulta y manejo de errores
if(!$mysqli->query($sql)){
    die("Error al guardar: " . $mysqli->error);
}
die("Guardado con exito");
?>