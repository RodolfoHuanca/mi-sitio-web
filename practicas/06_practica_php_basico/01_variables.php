<?php
// 1. Declaración de variables (siempre con $)
$nombre = "Juan";
$edad = 25;
$altura = 1.75;
$es_estudiante = true;

// 2. Imprimir en pantalla (echo)
// El punto (.) se usa para unir (concatenar) texto con variables
echo "<h1>Hola, soy $nombre</h1>";
echo "Mi edad es " . $edad . " años.<br>";
echo "Mido " . $altura . " metros.<br>";

// 3. Operaciones simples
$edad_en_5_anos = $edad + 5;
echo "En 5 años tendré: $edad_en_5_anos años.";
?>