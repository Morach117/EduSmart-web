<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include('../../conn.php'); // Incluye el archivo de conexión a la base de datos

    // Recopila los datos del formulario
    $nombreEquipo = $_POST['nombreEquipo'];
    $integrantesEquipo = $_POST['integrantesEquipo'];
    $alumnosSeleccionados = $_POST['alumnosSeleccionados'];

    // Realiza la inserción del equipo en la tabla de equipos (ajusta la consulta SQL según tu estructura)
    $queryInsertEquipo = "INSERT INTO equipos (nombre_equipo, numero_integrantes) VALUES (:nombreEquipo, :integrantesEquipo)";
    $stmtInsertEquipo = $conn->prepare($queryInsertEquipo);
    $stmtInsertEquipo->bindParam(':nombreEquipo', $nombreEquipo, PDO::PARAM_STR);
    $stmtInsertEquipo->bindParam(':integrantesEquipo', $integrantesEquipo, PDO::PARAM_STR);
    
    if ($stmtInsertEquipo->execute()) {
        // Obtiene el ID del equipo insertado
        $equipoId = $conn->lastInsertId();
    
        // Recorre los IDs de los alumnos seleccionados y realiza la inserción en la tabla de relación equipos_alumnos (ajusta la consulta SQL según tu estructura)
        foreach ($alumnosSeleccionados as $alumnoId) {
            $queryInsertEquipoAlumno = "INSERT INTO equipoxalumno (id_equipo, id_alumno) VALUES (:equipoId, :alumnoId)";
            $stmtInsertEquipoAlumno = $conn->prepare($queryInsertEquipoAlumno);
            $stmtInsertEquipoAlumno->bindParam(':equipoId', $equipoId, PDO::PARAM_INT);
            $stmtInsertEquipoAlumno->bindParam(':alumnoId', $alumnoId, PDO::PARAM_INT);
            $stmtInsertEquipoAlumno->execute();
        }
    
        $response = array('success' => true, 'message' => 'Equipo guardado correctamente.');
        echo json_encode($response);
    } else {
        $response = array('success' => false, 'message' => 'Error al guardar el equipo.');
        echo json_encode($response);
    }
    
} else {
    // Maneja la solicitud incorrecta
    http_response_code(400);
    $response = array('success' => false, 'message' => 'Solicitud incorrecta');
    echo json_encode($response);
}
?>
