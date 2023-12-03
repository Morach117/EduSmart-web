<?php
include '../../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtén el id del docente del formulario
    $docenteId = $_POST['docenteId'];

    // Limpiar y validar los datos del formulario
    $nombreMateria = htmlspecialchars($_POST['name']);

    // Manejo de la imagen
    $rutaImagen = '';
    if (isset($_FILES['cover']) && $_FILES['cover']['error'] === UPLOAD_ERR_OK) {
        $directorioDestino = '../../files/uploads/';
        $nombreArchivo = uniqid('cover_', true) . '_' . $_FILES['cover']['name'];
        $rutaImagen = $directorioDestino . $nombreArchivo;
        
        move_uploaded_file($_FILES['cover']['tmp_name'], $rutaImagen);
        
    }

    try {
        // Insertar los datos en la tabla de materias
        $stmt = $conn->prepare("INSERT INTO materias (nombre_materia, img, id_docente) VALUES (:nombre, :img, :id_docente)");
        $stmt->bindParam(':nombre', $nombreMateria);
        $stmt->bindParam(':img', $rutaImagen);
        $stmt->bindParam(':id_docente', $docenteId);

        $stmt->execute();

        echo json_encode(['success' => true]);
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método no permitido']);
}
?>
