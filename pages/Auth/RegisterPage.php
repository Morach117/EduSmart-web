<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "edusmart_v2";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Función para encriptar la contraseña
function encriptarContraseña($contraseña)
{
    // haz que encripte en sha-256
    $contraseñaEncriptada = hash('sha256', $contraseña);
    return $contraseñaEncriptada;
}

// Obtener los datos del formulario
$nombre = "";
$app = "";
$apm = "";
$correo = "";
$contraseña = "";
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $app = $_POST["app"];
    $apm = $_POST["apm"];
    $correo = $_POST["correo"];
    $contraseña = $_POST["contraseña"];

    // Verificar si el correo ya existe en la base de datos
    $sql_verificar_correo = "SELECT id_docente FROM docentes WHERE correo_electronico = '$correo'";
    $resultado = $conn->query($sql_verificar_correo);

    if ($resultado->num_rows > 0) {
        $mensaje = "El correo electrónico ya está registrado.";
    } else {
        // Verificar si la contraseña cumple con los requisitos (por ejemplo, al menos 8 caracteres y al menos un número)
        $requisitos_contraseña = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
        if (!preg_match($requisitos_contraseña, $contraseña)) {
            $mensaje = "La contraseña debe tener al menos 8 caracteres y contener al menos un número.";
        } else {
            // Encriptar la contraseña
            $contraseñaEncriptada = encriptarContraseña($contraseña);

            // Insertar los datos en la base de datos
            $sql = "INSERT INTO docentes (nombre, app, apm , correo_electronico, contrasena) VALUES ('$nombre', '$app', '$apm', '$correo', '$contraseñaEncriptada')";

            if ($conn->query($sql) === true) {
                // Redirigir al usuario a la página de inicio de sesión
                header("Location: ../index.php");

                exit();
            } else {
                $mensaje = "Error al crear el usuario: " . $conn->error;
            }

        }
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registrar usuario</title>
    <!-- CSS files -->
    <link href="../assets/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="../assets/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="../assets/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="../assets/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="../assets/dist/css/demo.min.css?1684106062" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="../assets/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
        <div class="container container-tight py-4">
            <div class="text-center m-4">
                <a href="/" class="navbar-brand navbar-brand-autodark h1">EduSmart</a>
            </div>
            <form class="card card-md" action="" method="post" autocomplete="off" novalidate>
                <div class="card-body">
                    <h2 class="card-title text-center mb-4">Crear cuenta nueva</h2>
                    <?php if (!empty($mensaje)): ?>
                            <div class="alert alert-danger mb-3">
                                <?php echo $mensaje; ?>
                            </div>
                    <?php endif; ?>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" placeholder="Ingrese su nombre" name="nombre"
                            value="<?php echo $nombre; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Paterno</label>
                        <input type="text" class="form-control" placeholder="Ingrese su apellido Paterno" name="app"
                            value="<?php echo $app; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido Materno</label>
                        <input type="text" class="form-control" placeholder="Ingrese su apellido Materno" name="apm"
                            value="<?php echo $apm; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" placeholder="Ingrese su correo" name="correo"
                            value="<?php echo $correo; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <div class="input-group input-group-flat">
                            <input type="password" id="password" class="form-control" placeholder="Contraseña"
                                autocomplete="off" name="contraseña" value="<?php echo $contraseña; ?>" required>
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" id="showPassword" data-bs-toggle="tooltip">
                                    <img id="icon" src="../assets/static/svg/eye.svg" alt="">
                                </a>
                            </span>
                        </div>
                    </div>
                    <div class="form-footer">
                        <button type="submit" class="btn btn-primary w-100">Crear cuenta nueva</button>
                    </div>
                </div>
            </form>
            <div class="text-center text-muted mt-3">
                ¿Ya tienes una cuenta?<a href="../index.php" tabindex="-1"> Inicia sesión aquí </a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="../assets/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="../assets/dist/js/demo.min.js?1684106062" defer></script>
    <script>
        var showPasswordLink = document.getElementById('showPassword');
        var passwordInput = document.getElementById('password');
        var showIcon = document.getElementById('icon')

        showPasswordLink.addEventListener('click', function (event) {
            event.preventDefault();

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                showIcon.src = '../assets/static/svg/eye-off.svg';
                showPasswordLink.setAttribute('title', 'Mostrar contraseña')
            } else {
                passwordInput.type = 'password';
                showIcon.src = '../assets/static/svg/eye.svg';
                showPasswordLink.setAttribute('title', 'Ocultar contraseña')
            }
        });
    </script>
</body>

</html>