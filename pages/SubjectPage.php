<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h2 class="page-title">
                            Materias Actuales
                        </h2>
                        <div class="text-muted mt-1">
                            <?php
                            $selMaterias = $conn->query("SELECT COUNT(*) AS total FROM materias");
                            $rowMaterias = $selMaterias->fetch(PDO::FETCH_ASSOC);
                            echo $rowMaterias['total'];
                            if ($rowMaterias['total'] == 1) {
                                echo " materia";
                            } else {
                                echo " materias";
                            }
                            ?>
                        </div>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <button data-bs-toggle="modal" data-bs-target="#modal-subject" class="btn btn-primary">
                                <!-- Download SVG icon from http://tabler-icons.io/i/plus -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M12 5l0 14" />
                                    <path d="M5 12l14 0" />
                                </svg>
                                Nueva materia
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page body -->
        <div class="page-body">
            <div class="container-xl">
                <div class="row row-cards">
                    <?php
                    $selMaterias = $conn->query("SELECT * FROM materias");
                    if ($selMaterias->rowCount() == 0) {
                        echo "<div class='col-12'><div class='alert alert-important alert-danger'>No hay materias registradas</div></div>";
                    } else {
                        while ($rowMaterias = $selMaterias->fetch(PDO::FETCH_ASSOC)) {
                            ?>
                            <div class="col-md-6 col-lg-3">
                                <div class="card">
                                    <div class="card-body p-4 text-center">
                                        <span class="avatar avatar-xl mb-3 rounded"
                                            style="background-image: url(./files/materias/<?php echo $rowMaterias['img'] ?>)"></span>
                                        <h3 class="m-0 mb-1">
                                            <a href="#">
                                                <?php echo $rowMaterias['nombre_materia'] ?>
                                            </a>
                                        </h3>
                                    </div>
                                    <div class="d-flex">
                                        <a href="#" class="card-btn">
                                            Contenido temático
                                        </a>
                                        <a href="#" class="card-btn">
                                            Gestionar temas
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>