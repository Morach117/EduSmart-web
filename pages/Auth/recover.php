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
    // Haz que encripte en sha-256
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
    $nombre = htmlspecialchars($_POST["nombre"]);
    $app = htmlspecialchars($_POST["app"]);
    $apm = htmlspecialchars($_POST["apm"]);
    $correo = htmlspecialchars($_POST["correo"]);
    $contraseña = htmlspecialchars($_POST["contraseña"]);

    // Validar la entrada del usuario
    $nombre = htmlspecialchars($nombre);
    $app = htmlspecialchars($app);
    $apm = htmlspecialchars($apm);
    $correo = htmlspecialchars($correo);
    $contraseña = htmlspecialchars($contraseña);

    // Verificar si el correo ya existe en la base de datos usando una sentencia preparada
    $sql_verificar_correo = "SELECT id_docente FROM docentes WHERE correo_electronico = ?";
    $stmt_verificar_correo = $conn->prepare($sql_verificar_correo);
    $stmt_verificar_correo->bind_param("s", $correo);
    $stmt_verificar_correo->execute();
    $stmt_verificar_correo->store_result();

    if ($stmt_verificar_correo->num_rows > 0) {
        $mensaje = "El correo electrónico ya está registrado.";
    } else {
        // Verificar si la contraseña cumple con los requisitos (por ejemplo, al menos 8 caracteres, al menos un número y al menos una letra mayúscula)
        $requisitos_contraseña = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/";
        if (!preg_match($requisitos_contraseña, $contraseña)) {
            $mensaje = "La contraseña debe tener entre 8 a 20 caracteres, contener al menos un número y al menos una letra mayúscula.";
        } else {
            // Encriptar la contraseña
            $contraseñaEncriptada = encriptarContraseña($contraseña);
            // Insertar los datos en la base de datos usando una sentencia preparada
            $sql_insertar_usuario = "INSERT INTO docentes (nombre, app, apm, correo_electronico, contrasena) VALUES (?, ?, ?, ?, ?)";
            $stmt_insertar_usuario = $conn->prepare($sql_insertar_usuario);
            $stmt_insertar_usuario->bind_param("sssss", $nombre, $app, $apm, $correo, $contraseñaEncriptada);

            if ($stmt_insertar_usuario->execute()) {
                // Redirigir al usuario a la página de inicio de sesión
                header("Location: ../../index.php");
                exit();
            } else {
                $mensaje = "Error al crear el usuario: " . $stmt_insertar_usuario->error;
            }
        }
    }

    $stmt_verificar_correo->close();
    $stmt_insertar_usuario->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Registrar usuario</title>
    <!-- CSS files -->
    <link href="../../assets/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/demo.min.css?1684106062" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto,
                Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class="d-flex flex-column">
    <script src="../../assets/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
        <div class="container-fluid container-tight py-4">
            <div class="text-center m-4">
                <a href="/" class="navbar-brand navbar-brand-autodark h1 fs-1 fw-bold">EduSmart</a>
            </div>
            <form class="card" action="" method="post" autocomplete="off">
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
                            value="<?php echo htmlspecialchars($nombre); ?>" maxlength="20" required>
                    </div>
                    <div class="row">
                        <div class="mb-3 col">
                            <label class="form-label">Apellido Paterno</label>
                            <input type="text" class="form-control" placeholder="Ingrese su apellido Paterno" name="app"
                                value="<?php echo htmlspecialchars($app); ?>" maxlength="20" required>
                        </div>
                        <div class="mb-3 col">
                            <label class="form-label">Apellido Materno</label>
                            <input type="text" class="form-control" placeholder="Ingrese su apellido Materno" name="apm"
                                value="<?php echo htmlspecialchars($apm); ?>" maxlength="20" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Correo electrónico</label>
                        <input type="email" maxlength="50" class="form-control" placeholder="Ingrese su correo"
                            name="correo" value="<?php echo htmlspecialchars($correo); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <div class="input-group input-group-flat">
                            <input type="password" id="password" class="form-control" placeholder="Contraseña"
                                autocomplete="off" name="contraseña"
                                value="<?php echo htmlspecialchars($contraseña); ?>" required>
                            <span class="input-group-text">
                                <a href="#" class="link-secondary" id="showPassword" data-bs-toggle="tooltip">
                                    <img id="icon" src="../../assets/dist/svg/eye.svg" maxlength="20" alt="">
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
                ¿Ya tienes una cuenta?<a href="../../index.php" tabindex="-1"> Inicia sesión aquí </a>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="../../assets/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="../../assets/dist/js/demo.min.js?1684106062" defer></script>
    <script>
    var showPasswordLink = document.getElementById('showPassword');
    var passwordInput = document.getElementById('password');
    var showIcon = document.getElementById('icon')

    showPasswordLink.addEventListener('click', function (event) {
        event.preventDefault();

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            showIcon.src = '../../assets/dist/svg/eye-off.svg';
            showPasswordLink.setAttribute('title', 'Mostrar contraseña')
        } else {
            passwordInput.type = 'password';
            showIcon.src = '../../assets/dist/svg/eye.svg';
            showPasswordLink.setAttribute('title', 'Ocultar contraseña')
        }
    });

    // Nueva parte para mostrar una alerta si la contraseña no cumple con los requisitos
    var form = document.querySelector('form');
    form.addEventListener('submit', function (event) {
        var password = document.getElementById('password').value;
        var passwordRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)[A-Za-z\d]{8,}$/;

        if (!passwordRegex.test(password)) {
            event.preventDefault();
            alert('La contraseña debe tener entre 8 y 20 caracteres, contener al menos un número y al menos una letra mayúscula.');
        }
    });
</script>

</body>

</html>