<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../../PHPMailer/src/Exception.php';
require '../../PHPMailer/src/PHPMailer.php';
require '../../PHPMailer/src/SMTP.php';

// Tu código de conexión a la base de datos y funciones de seguridad
// ...
include '../../conn.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $correo = htmlspecialchars($_POST["correo"]);

    // Verificar si el correo existe en la base de datos
    $stmt = $conn->prepare("SELECT * FROM docentes WHERE correo_electronico = ?");
    $stmt->bindParam(1, $correo);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        // Generar una nueva contraseña temporal (puedes hacerlo de una manera más segura en un entorno de producción)
        $nuevaContraseña = generarNuevaContraseña();

        // Actualizar la contraseña en la base de datos
        $hashedPassword = hash('sha256', $nuevaContraseña);
        $stmtUpdate = $conn->prepare("UPDATE docentes SET contrasena = ? WHERE correo_electronico = ?");
        $stmtUpdate->bindParam(1, $hashedPassword);
        $stmtUpdate->bindParam(2, $correo);
        $stmtUpdate->execute();

        // Enviar un correo electrónico con la nueva contraseña al usuario
        enviarCorreoElectronico($correo, $nuevaContraseña);

        // Mostrar un mensaje de éxito al usuario
        $mensaje = "Se ha enviado una nueva contraseña a tu correo electrónico.";
    } else {
        $mensaje = "La dirección de correo electrónico no está registrada.";
    }

    $stmt->closeCursor();
    $stmtUpdate->closeCursor();
}

// Función para generar una nueva contraseña temporal (puedes mejorar esto en un entorno de producción)
function generarNuevaContraseña()
{
    return substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"), 0, 10);
}

// Función para enviar un correo electrónico (utilizando PHPMailer)
function enviarCorreoElectronico($correo, $nuevaContraseña)
{
    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.hostinger.com'; // Reemplaza con tu servidor SMTP
        $mail->SMTPAuth = true;
        $mail->Username = 'codetech@codeedusmart.com'; // Reemplaza con tu correo
        $mail->Password = 'Octavio@123'; // Reemplaza con tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Puedes cambiarlo a PHPMailer::ENCRYPTION_SMTPS si es necesario
        $mail->Port = 587; // Cambia al puerto SMTP que estés utilizando

        // Configuración del mensaje
        $mail->setFrom('codetech@codeedusmart.com', 'EduSmart'); // Reemplaza con tu correo y nombre
        $mail->addAddress($correo); // Agrega el destinatario
        $mail->Subject = 'Recuperación de contraseña';
        $mail->Body = 'Tu nueva contraseña es: ' . $nuevaContraseña;


        // Enviar el correo electrónico
        $mail->send();
    } catch (Exception $e) {
        echo "Error al enviar el correo electrónico: {$mail->ErrorInfo}";
    }
}
?>

<!-- Resto del código HTML -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../assets/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/demo.min.css?1684106062" rel="stylesheet" />
    <title>Recuperar contraseña</title>

</head>

<body>
    <div class="d-flex flex-column">
        <div class="page page-center">
            <div class="container container-tight py-4">
                <div class="text-center m-4">
                    <a href="/" class="navbar-brand navbar-brand-autodark h1">EduSmart</a>
                </div>
                <form class="card card-md" action="" method="post" autoComplete="off" noValidate>
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Recuperar contraseña</h2>
                        <p class="text-muted mb-4">Ingresa tu correo y tu contraseña será enviada a tu correo, si no
                            cuentas
                            con conexión a internet comunícate con un administrador</p>
                        <div class="mb-3">
                            <label class="form-label">Dirección de correo</label>
                            <input type="email" class="form-control" placeholder="Ingresa tu correo" name="correo"
                                required />
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">
                                <IconMail />
                                Enviar contraseña
                            </button>
                        </div>
                    </div>
                </form>
                <div class="text-center text-muted mt-3">
                    La recupere <a href="../index.php">regresaré</a> a la pantalla de inicio de sesión.
                </div>
            </div>
        </div>
    </div>
    <script src="../../assets/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="../../assets/dist/js/demo.min.js?1684106062" defer></script>
</body>

</html>