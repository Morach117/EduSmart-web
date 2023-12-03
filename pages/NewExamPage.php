<?php
$docenteId = $selDocenteData['id_docente'];
?>
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
                            Crear nuevo examen
                        </h1>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <form class="form-fieldset p-5">
                                <div class="row">
                                    <h3 class="col text-2xl font-semibold leading-none tracking-tight"></h3>
                                    <a class="col text-end cursor-pointer" data-bs-toggle="modal"
                                        data-bs-target="#modal-unidades">Ver unidades</a>
                                </div>
                                <hr class="m-1">
                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <label for="materia" class="form-label">Materias</label>
                                        <select class="form-select form-select-md" name="materia" id="materia">
                                            <option selected>Abrir menu de materias</option>
                                            <?php
                                            $selMaterias = $conn->query("SELECT * FROM materias WHERE id_docente = '$docenteId'");
                                            while ($rowMaterias = $selMaterias->fetch(PDO::FETCH_ASSOC)) {
                                                $idMateria = $rowMaterias['id_materia'];
                                                $nombreMateria = $rowMaterias['nombre_materia'];
                                                echo "<option value='$idMateria'>$nombreMateria</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="col form-group">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label for="unidad" class="form-label">Unidad</label>
                                                <input type="text" class="form-control" name="unidad" id="unidad"
                                                    aria-describedby="helpId" placeholder="unidad">
                                                <small id="helpId" class="form-text text-muted">Ingrese el nombre de la
                                                    unidad</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <label for="" class="form-label">Tipo de examen</label>
                                        <select class="form-select form-select-md" name="tipo" id="tipo">
                                            <option selected>Abrir menu</option>
                                            <option value="equipo">Equipo</option>
                                            <option value="individual">Individual</option>
                                        </select>
                                    </div>
                                    <div class="col mb-3">
                                        <label for="" class="form-label">Tipo de examen</label>
                                        <select class="form-select form-select-md" name="tipo" id="tipo">
                                            <option selected>Abrir menu</option>
                                            <option value="equipo">Equipo</option>
                                            <option value="individual">Individual</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col mb-3">
                                        <div class="mb-3">
                                            <label for="fecha" class="form-label">Fecha</label>
                                            <input type="date" class="form-control" name="fecha" id="fecha"
                                                aria-describedby="helpId">
                                            <small id="helpId" class="form-text text-muted">Seleccione la fecha del
                                                examen</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="row g-3">
                                    <div class="col">
                                        <!-- <a href="direcciones.php?page=SubjectPage"> Volver a la lista de materias </a> -->
                                    </div>
                                    <div class="col">
                                        <div class="text-end">
                                            <button type="submit" class="btn btn-primary">
                                                Subir examen
                                            </button>
                                            <button type="reset" class="btn btn-danger ms-2">
                                                Cancelar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // modificar numero de items a mostrar
        new DataTable('#units');

    </script>
</body>

</html>