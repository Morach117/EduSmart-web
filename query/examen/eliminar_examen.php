<?php

// Incluir la conexión a la base de datos
include('../../conn.php');
// Verificar si se recibió el parámetro 'id' a través de GET
if (isset($_GET['id'])) {
    // Obtener el id del examen desde la solicitud
    $examenId = $_GET['id'];

    // Realizar las operaciones necesarias para eliminar el examen con el id proporcionado
    // Puedes usar consultas SQL y PDO, por ejemplo
    try {
        // Tu consulta SQL para eliminar el examen
        $query = "DELETE FROM examenes WHERE id_examen = :examenId";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':examenId', $examenId, PDO::PARAM_INT);
        $stmt->execute();

        // Envía una respuesta JSON de éxito
        echo json_encode(['success' => true]);
    } catch (PDOException $e) {
        // Envía una respuesta JSON de error si hay un problema con la base de datos
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    // Envía una respuesta JSON de error si no se proporcionó el parámetro 'id'
    echo json_encode(['success' => false, 'error' => 'ID de examen no proporcionado']);
}
?>
