const btnBorrarAmigo = document.querySelectorAll(".btnBorrarAmigo");

if (btnBorrarAmigo) {
    btnBorrarAmigo.forEach(button => {
        button.addEventListener('click', function() {
            const amigo = this.getAttribute('data-amigo');
            const nickname = this.getAttribute('data-nickname');
            Swal.fire({
                title: "¿Estás seguro de que deseas eliminar a " + amigo + "?",
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    fetch('borrarAmigo.php?nickname=' + nickname, {
                        method: 'DELETE'           
                    }).then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            alert('Hubo un error al eliminar al amigo.');
                        }
                    });
                }
            });
        });
    });
}
