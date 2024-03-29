<?php
include "./query/selectData.php"; //incluye el archivo de consultas a la base de datos
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>EduSmart</title>
  <!-- CSS files -->
  <link href="./assets/dist/css/tabler.min.css?1684106062" rel="stylesheet" />
  <link href="./assets/dist/css/tabler-flags.min.css?1684106062" rel="stylesheet" />
  <link href="./assets/dist/css/tabler-payments.min.css?1684106062" rel="stylesheet" />
  <link href="./assets/dist/css/tabler-vendors.min.css?1684106062" rel="stylesheet" />
  <link href="./assets/dist/css/demo.min.css?1684106062" rel="stylesheet" />
  <link href="./assets/dist/libs/dropzone/dist/dropzone.css?1684106062" rel="stylesheet" />
  <link href="./assets/datatables.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.20/dist/sweetalert2.all.min.js"></script>

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

<body>
  <script src="./dist/js/demo-theme.min.js?1684106062"></script>
  <div class="page">
    <!-- Navbar -->
    <header>
      <div class="navbar navbar-expand-md d-print-none sticky-top" data-bs-theme="dark">


        <div class="container-xl">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href=".">
              EduSmart
              <!-- <img src="./static/logo.svg" width="110" height="32" alt="Tabler" class="navbar-brand-image"> -->
            </a>
          </h1>
          <div class="navbar-nav flex-row order-md-last">
            <div class="d-none d-md-flex">
              <a href="?theme=dark" class="nav-link px-0 hide-theme-dark" title="Activar modo oscuro"
                data-bs-toggle="tooltip" data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/moon -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z" />
                </svg>
              </a>
              <a href="?theme=light" class="nav-link px-0 hide-theme-light" title="Activar modo claro"
                data-bs-toggle="tooltip" data-bs-placement="bottom">
                <!-- Download SVG icon from http://tabler-icons.io/i/sun -->
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                  stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M12 12m-4 0a4 4 0 1 0 8 0a4 4 0 1 0 -8 0" />
                  <path
                    d="M3 12h1m8 -9v1m8 8h1m-9 8v1m-6.4 -15.4l.7 .7m12.1 -.7l-.7 .7m0 11.4l.7 .7m-12.1 -.7l-.7 .7" />
                </svg>
              </a>
              <div class="nav-item dropdown d-none d-md-flex me-3">
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                  <div class="card">
                    <div class="card-header">
                      <h3 class="card-title">Last updates</h3>
                    </div>
                    <div class="list-group list-group-flush list-group-hoverable">
                      <div class="list-group-item">
                        <div class="row align-items-center">
                          <div class="col-auto"><span class="status-dot d-block"></span></div>
                          <div class="col text-truncate">
                            <a href="#" class="text-body d-block">Example 2</a>
                            <div class="d-block text-muted text-truncate mt-n1">
                              justify-content:between ⇒ justify-content:space-between (#29734)
                            </div>
                          </div>
                          <div class="col-auto">
                            <a href="#" class="list-group-item-actions show">
                              <!-- Download SVG icon from http://tabler-icons.io/i/star -->
                              <svg xmlns="http://www.w3.org/2000/svg" class="icon text-yellow" width="24" height="24"
                                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path
                                  d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                              </svg>
                            </a>
                          </div>
                        </div>
                      </div>
                      <div class="list-group-item">
                      </div>
                      <div class="list-group-item">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-item dropdown">
              <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown"
                aria-label="Open user menu">
                <div class="d-none d-xl-block ps-2">
                  <div>
                    <span class="h3">
                      <?php
echo $selDocenteData['nombre'];
?>
                    </span>
                  </div>
                </div>
              </a>
              <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                <a href="./profile.html" class="dropdown-item">Profile</a>
                <div class="dropdown-divider m-1"></div>
                <a href="./query/logout.php" class="text-danger h3 dropdown-item">Logout</a>
              </div>
            </div>
          </div>
          <div class="collapse navbar-collapse" id="navbar-menu">
            <div class="d-flex flex-column flex-md-row flex-fill align-items-stretch align-items-md-center">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link" href="./">
                    <span
                      class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                        <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                        <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Home
                    </span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span
                      class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/package -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M12 3l8 4.5l0 9l-8 4.5l-8 -4.5l0 -9l8 -4.5" />
                        <path d="M12 12l8 -4.5" />
                        <path d="M12 12l0 9" />
                        <path d="M12 12l-8 -4.5" />
                        <path d="M16 5.25l-8 4.5" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Alumnos
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <?php
                        $selAlumnos = $conn->query("SELECT * FROM alumnos");
                        $selAlumnosRow = $selAlumnos->fetch(PDO::FETCH_ASSOC);
                        if ($selAlumnos->rowCount() > 0) {
                            echo '<a class="dropdown-item" href="direcciones.php?page=ShowStudents">Ver alumnos</a>';
                        } else {
                            echo '<a class="dropdown-item btn bg-red text-white fw-bold text-center" data-bs-toggle="modal" data-bs-target="#modal-alumnos">
                                                Cargar lista de alumnos <br>
                                                (No hay ningún registro actualmente)
                                              </a>';
                        }
                        ?>
                        <?php
                        $docenteId = $selDocenteData['id_docente'];

                        // Consulta para verificar si hay alumnos asignados al docente
                        $consultaAlumnos = $conn->prepare("SELECT COUNT(*) as total_alumnos FROM alumnos WHERE id_docente = :docenteId");
                        $consultaAlumnos->bindParam(':docenteId', $docenteId, PDO::PARAM_INT);
                        $consultaAlumnos->execute();
                        $totalAlumnos = $consultaAlumnos->fetch(PDO::FETCH_ASSOC)['total_alumnos'];
                        ?>
                        <?php if ($totalAlumnos > 0): ?>
                          <a class="dropdown-item" href="direcciones.php?page=WorkTeams">
                                                  Asignar equipos
                                                </a>
                        <?php endif;?>

                        <?php if ($totalAlumnos > 0): ?>
                          <a class="dropdown-item" href="direcciones.php?page=materiasxalumno">
                            Asignar materias
                          </a>
                        <?php endif;?>
                        <?php if ($totalAlumnos > 0): ?>
                          <a class="dropdown-item" href="direcciones.php?page=viewmateriasxalumnos">
                                                  Ver alumnos asignados
                                                </a>
                        <?php endif;?>
                        <?php if ($totalAlumnos > 0): ?>
                          <a class="dropdown-item" href="direcciones.php?page=StudentTracking">
                                                  Seguimiento de alumno
                                                </a>
                        <?php endif;?>
                        <?php if ($totalAlumnos > 0): ?>
                          <a class="dropdown-item" href="direcciones.php?page=calificacion_general">
                                                  Calificaciones generales
                                                </a>
                        <?php endif;?>
                      </div>
                      
                    </div>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="direcciones.php?page=SubjectPage">
                    <span
                      class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M9 11l3 3l8 -8" />
                        <path d="M20 12v6a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2h9" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Administrar materias
                    </span>
                  </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown"
                    data-bs-auto-close="outside" role="button" aria-expanded="false">
                    <span
                      class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/star -->
                      <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24"
                        stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                          d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                      </svg>
                    </span>
                    <span class="nav-link-title">
                      Exámenes
                    </span>
                  </a>
                  <div class="dropdown-menu">
                    <div class="dropdown-menu-columns">
                      <div class="dropdown-menu-column">
                        <a class="dropdown-item" href="direcciones.php?page=NewExamPage">
                          Crear examen
                        </a>
                        <a class="dropdown-item" href="direcciones.php?page=ShowExams">
                          Ver exámenes
                        </a>
                      </div>
                    </div>
                  </div>
                </li>
                <!-- <li class="nav-item">
                  <a class="nav-link" href="direcciones.php?page=GetApp">
                    <span
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-cloud-download" width="24"
                  height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                  stroke-linecap="round" stroke-linejoin="round">
                  <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                  <path d="M19 18a3.5 3.5 0 0 0 0 -7h-1a5 4.5 0 0 0 -11 -2a4.6 4.4 0 0 0 -2.1 8.4" />
                  <path d="M12 13l0 9" />
                  <path d="M9 19l3 3l3 -3" />
                </svg>
                </span>
                <span class="nav-link-title">
                  Obtener aplicación
                </span>
                </a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="modal modal-blur fade" id="modal-alumnos" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="form-importar" method="post" action="./query/csv.php" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title">Importar Datos de Alumnos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Agregar campo oculto para almacenar el ID del docente -->
                    <input type="hidden" name="idDocente" value="<?php echo $selDocenteData['id_docente']; ?>">

                    <div class="form-group">
                        <label for="dataCliente" class="form-label">Seleccionar archivo Excel</label>
                        <div class="custom-file">
                            <input type="file" name="dataCliente" id="file-input" class="custom-file-input">
                            <label class="custom-file-label" for="file-input">Elegir archivo</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <p>Descargar plantilla:</p>
                        <a href="./files/Plantilla.csv" download="Plantilla.csv" class="btn btn-outline-primary">Descargar Plantilla</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button id="btn-importar" type="submit" class="btn btn-primary">Importar</button>
                </div>
            </form>
        </div>
    </div>
</div>

    <script src="./assets/dist/libs/dropzone/dist/dropzone-min.js?1684106062" defer></script>
    <script>
      // @formatter:off
      document.addEventListener("DOMContentLoaded", function () {
        new Dropzone("#dropzone-custom");
      });
    </script>