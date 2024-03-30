<link rel="stylesheet" href="http://localhost/encuesta/assets/css/tables.css">
<?php
require("../../config/dbcontext.php");
include("../../layout/top.php");

$sql = "SELECT * FROM partidos";
$result = $link->query($sql);
?>
<style>
    .card{
        margin-top: 60px;
    }
</style>
<br>
<div class="card">
    <div class="card-header">
        <h3 class="mt-2 mb-2">Partidos</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table" id="tabla">
                <thead>
                    <tr>
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
<script src="http://localhost/encuesta/assets/js/tables.js"></script>