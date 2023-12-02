<?php
session_start();
include '../conn.php';

extract($_POST);

$loginAttemptsKey = 'login_attempts';
$lastAttemptTimeKey = 'last_attempt_time';
$maxLoginAttempts = 3;
$lockoutTime = 240; // 4 minutos en segundos

// Verificar si la variable de sesión de intentos de inicio de sesión existe
if (!isset($_SESSION[$loginAttemptsKey])) {
    $_SESSION[$loginAttemptsKey] = 0;
}

// Verificar si el usuario está bloqueado por exceder el máximo de intentos
if ($_SESSION[$loginAttemptsKey] >= $maxLoginAttempts) {
    $lastAttemptTime = $_SESSION[$lastAttemptTimeKey];

    // Verificar si ha pasado el tiempo de bloqueo
    if (time() - $lastAttemptTime < $lockoutTime) {
        $res = array('res' => 'locked');
        echo json_encode($res);
        exit;
    } else {
        // Reiniciar los intentos después del tiempo de bloqueo
        $_SESSION[$loginAttemptsKey] = 0;
    }
}

$providedHash = hash('sha256', $password); // Hash de la contraseña proporcionada

$selAcc = $conn->query("SELECT * FROM docentes WHERE correo_electronico = '$email'"); // Seleccionar la cuenta con el correo proporcionado
$selAccRow = $selAcc->fetch(PDO::FETCH_ASSOC); // Obtener la fila de la cuenta seleccionada

if ($selAcc->rowCount() > 0) {
    $storedHash = $selAccRow['password']; // Hash almacenado en la base de datos

    if ($providedHash === $storedHash) {
        $_SESSION['admin'] = array(
            'correo_electronico' => $selAccRow['correo_electronico'],
            'adminnakalogin' => true,
        );

        // Restablecer los intentos después de un inicio de sesión exitoso
        $_SESSION[$loginAttemptsKey] = 0;

        $res = array('res' => 'success');
    } else {
        // Incrementar el contador de intentos
        $_SESSION[$loginAttemptsKey]++;
        $_SESSION[$lastAttemptTimeKey] = time();

        $res = array('res' => 'invalid');
    }
} else {
    // Incrementar el contador de intentos
    $_SESSION[$loginAttemptsKey]++;
    $_SESSION[$lastAttemptTimeKey] = time();

    $res = array('res' => 'invalid');
}

echo json_encode($res);
?>
