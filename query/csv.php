<?php
require('../conn.php');

// Agrega la condición para verificar si la solicitud es de tipo POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $tipo = $_FILES['dataCliente']['type'];
    $tamanio = $_FILES['dataCliente']['size'];
    $archivotmp = $_FILES['dataCliente']['tmp_name'];
    $lineas = file($archivotmp);

    $i = 0;

    foreach ($lineas as $linea) {
        $cantidad_registros = count($lineas);
        $cantidad_regist_agregados =  ($cantidad_registros - 1);

        if ($i != 0) {
            $datos = explode(",", $linea);

            $matricula = !empty($datos[0]) ? ($datos[0]) : '';
            $nombre = !empty($datos[1]) ? ($datos[1]) : '';
            $apellido_paterno = !empty($datos[2]) ? ($datos[2]) : '';
            $apellido_materno = !empty($datos[3]) ? ($datos[3]) : '';
            $correo = !empty($datos[4]) ? ($datos[4]) : '';
            $contrasena = !empty($datos[5]) ? password_hash($datos[5], PASSWORD_BCRYPT) : password_hash('EduSmart123', PASSWORD_BCRYPT); // Contraseña encriptada con Bcrypt
            $telefono = !empty($datos[6]) ? ($datos[6]) : '';
            $sexo = !empty($datos[7]) ? ($datos[7]) : '';
            $fecha_nacimiento = !empty($datos[8]) ? date('Y-m-d', strtotime($datos[8])) : null;

            // Validar los datos para evitar scripts maliciosos
            $matricula = preg_replace('/[^a-zA-Z0-9_\-]/', '', $matricula);
            $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
            $apellido_paterno = htmlspecialchars($apellido_paterno, ENT_QUOTES, 'UTF-8');
            $apellido_materno = htmlspecialchars($apellido_materno, ENT_QUOTES, 'UTF-8');
            $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);
            $telefono = preg_replace('/[^0-9]/', '', $telefono);
            $sexo = ($sexo === 'M' || $sexo === 'F') ? $sexo : '';

            if (!empty($matricula)) {
                $check_matricula_duplicidad = $conn->prepare("SELECT matricula FROM alumnos WHERE matricula = :matricula");
                $check_matricula_duplicidad->bindParam(':matricula', $matricula);
                $check_matricula_duplicidad->execute();
                $cant_duplicidad = $check_matricula_duplicidad->rowCount();
            }

            // No existe registros duplicados
            if ($cant_duplicidad == 0) {
                $insertarData = "INSERT INTO alumnos( 
                    matricula,
                    nombre,
                    app,
                    apm,
                    correo,
                    contrasena,
                    foto,
                    telefono,
                    sexo,
                    fecha_nac
                ) VALUES(
                    :matricula,
                    :nombre,
                    :app,
                    :apm,
                    :correo,
                    :contrasena,
                    NULL,  -- Foto, inicialmente nulo
                    :telefono,
                    :sexo,
                    :fecha_nac
                )";

                $stmt = $conn->prepare($insertarData);
                $stmt->bindParam(':matricula', $matricula);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':app', $apellido_paterno);
                $stmt->bindParam(':apm', $apellido_materno);
                $stmt->bindParam(':correo', $correo);
                $stmt->bindParam(':contrasena', $contrasena);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->bindParam(':sexo', $sexo);
                $stmt->bindParam(':fecha_nac', $fecha_nacimiento);
                $stmt->execute();
            } else {
                $updateData = "UPDATE alumnos SET 
                    nombre = :nombre,
                    app = :app,
                    apm = :apm,
                    correo = :correo,
                    contrasena = :contrasena,
                    telefono = :telefono,
                    sexo = :sexo,
                    fecha_nac = :fecha_nac
                    WHERE matricula = :matricula";

                $stmt = $conn->prepare($updateData);
                $stmt->bindParam(':matricula', $matricula);
                $stmt->bindParam(':nombre', $nombre);
                $stmt->bindParam(':app', $apellido_paterno);
                $stmt->bindParam(':apm', $apellido_materno);
                $stmt->bindParam(':correo', $correo);
                $stmt->bindParam(':contrasena', $contrasena);
                $stmt->bindParam(':telefono', $telefono);
                $stmt->bindParam(':sexo', $sexo);
                $stmt->bindParam(':fecha_nac', $fecha_nacimiento);
                $stmt->execute();
            }
        }

        $i++;
    }
    header("Location:../direcciones.php?page=ShowStudents");
} else {
    // Puedes redirigir o mostrar un mensaje de error, según tus necesidades
    echo "Acceso no permitido";
}
?>
