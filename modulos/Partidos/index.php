<?php
require("../../config/dbcontext.php");
include("../../layout/top.php");

// Variable para almacenar el número de registros a mostrar, por defecto 10
$numRegistrosPorPagina = 10;

// Verifica si se ha seleccionado una nueva cantidad de registros
if (isset($_GET['registros'])) {
    $numRegistrosPorPagina = $_GET['registros'];
}

$sql = "SELECT * FROM partidos";
$result = $link->query($sql);
?>
<br>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mt-2 mb-2">Partidos</h3>
        <div class=" input-search col-xs-2 ">
            <input type="search" id="search" class="form-control input" placeholder="Busqueda...">
        </div>
        <div class="col-xs-2">
            <select id="cantidadRegistros" class="form-select">
                <option value="5" <?php if ($numRegistrosPorPagina == 5) echo "selected"; ?>>5</option>
                <option value="10" <?php if ($numRegistrosPorPagina == 10) echo "selected"; ?>>10</option>
                <option value="20" <?php if ($numRegistrosPorPagina == 20) echo "selected"; ?>>20</option>
                <option value="50" <?php if ($numRegistrosPorPagina == 50) echo "selected"; ?>>50</option>
                <option value="100" <?php if ($numRegistrosPorPagina == 100) echo "selected"; ?>>100</option>
            </select>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm table_body">
            <table class="table table-striped" id="tablaid" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        // Limita el resultado de la consulta según la cantidad seleccionada
                        $sql .= " LIMIT $numRegistrosPorPagina";
                        $result = $link->query($sql);
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                                <td scope="row"><?php echo $row['Nombre'] ?></td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='1'>No se encontraron registros.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("../../layout/foot.php") ?>

<script>
    // Función para actualizar la página al cambiar la cantidad de registros
    function actualizarPagina() {
        var cantidadRegistros = document.getElementById("cantidadRegistros").value;
        // Redirige a la misma página pero con el parámetro 'registros' en la URL
        window.location.href = '<?php echo $_SERVER['PHP_SELF']; ?>?registros=' + cantidadRegistros;
    }

    // Asigna la función al evento change del select
    document.getElementById("cantidadRegistros").addEventListener("change", actualizarPagina);
</script>