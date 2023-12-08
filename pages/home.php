<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div class="page-wrapper">
    <!-- Page header -->
    <div class="page-header d-print-none">
      <div class="container-xl">
        <div class="row g-2 align-items-center">
          <div class="col">
            <!-- Page pre-title -->
            <div class="page-pretitle">
              Pantalla principal
            </div>
            <h2 class="page-title">
              Accesos directos
            </h2>
          </div>
          <!-- Page title actions -->
        </div>
      </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
      <div class="container-xl">
        <div class="row row-deck m-auto row-cards">
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-body d-flex align-items-center justify-content-center">
                <div>
                  <a href="direcciones.php?page=SubjectPage" class="btn btn-lg align-items-center">Gestionar
                    materias</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-body d-flex align-items-center justify-content-center">
                <div>
                  <a href="direcciones.php?page=ShowStudents" class="btn btn-lg align-items-center">Gestionar
                    Alumnos</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-body d-flex align-items-center justify-content-center">
                <div>
                  <a href="direcciones.php?page=NewExamPage" class="btn btn-lg align-items-center">Gestionar
                    Exámenes</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-lg-3">
            <div class="card">
              <div class="card-body d-flex align-items-center justify-content-center">
                <div>
                  <a href="direcciones.php?page=ShowExams" class="btn btn-lg align-items-center">
                    Ver exámenes </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>