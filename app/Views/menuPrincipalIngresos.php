<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú Principal Ingresos</title>
    <link rel="stylesheet" href="/MoneyMinder/public/css/menuPrincipalIngresos.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="/MoneyMinder/public/js/menuPrincipalIngresos.js"></script>
    <script src="/MoneyMinder/public/js/menuPrincipalIngresos.js"></script>
</head>
<body>

<?php
//porcion de codigo para guardar el nombre de usuario
if (isset($_SESSION['usuario_id'])) {
    //asignar a variable
    $userid = $_SESSION['usuario_id'];
    $username= $_SESSION['nombre_usuario'];
}
?>

    <header>
        <img src="/MoneyMinder/public/img/logo.jpeg" alt="Money Minder Logo" class="logo">
        
        <div class="user-profile">
            
            <div class="user-details">
                <span><?php echo ($username)?></span>
                <a href="/MoneyMinder/index.php/editarPerfil" class="add-button">Editar Perfil</a>
                <button type="button" onclick="cerrarSesion()">Cerrar Sesión</button>
            </div>
        </div>
    </header>
    <main>
        <aside class="sidebar">
            <button class="menu-item selected no-pointer">Menú principal</button>
            <a href="/MoneyMinder/index.php/menuPrincipalIngresos" class="menu-item selected">Ingresos</a>
            <a href="/MoneyMinder/index.php/gastos" class="menu-item">Gastos</a>
            <a href="/MoneyMinder/index.php/metasDeAhorro" class="menu-item">Metas de ahorro</a>
            <a href="/MoneyMinder/index.php/tipsAhorro" class="menu-item">Tips de ahorro</a>
            <a href="/MoneyMinder/index.php/configuracionCambiarContrasena" class="menu-item">Configuración</a>
        </aside>
        <section class="content">
            <h1>Ingresos</h1>
            <div class="search-bar">
            <input type="text" placeholder="Buscar" class="search-input" id="search-input" onkeyup="filterTable()">
                <a href="/MoneyMinder/index.php/agregarIngreso" class="add-button">Agregar ingreso</a>
            </div>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (isset($ingresos) && is_array($ingresos)): ?>
                        <?php foreach ($ingresos as $ingreso): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($ingreso['nombre']); ?></td>
                                <td><?php echo htmlspecialchars($ingreso['monto']); ?></td>
                                <td><?php echo htmlspecialchars($ingreso['fecha']); ?></td>
                                <td>
                                    <!--<button class='edit-button' onclick="location.href='/MoneyMinder/index.php?action=editarIngreso&id=<?php echo $ingreso['id']; ?>'">✏️</button>
                                    <!--<button class='delete-button' onclick="location.href='/MoneyMinder/index.php?action=eliminarIngreso&id=<?php echo $ingreso['id']; ?>'">🗑️</button>-->
                                   
                                    <form action="/MoneyMinder/index.php/editarIngreso" method="get" style="display: inline-block;">
                                        <input type="hidden" name="id" value="<?php echo $ingreso['id']; ?>">
                                        <button class="edit-button" type="submit">✏️</button>
                                    </form>

                                   
                                    <form action="/MoneyMinder/index.php/eliminarIngreso" method="post" style="display: inline-block;">
                                        <input type="hidden" name="id" value=<?php echo $ingreso['id']; ?> />
                                        <button class='delete-button' type="submit">🗑️</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="4">No hay ingresos disponibles.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </section>
    </main>

<script>
function cerrarSesion() {
    Swal.fire({
        title: '¿Estás seguro?',
        text: "Vas a cerrar tu sesión.",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#b4a7d6',
        cancelButtonColor: '#b4a7d6',
        confirmButtonText: 'Sí, cerrar sesión',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            // Redirigir a la ruta de cierre de sesión
            window.location.href = '/MoneyMinder/index.php/cerrarSesion';
        }
    });
}
</script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    function confirmDelete(id, form) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "Esta acción no se puede deshacer.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#b4a7d6',
            cancelButtonColor: '#b4a7d6',
            confirmButtonText: 'Sí, eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                // Enviar la solicitud de eliminación
                form.submit();
                Swal.fire(
                    'Eliminado!',
                    'El ingreso ha sido eliminado.',
                    'success'
                );
            }
        });
    }

    // Agregar eventos a los botones de eliminar
    document.querySelectorAll('.delete-button').forEach(function (button) {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Evitar el envío del formulario predeterminado
            const form = this.closest('form');
            const id = this.getAttribute('data-id');
            confirmDelete(id, form);
        });
    });
});
</script>
<script>
function filterTable() {
    const input = document.getElementById("search-input");
    const filter = input.value.toLowerCase();
    const table = document.querySelector(".data-table");
    const rows = table.getElementsByTagName("tr");

    for (let i = 1; i < rows.length; i++) { // Comienza desde 1 para omitir el encabezado
        const cells = rows[i].getElementsByTagName("td");
        let rowVisible = false;

        for (let j = 0; j < cells.length; j++) {
            const cell = cells[j];
            if (cell) {
                const textValue = cell.textContent || cell.innerText;
                if (textValue.toLowerCase().indexOf(filter) > -1) {
                    rowVisible = true;
                    break;
                }
            }
        }

        rows[i].style.display = rowVisible ? "" : "none"; // Mostrar u ocultar la fila
    }
}
</script>


    <footer>
        <p>© 2024 Money Minder</p>
    </footer>
</body>
</html>

