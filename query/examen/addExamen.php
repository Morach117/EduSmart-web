<?php

//conexion a la base de datos
include '../../conn.php';

// Verificar si se recibieron datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener datos del formulario
    $idDocente = $_POST['id_docente'];
    $idMateria = $_POST['materia'];
    $idUnidad = $_POST['unidad'];
    $tipoExamen = $_POST['tipo'];
    $fechaExamen = $_POST['fecha'];

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
