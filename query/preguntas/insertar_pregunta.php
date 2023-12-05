<?php
// insertar_pregunta.php

// Incluye la conexión a la base de datos
include '../../conn.php';

// Función para limpiar y validar datos del formulario
function limpiarInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Verifica si se recibieron datos por POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        // Recupera y limpia los datos del formulario
        $id_unidad = limpiarInput($_POST['id_unidad']);
        $id_examen = limpiarInput($_POST['id_examen']);
        $enunciado = limpiarInput($_POST['Enunciado']);
        $tiempo_respuesta = limpiarInput($_POST['time']);
        $inciso_a = limpiarInput($_POST['a']);
        $inciso_b = limpiarInput($_POST['b']);
        $inciso_c = limpiarInput($_POST['c']);
        $inciso_d = limpiarInput($_POST['d']);
        $respuesta = limpiarInput($_POST['respuesta']);

        // Validación adicional de datos según tus necesidades
        // ...

        // Manejo del archivo
        $multimedia = null;

        if (isset($_FILES['multimedia']) && $_FILES['multimedia']['error'] === UPLOAD_ERR_OK) {
            // Ruta donde se guardarán los archivos subidos
            $carpeta_destino = '../../files/uploads/';  // Cambia 'ruta/donde/guardar' con la ruta deseada

            // Genera un nombre único para el archivo
            $nombre_archivo = uniqid('archivo_', true) . '_' . $_FILES['multimedia']['name'];

            // Ruta completa donde se guardará el archivo
            $ruta_archivo = $carpeta_destino . $nombre_archivo;

            // Verifica el tipo de archivo (puedes ampliar esta verificación según tus necesidades)
            $tipo_archivo = $_FILES['multimedia']['type'];
            $extensiones_permitidas = ['image/jpeg', 'image/png', 'application/pdf']; // Ejemplo de extensiones permitidas

            if (!in_array($tipo_archivo, $extensiones_permitidas)) {
                throw new Exception("Tipo de archivo no permitido");
            }

            // Mueve el archivo de la ubicación temporal a la carpeta de destino
            if (!move_uploaded_file($_FILES['multimedia']['tmp_name'], $ruta_archivo)) {
                throw new Exception("Error al subir el archivo");
            }

            // Almacena la ruta del archivo en la variable $multimedia
            $multimedia = $ruta_archivo;
        }

        // Prepara la consulta SQL
        $stmt = $conn->prepare("INSERT INTO preguntas 
            (id_unidad, id_examen, enunciado, tiempo_respuesta, inciso_a, inciso_b, inciso_c, inciso_d, respuesta, multimedia) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Ejecuta la consulta
        $stmt->execute([$id_unidad, $id_examen, $enunciado, $tiempo_respuesta, $inciso_a, $inciso_b, $inciso_c, $inciso_d, $respuesta, $multimedia]);

        // Devuelve una respuesta JSON para manejar en el frontend
        echo json_encode(['status' => 'success', 'message' => 'Pregunta agregada correctamente']);
    } catch (Exception $e) {
        // Si hay un error, devuelve una respuesta JSON con el mensaje de error
        echo json_encode(['status' => 'error', 'message' => 'Error al agregar la pregunta: ' . $e->getMessage()]);
    }
} else {
    // Si no se recibieron datos por POST, devuelve un error
    echo json_encode(['status' => 'error', 'message' => 'Error: No se recibieron datos por POST']);
}
?>
