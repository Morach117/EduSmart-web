<?php
include '../../conn.php';

if (isset($_GET['id'])) {
    $preguntaId = $_GET['id'];

    try {
        $stmt = $conn->prepare("DELETE FROM preguntas WHERE id_pregunta = :id");
        $stmt->bindParam(':id', $preguntaId);
        $stmt->execute();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'ID de pregunta no proporcionado']);
}
?>
