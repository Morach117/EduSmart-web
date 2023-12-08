<?php
require('../conn.php');

// Asegúrate de tener el campo oculto en tu formulario
$idDocente = isset($_POST['idDocente']) ? $_POST['idDocente'] : '';

$tipo = $_FILES['dataCliente']['type'];
$tamanio = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas = file($archivotmp);

$i = 0;
$duplicados = 0; // Variable para contar duplicados

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
            $check_matricula_duplicidad = $conn->prepare("SELECT matricula FROM alumnos WHERE matricula = :matricula AND id_docente = :idDocente");
            $check_matricula_duplicidad->bindParam(':matricula', $matricula);
            $check_matricula_duplicidad->bindParam(':idDocente', $idDocente);
            $check_matricula_duplicidad->execute();
            $cant_duplicidad = $check_matricula_duplicidad->rowCount();
        }

        // No existe registros duplicados
        if ($cant_duplicidad == 0) {
            $insertarData = "INSERT INTO alumnos( 
                id_docente,
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
                :idDocente,
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
            $stmt->bindParam(':idDocente', $idDocente);
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
                WHERE matricula = :matricula AND id_docente = :idDocente";

            $stmt = $conn->prepare($updateData);
            $stmt->bindParam(':idDocente', $idDocente);
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

            // Incrementar contador de duplicados
            $duplicados++;
        }
    }

    $i++;
}

// Imprimir alerta al final de la ejecución
if ($duplicados > 0) {
    echo "<script>alert('Se encontraron $duplicados registros duplicados.');</script>";
}

header("Location:../direcciones.php?page=ShowStudents");
?>
