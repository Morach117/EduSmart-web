<?php
//conexion a la base de datos
include '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener datos del formulario
    $id_docente = $_POST['id_docente'];
    $id_alumnos = $_POST['id_alumno'];
    $materias = isset($_POST['materias']) ? $_POST['materias'] : [];

    try {
        // Iniciar la transacción
        $conn->beginTransaction();

        // Iterar sobre los alumnos y materias seleccionados
        foreach ($id_alumnos as $key => $id_alumno) {
            // Verificar si se ha seleccionado una materia para este alumno
            if (isset($materias[$key])) {
                $id_materia = $materias[$key];

                // Insertar la asignación en la tabla materiaxalumno
                $stmt = $conn->prepare("INSERT INTO materiaxalumno (id_docente, id_alumno, id_materia) VALUES (?, ?, ?)");
                $stmt->bindParam(1, $id_docente, PDO::PARAM_INT);
                $stmt->bindParam(2, $id_alumno, PDO::PARAM_INT);
                $stmt->bindParam(3, $id_materia, PDO::PARAM_INT);
                $stmt->execute();
            }
        }

        // Confirmar la transacción
        $conn->commit();

        // Respuesta para Ajax
        $response = array('status' => 'success', 'message' => 'Asignación exitosa.');
        echo json_encode($response);
    } catch (Exception $e) {
        // Revertir la transacción en caso de error
        $conn->rollBack();

        // Respuesta para Ajax
        $response = array('status' => 'error', 'message' => 'Error en la asignación: ' . $e->getMessage());
        echo json_encode($response);
    }
} else {
    // Respuesta para Ajax en caso de solicitud incorrecta
    $response = array('status' => 'error', 'message' => 'Solicitud incorrecta.');
    echo json_encode($response);
}
?>
