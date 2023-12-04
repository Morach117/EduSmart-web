<?php
include '../../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Función para limpiar y validar los datos
    function cleanInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    // Limpiar y validar los datos recibidos
    $preguntaId = cleanInput($_POST['preguntaId']);
    $enunciado = cleanInput($_POST['editEnunciado']);
    $tiempoRespuesta = cleanInput($_POST['editTime']);
    $incisoA = cleanInput($_POST['editA']);
    $incisoB = cleanInput($_POST['editB']);
    $incisoC = cleanInput($_POST['editC']);
    $incisoD = cleanInput($_POST['editD']);
    $respuesta = cleanInput($_POST['editRespuesta']);
    // Agrega más variables según tus necesidades para los demás campos

    try {
        $stmt = $conn->prepare("UPDATE preguntas SET enunciado = :enunciado, tiempo_respuesta = :tiempoRespuesta, 
                                inciso_a = :incisoA, inciso_b = :incisoB, inciso_c = :incisoC, inciso_d = :incisoD, 
                                respuesta = :respuesta WHERE id_pregunta = :id");

        $stmt->bindParam(':id', $preguntaId);
        $stmt->bindParam(':enunciado', $enunciado);
        $stmt->bindParam(':tiempoRespuesta', $tiempoRespuesta);
        $stmt->bindParam(':incisoA', $incisoA);
        $stmt->bindParam(':incisoB', $incisoB);
        $stmt->bindParam(':incisoC', $incisoC);
        $stmt->bindParam(':incisoD', $incisoD);
        $stmt->bindParam(':respuesta', $respuesta);
        // Agrega más bindParam según tus necesidades para los demás campos

        $stmt->execute();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}
?>
