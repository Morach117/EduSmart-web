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
    $alumnoId = cleanInput($_POST['alumnoId']);
    $nombre = cleanInput($_POST['editNombre']);
    $app = cleanInput($_POST['editApp']);
    $apm = cleanInput($_POST['editApm']);
    $telefono = cleanInput($_POST['editTelefono']);
    // Agrega más variables según tus necesidades para los demás campos

    try {
        $stmt = $conn->prepare("UPDATE alumnos SET nombre = :nombre, app = :app, apm = :apm, telefono = :telefono WHERE id_alumno = :id");
        $stmt->bindParam(':id', $alumnoId);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':app', $app);
        $stmt->bindParam(':apm', $apm);
        $stmt->bindParam(':telefono', $telefono);
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
