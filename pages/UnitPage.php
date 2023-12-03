<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insumos</title>
</head>

<body>
    <div class="page-wrapper">
        <!-- Page header -->
        <div class="page-header d-print-none">
            <div class="container-xl">
                <?php
                // Verifica si se ha enviado el parámetro "id" a través de la URL
                if (isset($_GET['id'])) {
                    // Obtén el valor del parámetro "id"
                    $id = $_GET['id'];
                    ?>
                    <div class="row g-2 align-items-center">
                        <div class="col">
                            <h2 class="page-title">
                                <?php
                                // Obtiene el nombre de la materia
                                $selMateria = $conn->query("SELECT * FROM materias WHERE id_materia = '$id'");
                                $rowMateria = $selMateria->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <span class="text-uppercase">
                                    <?php echo $rowMateria['nombre_materia']; ?>
                                </span>
                            </h2>
                            <h1 class="page-pretitle">
                                Unidades temáticas
                            </h1>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <form class="form-fieldset">
                                <div class="row">
                                    <h3 class="col text-2xl font-semibold leading-none tracking-tight">Añadir unidad</h3>
                                    <a href="direcciones.php?page=TopicPage&id=<?php echo $id ?>"
                                        class="col text-end link-primary"> Añadir
                                        tema </a>
                                </div>
                                <hr class="m-1">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nombre la nueva
                                            unidad</label>
                                        <input type="text" class="form-control" name="unidad" id="exampleFormControlInput1"
                                            maxlength="30" required placeholder="Nuevo tema">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <a href="direcciones.php?page=SubjectPage"> Volver a la lista de materias </a>
                                    </div>
                                    <div class="col text-end">
                                        <button type="submit" class="btn btn-primary">Añadir</button>
                                        <button type="reset" class="btn btn-danger">Cancelar</button>
                                    </div>
                                </div>
                            </form>

                            <div class="form-fieldset">
                                <h3 class="col text-2xl font-semibold leading-none tracking-tight">Unidades actuales</h3>
                                <hr class="m-1">
                                <div class="table-responsive-xl">
                                    <table class="table table-striped table-hover text-center" id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col">Nombre de la unidad</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $selUnidades = $conn->query("SELECT * FROM unidades_tematicas WHERE id_materia = '$id'");
                                            while ($rowUnidades = $selUnidades->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr class="">
                                                    <td scope="row">
                                                        <?php echo $rowUnidades['nombre_unidad'] ?>
                                                    </td>
                                                    <td scope="row">
                                                        <div class="btn-group gap-2" role="group" aria-label="Basic example">
                                                            <button type="button" class="btn btn-primary"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-pencil" width="24"
                                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path
                                                                        d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                                                                    <path d="M13.5 6.5l4 4" />
                                                                </svg></button>
                                                            <button type="button" class="btn btn-danger"><svg
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="icon icon-tabler icon-tabler-trash-x" width="24"
                                                                    height="24" viewBox="0 0 24 24" stroke-width="2"
                                                                    stroke="currentColor" fill="none" stroke-linecap="round"
                                                                    stroke-linejoin="round">
                                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                                    <path d="M4 7h16" />
                                                                    <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                                    <path d="M10 12l4 4m0 -4l-4 4" />
                                                                </svg></button>
                                                        </div>
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
                    <?php
                } else {
                    // si no hay id
                    ?>
                    <div class="page page-center">
                        <div class="container-tight py-4">
                            <div class="empty">
                                <div class="empty-header">404</div>
                                <p class="empty-title">Oops… No deberías estas aquí</p>
                                <p class="empty-subtitle text-muted">
                                </p>
                                <div class="empty-action">
                                    <a href="./." class="btn btn-primary">
                                        <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M5 12l14 0" />
                                            <path d="M5 12l6 6" />
                                            <path d="M5 12l6 -6" />
                                        </svg>
                                        Take me home
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>


</body>
<script>
    // modificar numero de items a mostrar
    new DataTable('#example');

</script>

</html>