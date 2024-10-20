<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enviar gmail</title>
</head>
<body>
    <?php
        include "functions.php";
        $curso = "SELECT `id_año`, `año` FROM `año` WHERE 1"; 
        $gmails = "SELECT dni, `correo` FROM `alumnos` WHERE id_año = 1"; 
    ?>
    <header>

    </header>
    <main>
        <form action="enviar.php" method="post">
            <label for="curso">Curso del Alumno </label>
            <select name="curso" id="curso"  onchange="filtrarNombres()" required>
                <?php
                    options($curso);
                ?>
            </select>
            <label for="gmail">Gmail del alumno</label>
            <select name="gmail" id="gmail" disabled required>
                <?php
                    options($gmails);
                ?>
            </select>
            
            <label for="asunto">
                <textarea id="miTextarea" name="asunto" placeholder="Escribe tus comentarios aquí..." required></textarea>
            </label>

            <input type="submit">
        </form>
    </main>
    <footer>

    </footer>
    <script>
        function filtrarNombres() {
            const curso = document.getElementById('curso').value;
            const xhr = new XMLHttpRequest();
            xhr.open('GET', `filter.php?curso=${curso}`, true);
            xhr.onload = function() {
                if (this.status === 200) {
                    const alumnos = JSON.parse(this.responseText);
                    const selectNombres = document.getElementById('gmail');
                    selectNombres.disabled = false;
                    selectNombres.innerHTML = '<option value="" disabled selected>Seleccione un gmail</option>'; // Limpiar y restablecer

                    alumnos.forEach(alumno => {
                        const option = document.createElement('option');
                        option.value = alumno.correo; // Asigna el correo como valor
                        option.textContent = `${alumno.nombre} (${alumno.correo})`; // Muestra el nombre y el correo
                        selectNombres.appendChild(option);
                    });
                }
            };
            xhr.send();
        }   
    </script> 
</body>
</html>