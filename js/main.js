document.addEventListener("DOMContentLoaded", function() {
    
    // ===============================================
    // 1. TRANSICIÓN DE ENTRADA (FADE IN)
    // ===============================================
    // Apenas carga el DOM, agregamos la clase para que aparezca suavemente
    document.body.classList.add('fade-in');


    // ===============================================
    // 2. LÓGICA INTELIGENTE DEL SPLASH SCREEN (HOME)
    // ===============================================
    const overlay = document.getElementById('intro-overlay');
    const textReady = document.getElementById('text-ready');

    if (overlay) {
        const navigationEntry = performance.getEntriesByType("navigation")[0];
        const isReload = navigationEntry && navigationEntry.type === 'reload';
        const hasVisited = sessionStorage.getItem('introShown');

        // SI YA VISITÓ Y NO ES RECARGA -> OCULTAR SPLASH INMEDIATO
        if (!isReload && hasVisited) {
            overlay.style.display = 'none';
            startTypewriter();
        } else {
            // SI ES PRIMERA VEZ O F5 -> MOSTRAR ANIMACIÓN
            sessionStorage.setItem('introShown', 'true');
            runWelcomeAnimation(overlay, textReady);
        }
    } else {
        // Si no estamos en Home, arrancar typewriter si existe
        startTypewriter();
    }


    // ===============================================
    // 3. TRANSICIÓN DE SALIDA (FADE OUT AL CAMBIAR LINK)
    // ===============================================
    // Seleccionamos todos los links del menú y botones internos
    const links = document.querySelectorAll('a');

    links.forEach(link => {
        link.addEventListener('click', function(e) {
            const targetUrl = this.getAttribute('href');

            // Ignoramos si:
            // 1. Es un ancla interna (#contacto, #inicio)
            // 2. Es un link externo (http, https) que abre en otra pestaña
            // 3. No tiene href
            if (!targetUrl || targetUrl.startsWith('#') || targetUrl.startsWith('http') || this.target === '_blank') {
                return; 
            }

            // Si es un link interno (about.html, projects.html, etc.)
            e.preventDefault(); // 1. DETENEMOS la navegación brusca
            
            document.body.classList.remove('fade-in'); // 2. Desvanecemos la página actual

            // 3. Esperamos 500ms (lo que dura la transición CSS) y cambiamos
            setTimeout(() => {
                window.location.href = targetUrl;
            }, 500);
        });
    });


    // ===============================================
    // 4. LÓGICA DEL MENÚ ACTIVO
    // ===============================================
    const currentLocation = location.href;
    const menuItem = document.querySelectorAll('.navbar-pill a');
    const menuLength = menuItem.length;
    for (let i = 0; i < menuLength; i++) {
        // Comparación flexible para que funcione en local y servidor
        if (menuItem[i].href === currentLocation || currentLocation.includes(menuItem[i].getAttribute('href'))) {
            menuItem[i].classList.add("active");
        }
    }

});


// ===============================================
// FUNCIONES AUXILIARES (ANIMACIONES Y TEXTO)
// ===============================================

function runWelcomeAnimation(overlay, textReady) {
    setTimeout(() => { if(textReady) textReady.classList.add('show'); }, 3600);
    setTimeout(() => {
        overlay.classList.add('fade-out');
        setTimeout(startTypewriter, 500); 
    }, 4500);
}

// Variables Typewriter
const textsToType = ["Desarrollador Web", "Ingeniero de Sistemas", "Técnico en Computación"];
let textIndex = 0, charIndex = 0, isDeleting = false;
const typingElement = document.querySelector(".typing-text");

function startTypewriter() {
    if (typingElement) typeWriterLoop();
}

function typeWriterLoop() {
    const currentText = textsToType[textIndex];
    let typeSpeed = 100;

    if (isDeleting) {
        typingElement.textContent = currentText.substring(0, charIndex - 1);
        charIndex--;
        typeSpeed = 50;
    } else {
        typingElement.textContent = currentText.substring(0, charIndex + 1);
        charIndex++;
    }

    if (!isDeleting && charIndex === currentText.length) {
        isDeleting = true;
        typeSpeed = 2000;
    } else if (isDeleting && charIndex === 0) {
        isDeleting = false;
        textIndex++;
        if (textIndex >= textsToType.length) textIndex = 0;
        typeSpeed = 500;
    }
    setTimeout(typeWriterLoop, typeSpeed);
}