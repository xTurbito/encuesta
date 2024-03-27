<?php 
require("../../config/dbcontext.php");
include("../../layout/top.php");

$sql = "SELECT * FROM partidos";
$result = $link->query($sql);
?>
<br>
<div class="container">
    <br>
    <div class="card w-auto"> <!-- Agrega la clase "text-center" aquí -->
        <div class="card-header">
            <h3 class="mt-2 mb-2">Partidos</h3>
        </div>
        <div class="card-body"> 
            <div class="table-responsive-sm">
                <table class="table" id="tabla_id">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if ($result->num_rows > 0) {
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
</div>
<?php include("../../layout/foot.php")?>
