<?php
$docenteId = $selDocenteData['id_docente'];
?>

<body>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h1 class="page-title">
                            Buscar alumno
                        </h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form method="post" class="form-fieldset p-5" id="formSubirExamen">
                                <div class="row">
                                    <h3 class="col text-2xl font-semibold leading-none tracking-tight"></h3>
                                    <a class="col text-end cursor-pointer" data-bs-toggle="modal"
                                        data-bs-target="#modal-alumno">Ver alumnos</a>
                                </div>
                                <hr class="m-1">
                                <div class="row g-3">
                                    <div class="col-9 mb-3">
                                        <input type="text" class="form-control" name="matricula" id="matricula" aria-describedby="helpId" placeholder="Matricula del alumno">
                                        <label for="materia" class="form-label">Matricula del alumno a buscar</label>
                                    </div>
                                    <div class="col-3">
                                        <!-- btn buscar -->
                                        <button type="submit" class="btn btn-primary" name="buscar" id="buscar">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php 
        if(isset($_POST['buscar'])){
            $matricula = $_POST['matricula'];
            $selAlumno1 = $conn->query("SELECT * FROM alumnos WHERE matricula = '$matricula'");
            $selAlumnoRow2 = $selAlumno1-> fetch(PDO::FETCH_ASSOC);
            $selCalificaciones = $conn ->query("SELECT * FROM calificaciones WHERE matricula = '$matricula'");
            $selCalificacionesrow = $selCalificaciones-> fetch(PDO::FETCH_ASSOC);
            $name = $selAlumnoRow2['nombre'] . " " . $selAlumnoRow2['app'] . " " . $selAlumnoRow2['apm'];

            // Modificación para obtener el puntaje desde la tabla gamificacion
    $selGamificacion = $conn->query("SELECT puntaje FROM gamificacion WHERE id_alumno = '{$selAlumnoRow2['id_alumno']}'");
    $selGamificacionRow = $selGamificacion->fetch(PDO::FETCH_ASSOC);
    $puntaje = isset($selGamificacionRow['puntaje']) ? $selGamificacionRow['puntaje'] : 'No disponible';    

    ?>
    <!--imprime la info del alumno -->
    <div class="container">
        <div class="row form-fieldset my-5">
            <div class="col">
                <div class="page-header my-3">
                    <div class="page-pretitle">
                        Administrador
                    </div>
                    <h2 class="page-title">
                        DATOS PERSONALES
                    </h2>
                </div>
                <div class="row g-3">
                    <div class="col-6 mb-3">
                        <input type="text" readonly disabled class="form-control fs-2" name="matricula" id="matricula" aria-describedby="helpId" placeholder="Matricula del alumno" value="<?php echo $selAlumnoRow2['matricula']; ?>">
                        <label for="materia" class="form-label">Matricula</label>
                    </div>
                    <div class="col-6 mb-3">
                        <input type="text" readonly disabled class="form-control fs-2" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Nombre del alumno" value="<?php echo $name ?>">
                        <label for="materia" class="form-label">Nombre</label>
                    </div>
                    <!-- correo  -->
                    <div class="col-6 mb-3">
                        <input type="text" readonly disabled class="form-control fs-2" name="correo" id="correo" aria-describedby="helpId" placeholder="Correo del alumno" value="<?php echo $selAlumnoRow2['correo']; ?>">
                        <label for="materia" class="form-label">Correo</label>
                    </div>
                     <!--telefono  -->
                        <div class="col-6 mb-3">
                            <input type="text" readonly disabled class="form-control fs-2" name="telefono" id="telefono" aria-describedby="helpId" placeholder="Telefono del alumno" value="<?php echo $selAlumnoRow2['telefono']; ?>">
                            <label for="materia" class="form-label">Telefono</label>
                        </div>
                        <!-- calificaciones -->
                        <div class="col-6 mb-3">
                        <input type="text" readonly disabled class="form-control fs-2" name="calificacion" id="calificacion" aria-describedby="helpId" placeholder="Calificacion del alumno" value="<?php echo $puntaje; ?>">
                            <label for="materia" class="form-label">Calificacion</label>
                        </div>
                        <!-- materia -->
                        <div class="col-6 mb-3">
                            <input type="text" readonly disabled class="form-control fs-2" name="materia" id="materia" aria-describedby="helpId" placeholder="Materia del alumno" value="base datos">
                            <label for="materia" class="form-label">Materia</label>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
        }
        ?>

    <script>
        // modificar numero de items a mostrar
        new DataTable('#units');

    </script>