<?php 
require("../../config/dbcontext.php");
include("../../layout/top.php");

$sql = "SELECT * FROM partidos";
$result = $link->query($sql);
?>
<br>
<div class="card">
    <div class="card-header">
        <h3 class="mt-2 mb-2">Partidos</h3>
    </div>
    <div class="card-body p-2"> <!-- Aquí puedes ajustar el padding según tus necesidades -->
        <div class="table-responsive">
            <table class="table table-sm" id="tabla_id">
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
                                <td><?php echo $row['Nombre'] ?></td>
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

<?php include("../../layout/foot.php")?>
