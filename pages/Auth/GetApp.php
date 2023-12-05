<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login</title>
    <!-- CSS files -->
    <link href="../../assets/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
    <link href="../../assets/dist/css/demo.min.css?1684106062" rel="stylesheet" />
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
<div class="page-body">
    <div class="container-xl">
        <div class="card">
            <div class="card-body">
                <section class="py-12 md:py-24 lg:py-32">
                    <div class="container px-4 md:px-6">
                        <div class="row justify-content-center align-items-center gap-5">
                            <div class="col-12 col-md-6 text-center">
                                <img src="../../assets/static/brands/logo.jpg" width="180" height="180" alt="App Logo"
                                    class="img-fluid" />
                                <h1 class="text-3xl font-weight-bold mt-4">
                                    Obten nuestra aplicacion movil y accede al contenido didactico de tus materias.
                                </h1>
                                <p class="text-lg mt-2">
                                    Descarga nuestra aplicación movil y disfruta de una experiencia
                                    fluida, segura y sencilla para aprender.
                                </p>
                                <a href="../../files/edusmart.apk" download="EduSmart.apk" class="btn btn-dark btn-lg mt-4">
                                    Download APK
                                </a>
                            </div>
                            <!-- <div class="col-12 col-md-6 text-center">
                                <img src="./assets/images/mobile-app-screenshot-1.png" width="300" height="500"
                                    alt="Mobile App Screenshot 1" class="img-fluid" />
                            </div> -->
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
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