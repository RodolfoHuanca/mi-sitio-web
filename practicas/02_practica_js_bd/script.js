// 1. Al cargar la página, mostramos los datos que ya existan
document.addEventListener("DOMContentLoaded", mostrarPersona);

// 2. FUNCIÓN PARA GUARDAR O ACTUALIZAR
function guardarDatos() {
    const id = document.getElementById("inputId").value;
    const nombres = document.getElementById("inputNombres").value;
    const apellidos = document.getElementById("inputApellidos").value;

    if (nombres === "" || apellidos === "") {
        alert("Por favor, complete todos los campos");
        return;
    }

    // Obtenemos la lista actual de la "base de datos" (LocalStorage)
    let personas = JSON.parse(localStorage.getItem("personas")) || [];

    if (id === "") {
        // MODO CREAR: Generamos un nuevo registro
        const nuevaPersona = {
            id: Date.now(), // Usamos la fecha actual como ID único
            p_nombres: nombres,
            p_apellidos: apellidos
        };
        personas.push(nuevaPersona);
    } else {
        // MODO EDITAR: Buscamos el registro y lo actualizamos
        personas = personas.map(p => {
            if (p.id == id) {
                return { ...p, p_nombres: nombres, p_apellidos: apellidos };
            }
            return p;
        });
        document.getElementById("inputId").value = ""; // Limpiamos el ID
    }

    // Guardamos la lista actualizada
    localStorage.setItem("personas", JSON.stringify(personas));
    
    // Limpiamos el formulario y refrescamos la tabla
    document.getElementById("inputNombres").value = "";
    document.getElementById("inputApellidos").value = "";
    mostrarPersona();
}

// 3. FUNCIÓN PARA MOSTRAR LOS DATOS (Lectura)
function mostrarPersona() {
    const tbody = document.getElementById("cuerpoTabla");
    tbody.innerHTML = "";

    const personas = JSON.parse(localStorage.getItem("personas")) || [];

    personas.forEach(persona => {
        tbody.innerHTML += `
            <tr>
                <td>${persona.id}</td>
                <td>${persona.p_nombres}</td>
                <td>${persona.p_apellidos}</td>
                <td>
                    <button class="btn-editar" onclick="prepararEdicion(${persona.id}, '${persona.p_nombres}', '${persona.p_apellidos}')">Editar</button>
                    <button class="btn-borrar" onclick="borrarPersona(${persona.id})">Borrar</button>
                </td>
            </tr>
        `;
    });
}

// 4. FUNCIÓN PARA BORRAR UN REGISTRO
function borrarPersona(id) {
    if (confirm("¿Está seguro de eliminar este registro?")) {
        let personas = JSON.parse(localStorage.getItem("personas")) || [];
        personas = personas.filter(p => p.id !== id);
        localStorage.setItem("personas", JSON.stringify(personas));
        mostrarPersona();
    }
}

// 5. FUNCIÓN PARA BORRAR TODO
function borrarTodo() {
    if (confirm("¿Seguro que quieres vaciar toda la base de datos?")) {
        localStorage.removeItem("personas");
        mostrarPersona();
    }
}

// 6. FUNCIÓN PARA CARGAR DATOS AL FORMULARIO PARA EDITAR
function prepararEdicion(id, nombres, apellidos) {
    document.getElementById("inputId").value = id;
    document.getElementById("inputNombres").value = nombres;
    document.getElementById("inputApellidos").value = apellidos;
}