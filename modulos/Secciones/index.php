<link rel="stylesheet" href="http://localhost/encuesta/assets/css/tables.css">
<?php
require("../../config/dbcontext.php");
include("../../layout/top.php");

$sql = "SELECT * FROM secciones";
$result = $link->query($sql);
?>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mt-2 mb-2">Partidos</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm table_body">
            <table class="table table-striped" id="tabla" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">Numero</th>
                        <th scope="col">Nombre</th>
                        <th>Acciones</i></span></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        $result = $link->query($sql);
                        while ($row = $result->fetch_assoc()) { ?>
                            <tr>
                            <td scope="row"><?php echo $row['idSeccion'] ?></td>
                                <td scope="row"><?php echo $row['Nombre'] ?></td>
                                <td>Editar</td>
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
