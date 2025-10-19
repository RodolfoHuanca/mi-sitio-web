

document.addEventListener('DOMContentLoaded', function() {
    
    // ==================================
    // 1. Efecto Dinámico en index.html 
    // ==================================

    // Función para actualizar la hora actual
    function actualizarHora() {
        const elementoHora = document.getElementById('hora-actual');
        if (elementoHora) {
            const ahora = new Date();
            // Formato de hora: HH:MM:SS
            elementoHora.textContent = 'Hora actual: ' + ahora.toLocaleTimeString();
        }
    }

    // Actualiza la hora cada segundo (1000 milisegundos)
    setInterval(actualizarHora, 1000);

    // *Opcional: Rotar frases motivadoras*
    const frases = [
        "El código es poesía.",
        "Siempre aprendiendo, siempre mejorando.",
        "Transformando ideas en realidad digital.",
        "Desarrollo web con pasión y precisión."
    ];

    const elementoFrase = document.getElementById('frase-dinamica');
    if (elementoFrase) {
        let indiceActual = 0;
        
        function rotarFrase() {
            elementoFrase.textContent = frases[indiceActual];
            indiceActual = (indiceActual + 1) % frases.length;
        }

        // Cambia la frase cada 5 segundos
        setInterval(rotarFrase, 5000);
        rotarFrase(); 
    }


});