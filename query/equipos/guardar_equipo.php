<?php
// conexión a la base de datos
include '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        // Limpia y valida los datos del formulario
        $nombreEquipo = filter_input(INPUT_POST, "nombreEquipo", FILTER_SANITIZE_STRING);
        $integrantesEquipo = filter_input(INPUT_POST, "integrantesEquipo", FILTER_VALIDATE_INT);
        $idDocente = filter_input(INPUT_POST, "idDocente", FILTER_VALIDATE_INT);

        // Verifica que los datos no estén vacíos o sean inválidos
        if (empty($nombreEquipo) || $integrantesEquipo === false || $idDocente === false) {
            http_response_code(400);
            echo "Datos de formulario inválidos";
            exit;
        }

        // Inserta la información del equipo en la tabla 'equipos'
        $stmt = $conn->prepare("INSERT INTO equipos (nombre_equipo, numero_integrantes, id_docente) VALUES (?, ?, ?)");
        $stmt->execute([$nombreEquipo, $integrantesEquipo, $idDocente]);

        // Obtiene el ID del equipo recién insertado
        $equipoId = $conn->lastInsertId();

        // Inserta los alumnos seleccionados en la tabla 'equipoxalumno'
        if (isset($_POST["alumnos_seleccionados"]) && is_array($_POST["alumnos_seleccionados"])) {
            foreach ($_POST["alumnos_seleccionados"] as $alumnoId) {
                // Asegúrate de que $alumnoId sea un entero
                $alumnoId = filter_var($alumnoId, FILTER_VALIDATE_INT);
                if ($alumnoId !== false) {
                    // Realiza la inserción en la base de datos
                    $stmt = $conn->prepare("INSERT INTO equipoxalumno (id_alumno, id_equipo, id_docente) VALUES (?, ?, ?)");
                    $stmt->execute([$alumnoId, $equipoId, $idDocente]);
                }
            }
        }

        echo "Equipo creado correctamente!";
    } catch (Exception $e) {
        http_response_code(500);
        echo "Error al crear el equipo: " . $e->getMessage();
    }
} else {
    http_response_code(400);
    echo "Bad Request";
}
?>
