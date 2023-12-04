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
                        <h1 class="page-title">
                            Lista de exámenes
                        </h1>
                        <h1 class="page-pretitle">
                            <?php
                            $docenteId = $selDocenteData['id_docente'];
                            $selExamenes = $conn->query("SELECT COUNT(*) AS total FROM examenes WHERE id_docente = '$docenteId'");
                            $rowExamenes = $selExamenes->fetch(PDO::FETCH_ASSOC);
                            ?>
                            Tienes disponibles
                            <?php echo $rowExamenes['total']; ?> exámenes
                        </h1>
                    </div>
                    <!-- Page title actions -->
                    <div class="col-auto ms-auto d-print-none">
                        <div class="d-flex">
                            <a href="direcciones.php?page=NewExamPage" class="btn btn-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                    stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <line x1="12" y1="5" x2="12" y2="19" />
                                    <line x1="5" y1="12" x2="19" y2="12" />
                                </svg>
                                Nuevo examen
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <table id="example" class="table table-vcenter table-hover card-table">
                            <thead class="text-center">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Materia</th>
                                    <th>Unidad</th>
                                    <th>Fecha de aplicación</th>
                                    <th class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $selExamenes = $conn->query("SELECT
                                e.id_examen,
                                e.tipo_examen,
                                m.nombre_materia,
                                u.nombre_unidad,
                                e.fecha_examen
                                FROM examenes e
                                INNER JOIN materias m ON e.id_materia = m.id_materia
                                INNER JOIN unidades_tematicas u ON e.id_unidad = u.id_unidad
                                WHERE e.id_docente = '$docenteId'
                                ORDER BY e.fecha_examen DESC");
                                while ($rowExamenes = $selExamenes->fetch(PDO::FETCH_ASSOC)) {
                                    $idExamen = $rowExamenes['id_examen'];
                                    $nombreMateria = $rowExamenes['nombre_materia'];
                                    $nombreUnidad = $rowExamenes['nombre_unidad'];
                                    $fechaExamen = $rowExamenes['fecha_examen'];
                                    $tipoExamen = $rowExamenes['tipo_examen'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $nombreMateria; ?>
                                        </td>
                                        <td>
                                            <?php echo $nombreUnidad; ?>
                                        </td>
                                        <td>
                                            <?php echo $fechaExamen; ?>
                                        </td>
                                        <td>
                                            <?php echo $tipoExamen; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group gap-2">
                                                <a href="direcciones.php?page=AddQuestions&id=<?php echo $idExamen; ?>"
                                                    class="btn btn-sm btn-primary">Agregar preguntas</a>
                                                <a href="direcciones.php?page=ShowExams&id=<?php echo $idExamen; ?>"
                                                    class="btn btn-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-pencil" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                        <path d="M13.5 6.5l4 4" />
                                                    </svg>
                                                </a>

                                                <a href="direcciones.php?page=ShowExams&id=<?php echo $idExamen; ?>"
                                                    class="btn btn-icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="#EE1313" fill="none"
                                                        stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M4 7l16 0" />
                                                        <path d="M10 11l0 6" />
                                                        <path d="M14 11l0 6" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- crear datatable -->
    <script>
        new DataTable('#example');
    </script>
</body>

</html>