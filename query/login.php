<?php
session_start();
include '../conn.php';

extract($_POST);

$providedHash = hash('sha256', $password); // Hash de la contraseña proporcionada

$selAcc = $conn->query("SELECT * FROM docentes WHERE correo_electronico = '$email'");
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC);

if ($selAcc->rowCount() > 0) {
    $storedHash = $selAccRow['contrasena']; // Hash almacenado en la base de datos

    if ($providedHash === $storedHash) {
        $_SESSION['admin'] = array(
            'correo_electronico' => $selAccRow['correo_electronico'],
            'adminnakalogin' => true,
        );
        $res = array('res' => 'success');
    } else {
        $res = array('res' => 'invalid');
    }
} else {
    $res = array('res' => 'invalid');
}

echo json_encode($res);
?>
