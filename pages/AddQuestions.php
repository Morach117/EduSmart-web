<?php
// obtiene el id del examen
$idExamen = $_GET['id'];
// obtiene el id de la materia
$selExamen = $conn->query("SELECT * FROM examenes WHERE id_examen = '$idExamen'");
$rowExamen = $selExamen->fetch(PDO::FETCH_ASSOC);
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
                            Agregar preguntas
                        </h1>
                    </div>
                </div>
                <div class="card mt-3">
                    <div class="card-body">
                        <form class="form-fieldset p-5">
                            <div class="row">
                                <h3 class="col text-2xl font-semibold leading-none tracking-tight"></h3>
                            </div>
                            <div class="row g-3">
                                <div class="col mb-3">
                                    <label for="Enunciado" class="form-label">Enunciado</label>
                                    <input type="text" maxlength="100" class="form-control" name="Enunciado" required
                                        id="Enunciado" aria-describedby="helpId" placeholder="">
                                    <small id="helpId" class="form-text text-muted">Enunciado de la pregunta</small>
                                </div>
                                <div class="col mb-3">
                                    <label for="time" class="form-label">Tiempo de respuesta (en minutos)</label>
                                    <input type="text" class="form-control" name="time" id="time"
                                        aria-describedby="helpId" required placeholder="">
                                    <small id="helpId" class="form-text text-muted">Tiempo que tiene el alumno para
                                        responder</small>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col mb-3">
                                    <label for="a" class="form-label">Inciso a</label>
                                    <input type="text" class="form-control" name="a" id="a" aria-describedby="helpId"
                                        required placeholder="">
                                    <small id="helpId" class="form-text text-muted">Inciso a</small>
                                </div>
                                <div class="col mb-3">
                                    <label for="b" class="form-label">Inciso b</label>
                                    <input type="text" class="form-control" name="b" id="b" aria-describedby="helpId"
                                        required placeholder="">
                                    <small id="helpId" class="form-text text-muted">Inciso b</small>
                                </div>
                                <div class="col mb-3">
                                    <label for="c" class="form-label">Inciso c</label>
                                    <input type="text" class="form-control" name="c" id="c" aria-describedby="helpId"
                                        required placeholder="">
                                    <small id="helpId" class="form-text text-muted">Inciso c</small>
                                </div>
                                <div class="col mb-3">
                                    <label for="d" class="form-label">Inciso d</label>
                                    <input type="text" class="form-control" name="d" id="d" aria-describedby="helpId"
                                        required placeholder="">
                                    <small id="helpId" class="form-text text-muted">Inciso d</small>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col mb-3">
                                    <label for="" class="form-label">Respuesta</label>
                                    <input type="text" class="form-control" name="" id="" aria-describedby="helpId"
                                        required placeholder="">
                                    <small id="helpId" class="form-text text-muted"> Respuesta</small>
                                </div>
                                <div class="col mb-3">
                                    <label for="multimedia" class="form-label">Multimedia (opcional)</label>
                                    <input type="file" class="form-control" name="multimedia" id="multimedia"
                                        aria-describedby="helpId" required placeholder="">
                                    <small id="helpId" class="form-text text-muted">Imagen, video o audio</small>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col">
                                    <a href="direcciones.php?page=ShowExams"> Ver a la lista de exámenes </a>
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
                        <div class="form-fieldset">
                            <h3 class="col text-2xl font-semibold leading-none tracking-tight">Preguntas actuales</h3>
                            <hr class="m-1">
                            <div class="table-responsive-xl">
                                <table class="table table-striped table-hover text-center" id="example">
                                    <thead>
                                        <tr>
                                            <th scope="col">Enunciado</th>
                                            <th scope="col">Tiempo</th>
                                            <th scope="col">Respuesta</th>
                                            <th scope="col">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $selPreguntas = $conn->query("SELECT * FROM preguntas WHERE id_examen = '$idExamen'");
                                        while ($rowPreguntas = $selPreguntas->fetch(PDO::FETCH_ASSOC)) {
                                            ?>
                                            <tr>
                                                <td>
                                                    <?php echo $rowPreguntas['enunciado']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowPreguntas['tiempo_respuesta']; ?>
                                                </td>
                                                <td>
                                                    <?php echo $rowPreguntas['respuesta']; ?>
                                                </td>
                                                <td>
                                                    <a data-bs-toggle="modal" data-bs-target="#editquestion"
                                                        class=" btn btn-primary btn-icon">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-pencil" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <path
                                                                d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                            <path d="M13.5 6.5l4 4" />
                                                        </svg>
                                                    </a>
                                                    <a data-bs-toggle="modal" data-bs-target="#modal-danger-question"
                                                        class="btn btn-icon btn-danger">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                            <line x1="4" y1="7" x2="20" y2="7" />
                                                            <line x1="10" y1="11" x2="10" y2="17" />
                                                            <line x1="14" y1="11" x2="14" y2="17" />
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                        </svg>
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        // modificar numero de items a mostrar
        new DataTable('#example');

    </script>
</body>

</html>