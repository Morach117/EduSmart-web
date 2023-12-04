<?php
// obtener_unidades.php

// Incluir el archivo de conexión a la base de datos
include '../../conn.php';

try {
    // Obtener el ID de la materia enviado desde la solicitud AJAX
    $idMateria = $_GET['id_materia'];

    // Consulta para obtener las unidades de la materia seleccionada
    $query = $conn->prepare("SELECT * FROM unidades_tematicas WHERE id_materia = :id_materia");
    $query->bindParam(':id_materia', $idMateria, PDO::PARAM_INT);
    $query->execute();

    // Obtener y devolver las unidades en formato JSON
    $unidades = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($unidades);
} catch (PDOException $e) {
    // Manejar errores de conexión o consulta
    echo "Error: " . $e->getMessage();
}

// Cerrar la conexión a la base de datos (si es necesario)
// No es necesario en este caso porque PHP cerrará automáticamente la conexión al finalizar el script
// $conn = null;
?>
