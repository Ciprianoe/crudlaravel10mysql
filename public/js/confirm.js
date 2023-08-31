document.getElementById('deleteForm').addEventListener('submit', function(event) {
    console.log('Evento de submit activado');
    var confirmDelete = confirm('¿Estás seguro de que deseas eliminar esta tarea?');
    if (!confirmDelete) {
        event.preventDefault(); // Cancelar el envío del formulario si el usuario cancela la eliminación
    }
});

