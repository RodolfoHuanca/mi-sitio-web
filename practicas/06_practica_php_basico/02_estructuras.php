<?php
// 1. Arreglos (Listas de cosas)
$tecnologias = ["HTML", "CSS", "JavaScript", "PHP", "MySQL"];

echo "<h3>Lista de Tecnologías a aprender:</h3>";

echo "<ul>"; // Abrimos una lista desordenada HTML

// 2. Bucle FOREACH (El mejor amigo del programador PHP)
// Recorre cada elemento de la lista uno por uno
foreach ($tecnologias as $tech) {
    // Si es PHP, lo ponemos en negrita (Condicional IF)
    if ($tech == "PHP") {
        echo "<li><strong>$tech (¡Estamos aquí!)</strong></li>";
    } else {
        echo "<li>$tech</li>";
    }
}

echo "</ul>";
?>