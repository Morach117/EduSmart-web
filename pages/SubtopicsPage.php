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


                    <div class="card">
                        <div class="card-body">
                            <form class="form-fieldset">
                                <div class="row">
                                    <h3 class="col text-2xl font-semibold leading-none tracking-tight">Añadir Subtemas</h3>
                                    <!-- <a href="direcciones.php?page=SubtopicsPage&id=<?php echo $id ?>"
                                        class="col text-end link-primary"> Añadir
                                        subtemas </a> -->
                                </div>
                                <hr class="m-1">
                                <div class="mb-3">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Nombre del nuevo
                                            subtema</label>
                                        <input type="text" class="form-control" id="exampleFormControlInput1" maxlength="30"
                                            required placeholder="Nuevo tema">
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

                            <div class="form-fieldset container text-center ">
                                <h3 class="col text-2xl font-semibold leading-none tracking-tight">Temas Actuales</h3>
                                <div class="table-responsive">
                                    <table class="table table-hover" id="example">
                                        <thead>
                                            <tr>
                                                <th scope="col">Unidad</th>
                                                <th scope="col">Tema</th>
                                                <th scope="col">Acción</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $selSubtemas = $conn->query("SELECT * FROM subtemas WHERE id_tema = '$id'");
                                            while ($rowSubtemas = $selSubtemas->fetch(PDO::FETCH_ASSOC)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $rowSubtemas['id_subtema'] ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $rowSubtemas['nombre'] ?>
                                                    </td>
                                                    <td>
                                                        <a href="direcciones.php?page=ContentPage&id=<?php echo $rowSubtemas['id_subtema'] ?>"
                                                            class="btn btn-primary">Ver contenido</a>
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