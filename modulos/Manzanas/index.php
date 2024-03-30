<?php
require("../../config/dbcontext.php");
include("../../layout/top.php");

// Ejecutar la primera consulta SQL
$sql = "SELECT manzanas.*, 
secciones.Nombre, 
jefasmanzanas.NomJefManzana,
familias.NumVotantes
FROM manzanas
INNER JOIN secciones ON manzanas.idSeccion = secciones.idSeccion
INNER JOIN jefasmanzanas ON manzanas.idJefaManzana = jefasmanzanas.idJefaManzana
INNER JOIN (
SELECT idManzana, SUM(NumVotantes) AS NumVotantes
FROM familias
GROUP BY idManzana
) AS familias ON manzanas.idManzana = familias.idManzana";

$result = $link->query($sql);

// Ejecutar la segunda consulta SQL
$sql2 = "SELECT m.idManzana,
s.idSeccion,
p.idPartido,
COUNT(*) AS TotalRegistrosPorPartido
FROM manzanas m
INNER JOIN secciones s ON m.idSeccion = s.idSeccion
INNER JOIN familias f ON m.idManzana = f.idManzana
INNER JOIN votantes v ON f.idFamilia = v.idFamilia
INNER JOIN partidos p ON v.idPartido = p.idPartido
GROUP BY m.idManzana, s.idSeccion, p.idPartido";

$result2 = $link->query($sql2);

// Crear un arreglo asociativo para almacenar los totales de votantes por partido
$totales_por_partido = array();
while ($row = $result2->fetch_assoc()) {
    $idManzana = $row['idManzana'];
    $idSeccion = $row['idSeccion'];
    $idPartido = $row['idPartido'];
    $totales_por_partido["$idManzana-$idSeccion-$idPartido"] = $row['TotalRegistrosPorPartido'];
}
?>

<div class="card table mt-5">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h3 class="mt-2 mb-2">Manzanas</h3>
    </div>
    <div class="card-body">
        <div class="table-responsive-sm">
            <table class="table" id="tabla" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No Manzana</th>
                        <th scope="col">No.Casas</th>
                        <th scope="col">No Votantes</th>
                        <th scope="col">Jefa Manzana</th>
                        <th scope="col">Seccion</th>
                        <th scope="col">MORENA</th>
                        <th scope="col">PT</th>
                        <th scope="col">PRD</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) { 
                            // Aquí imprimes los datos de cada manzana
                            ?>
                            <tr>
                                <td scope="row"><?php echo $row['idManzana'] ?></td>
                                <td scope="row"><?php echo $row['NumCasas'] ?></td>
                                <td scope="row"><?php echo $row['NumVotantes'] ?></td>
                                <td scope="row"><?php echo $row['NomJefManzana'] ?></td>
                                <td scope="row"><?php echo $row['Nombre'] ?></td>
                                <td scope="row"><?php echo isset($totales_por_partido[$row['idManzana'].'-'.$row['idSeccion'].'-1']) ? $totales_por_partido[$row['idManzana'].'-'.$row['idSeccion'].'-1'] : 0; ?></td>
                                <td scope="row"><?php echo isset($totales_por_partido[$row['idManzana'].'-'.$row['idSeccion'].'-2']) ? $totales_por_partido[$row['idManzana'].'-'.$row['idSeccion'].'-2'] : 0; ?></td>
                                <td scope="row"><?php echo isset($totales_por_partido[$row['idManzana'].'-'.$row['idSeccion'].'-3']) ? $totales_por_partido[$row['idManzana'].'-'.$row['idSeccion'].'-3'] : 0; ?></td>
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
<script src="http://localhost/encuesta/assets/js/tables.js"></script>
<?php include("../../layout/foot.php") ?>
