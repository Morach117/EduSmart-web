<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <!-- CSS files -->
    <link href="./assets/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="./assets/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="./assets/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="./assets/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="./assets/dist/css/demo.min.css?1684106062" rel="stylesheet" />
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
    <script src="./assets/dist/js/demo-theme.min.js?1684106062"></script>
    <div class="page page-center">
        <div class="container container-normal py-4">
            <div class="row align-items-center g-4">
                <div class="col-lg">
                    <div class="container-tight">
                        <div class="text-center mb-4">
                            <a href="/" class="navbar-brand navbar-brand-autodark h1">EduSmart</a>
                        </div>
                        <div class="card card-md">
                            <div class="card-body">
                                <h2 class="h2 text-center mb-5">CONTROL DE ACCESO</h2>
                                <form method="post" id="adminLoginFrm" autocomplete="off" novalidate>
                                    <div class="mb-3">
                                        <label class="form-label mb-3">Correo electrónico</label>
                                        <input type="email" class="form-control mb-5" name="email" id="email"
                                            placeholder="tu@email.com" autocomplete="off">
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-label mb-3">
                                            Contraseña
                                            <span class="form-label-description mb-3">
                                                <a href="../RecoverPassword.php">¿Perdiste tu contraseña?</a>
                                            </span>
                                        </label>
                                        <div class="input-group input-group-flat mb-5">
                                            <input type="password" class="form-control" name="password" id="password"
                                                placeholder="Tu contraseña" autocomplete="off">
                                            <span class="input-group-text">
                                                <a href="#" class="link-secondary" id="showPassword"
                                                    data-bs-toggle="tooltip">
                                                    <img id="icon" src=".../../assets/dist/svg/eye.svg" alt="">
                                                </a>
                                            </span>
                                        </div>
                                    </div>
                                    <div class="mb-2">
                                        <label class="form-check">
                                            <input type="checkbox" class="form-check-input" />
                                            <span class="form-check-label">Recordar este dispositivo</span>
                                        </label>
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary mb-3 w-100">Ingresar al
                                            sistema</button>
                                        <a href="./pages/Auth/GetApp.php" class="mt-5">Obtener aplicación móvil</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="text-center text-muted mt-3">
                            ¿No tienes una cuenta? <a href="./pages/Auth/recover.php" tabindex="-1">Regístrate
                                aquí</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg d-none d-lg-block">
                    <img src="./assets/static/illustrations/undraw_secure_login_pdn4.svg" height="300"
                        class="d-block mx-auto" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="./assets/dist/js/tabler.min.js?1684106062" defer></script>
    <script src="./assets/dist/js/demo.min.js?1684106062" defer></script>
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
    </script>
</body>

</html>