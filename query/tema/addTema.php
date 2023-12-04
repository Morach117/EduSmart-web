<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Asignar el evento a un contenedor existente (por ejemplo, el cuerpo de la tabla)
        var tableBody = document.getElementById('example').getElementsByTagName('tbody')[0];

        // Usar un selector para filtrar los clics a los botones de eliminación
        tableBody.addEventListener('click', function (event) {
            if (event.target.classList.contains('btn-eliminar')) {
                var temaId = event.target.getAttribute('data-id');

                // Asignar el id de la unidad al botón de confirmación en el modal
                document.querySelector('#modal-danger-topic-tema .btn-danger').setAttribute('data-id', temaId);
            }
        });

        // Asignar el evento al botón de confirmación en el modal
        document.querySelector('#modal-danger-topic-tema .btn-danger').addEventListener('click', function () {
            // Obtener el id de la unidad desde el atributo data-id del botón
            var temaId = this.getAttribute('data-id');

            // Realizar la solicitud de eliminación al servidor (puedes usar fetch o jQuery.ajax)
            // Aquí se muestra un ejemplo usando fetch
            fetch('./query/tema/eliminar_tema.php?id=' + temaId, {
                method: 'GET'
            })
            .then(function(response) {
                return response.json();
            })
            .then(function(data) {
                if (data.success) {
                    // Eliminación exitosa, puedes recargar la página o realizar otras acciones necesarias
                    Swal.fire({
                        icon: 'success',
                        title: '¡Tema eliminado con éxito!',
                        showConfirmButton: false,
                        timer: 1000 // 1 segundo
                    }).then(() => {
                        // Recargar la página después de 1 segundo
                        setTimeout(function () {
                            location.reload();
                        }, 500);
                    });
                } else {
                    alert('Error al eliminar la unidad');
                }
            })
            .catch(function(error) {
                console.error('Error al eliminar la unidad:', error);
            });
        });
    });
</script>
