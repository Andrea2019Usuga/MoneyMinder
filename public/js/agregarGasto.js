document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('ingreso-form');

    // Agrega un listener al formulario para capturar el evento submit
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Previene el envío del formulario por defecto

        // Validación del formulario
        const nombreIngreso = document.getElementById('nombre-ingreso').value;
        const monto = document.getElementById('monto').value;
        const dia = document.getElementById('dia').value;
        const mes = document.getElementById('mes').value;
        const año = document.getElementById('año').value;

        // Aquí puedes agregar la lógica para guardar los datos o enviarlos al servidor
        console.log('Datos del formulario:', {
            nombreIngreso,
            monto,
            dia,
            mes,
            año
        });
        // Redireccionar después de guardar
        window.location.href = '6menu principal ingresos.html';  
    });
});