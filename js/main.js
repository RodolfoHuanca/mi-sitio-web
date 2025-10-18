

document.addEventListener('DOMContentLoaded', function() {
    
    // =================================================================
    // 1. Efecto Dinámico en index.html (Requisito 1.3)
    // =================================================================

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
        rotarFrase(); // Llama inmediatamente para mostrar la primera frase
    }


    // =================================================================
    // 2. Validación de Formulario en contact.html (Requisito 4)
    // =================================================================

    const form = document.getElementById('contactForm');
    
    if (form) {
        form.addEventListener('submit', function(event) {
            
            // Detiene el envío por defecto si hay campos inválidos
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            } else {
                // Si la validación es exitosa, muestra una alerta y detiene el envío real
                event.preventDefault();
                alert('Mensaje enviado con éxito (simulado). Gracias por contactarme.');
                form.reset(); // Limpia el formulario
            }

            // Agrega la clase de validación de Bootstrap para mostrar mensajes de error
            form.classList.add('was-validated');
        }, false);
    }
});