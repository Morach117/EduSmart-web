<?php

// conexión a la base de datos
include '../../conn.php';

// Verificar si se recibieron datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario y realizar saneamiento
    $idDocente = filter_input(INPUT_POST, 'id_docente', FILTER_SANITIZE_NUMBER_INT);
    $idMateria = filter_input(INPUT_POST, 'materia', FILTER_SANITIZE_NUMBER_INT);
    $idUnidad = filter_input(INPUT_POST, 'unidad', FILTER_SANITIZE_NUMBER_INT);
    $tipoExamen = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
    $fechaExamen = filter_input(INPUT_POST, 'fecha', FILTER_SANITIZE_STRING);

    // Validar los datos (puedes agregar más validaciones según tus necesidades)
    if (empty($idDocente) || empty($idMateria) || empty($idUnidad) || empty($tipoExamen) || empty($fechaExamen)) {
        echo json_encode(['success' => false, 'message' => 'Todos los campos son obligatorios']);
        exit;
    }

    // Realizar la inserción en la base de datos (debes adaptarla según tu estructura)
    $stmt = $conn->prepare("INSERT INTO examenes (id_docente, id_materia, id_unidad, tipo_examen, fecha_examen) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$idDocente, $idMateria, $idUnidad, $tipoExamen, $fechaExamen]);

    // Enviar respuesta al cliente (puedes personalizar el mensaje según tus necesidades)
    echo json_encode(['success' => true, 'message' => 'Examen insertado correctamente']);
} else {
    // Enviar respuesta al cliente en caso de que la solicitud no sea POST
    echo json_encode(['success' => false, 'message' => 'Método no permitido']);
}
?>
