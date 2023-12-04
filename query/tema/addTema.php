<?php
include '../../conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $id_unidad = $_POST['unidad'];
    $materia = $_POST['id_materia']; // Nombre actualizado del campo según el formulario
    $nombre = $_POST['nombre_tema'];

    try {
        // Preparar la consulta SQL para insertar datos en la tabla
        $sql = "INSERT INTO TEMA (id_unidad, materia, nombre) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);

        // Ejecutar la consulta
        $stmt->execute([$id_unidad, $materia, $nombre]);

        echo "Tema añadido correctamente";
    } catch (PDOException $e) {
        echo "Error al añadir el tema: " . $e->getMessage();
    }
} else {
    echo "Método no permitido";
}
?>
