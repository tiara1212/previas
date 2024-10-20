function filtrarCursos() {
    const curso = document.getElementById('curso').value;
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', `filterCurso.php?curso=${curso}`, true);
    xhr.onload = function() {
        if (this.status === 200) {
            const alumnos = JSON.parse(this.responseText);
            const resultado = document.getElementById('resultado');
            resultado.innerHTML = ''; // Limpiar y restablecer

            if (alumnos.length === 0) {
                resultado.innerHTML = '<tr><td colspan="2">No hay alumnos en este curso.</td></tr>';
            } else if (alumnos.length === 1) {
                const alumno = alumnos[0];
                const row = document.createElement('tr');
                row.innerHTML = `<td class="dni">${alumno.dni}</td><td>${alumno.nombre}</td><td>${alumno.apellido}</td><td>${alumno.correo}</td><td><button onclick="copiarDNI(this)">Copy</button></td>`;
                resultado.appendChild(row);
            } else {
                alumnos.forEach(alumno => {
                    const row = document.createElement('tr');
                    row.innerHTML = `<td class="dni">${alumno.dni}</td><td>${alumno.nombre}</td><td>${alumno.apellido}</td><td>${alumno.correo}</td><td><button onclick="copiarDNI(this)">Copy</button></td>`;
                    resultado.appendChild(row);
                });
            }
        }
    };
    xhr.send();
}   

function copiarDNI(button) {
    // Encuentra el elemento <td> que contiene el DNI
    const dniElement = button.closest('tr').querySelector('.dni');
    const dni = dniElement.innerText; // Obtener el texto del DNI
    
    navigator.clipboard.writeText(dni)
    .then(() => {
        // Cambiar el estilo del botón para indicar que se copió
        button.style.backgroundColor = 'green';
        button.style.color = 'white';
        button.innerText = '¡Copiado!';
        
        // Restaurar el botón después de 2 segundos
        setTimeout(() => {
            button.style.backgroundColor = '';
            button.style.color = '';
            button.innerText = 'Copiar DNI';
        }, 2000);
    })
    .catch(err => {
        console.error('Error al copiar el DNI: ', err);
    });
}