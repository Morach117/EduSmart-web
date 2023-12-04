<?php
// insertar_pregunta.php

// Incluye la conexión a la base de datos
include '../../conn.php';

// Verifica si se recibieron datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recupera los datos del formulario
    $id_unidad = $_POST['id_unidad'];
    $id_examen = $_POST['id_examen'];
    $enunciado = $_POST['Enunciado'];
    $tiempo_respuesta = $_POST['time'];
    $inciso_a = $_POST['a'];
    $inciso_b = $_POST['b'];
    $inciso_c = $_POST['c'];
    $inciso_d = $_POST['d'];
    $respuesta = $_POST['respuesta'];

    // Manejo del archivo
    $multimedia = null;

    if (isset($_FILES['multimedia']) && $_FILES['multimedia']['error'] === UPLOAD_ERR_OK) {
        // Ruta donde se guardarán los archivos subidos
        $carpeta_destino = '../../files/uploads/';  // Cambia 'ruta/donde/guardar' con la ruta deseada

        // Genera un nombre único para el archivo
        $nombre_archivo = uniqid('archivo_', true) . '_' . $_FILES['multimedia']['name'];

        // Ruta completa donde se guardará el archivo
        $ruta_archivo = $carpeta_destino . $nombre_archivo;

        // Mueve el archivo de la ubicación temporal a la carpeta de destino
        move_uploaded_file($_FILES['multimedia']['tmp_name'], $ruta_archivo);

        // Almacena la ruta del archivo en la variable $multimedia
        $multimedia = $ruta_archivo;
    }

    try {
        // Prepara la consulta SQL
        $stmt = $conn->prepare("INSERT INTO preguntas 
            (id_unidad, id_examen, enunciado, tiempo_respuesta, inciso_a, inciso_b, inciso_c, inciso_d, respuesta, multimedia) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Ejecuta la consulta
        $stmt->execute([$id_unidad, $id_examen, $enunciado, $tiempo_respuesta, $inciso_a, $inciso_b, $inciso_c, $inciso_d, $respuesta, $multimedia]);

        // Devuelve una respuesta JSON para manejar en el frontend
        echo json_encode(['status' => 'success', 'message' => 'Pregunta agregada correctamente']);
    } catch (PDOException $e) {
        // Si hay un error, devuelve una respuesta JSON con el mensaje de error
        echo json_encode(['status' => 'error', 'message' => 'Error al agregar la pregunta: ' . $e->getMessage()]);
    }
} else {
    // Si no se recibieron datos por POST, devuelve un error
    echo json_encode(['status' => 'error', 'message' => 'Error: No se recibieron datos por POST']);
}
?>
