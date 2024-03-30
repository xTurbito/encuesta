<?php
require("../../config/dbcontext.php");
include("../../layout/top.php");

// Ejecutar la primera consulta SQL
$sql = "SELECT 
m.NombreManzana AS NombreManzana,
m.NumCasas AS TotalCasas,
SUM(f.NumVotantes) AS TotalVotantes,
jefas.NomJefManzana AS JefaManzana,
s.Nombre AS Seccion,
(SELECT COUNT(*) FROM votantes v1 WHERE v1.idPartido = 1 AND v1.idFamilia IN (SELECT idFamilia FROM Familias WHERE idManzana = m.idManzana)) AS PRD,
(SELECT COUNT(*) FROM votantes v2 WHERE v2.idPartido = 2 AND v2.idFamilia IN (SELECT idFamilia FROM Familias WHERE idManzana = m.idManzana)) AS PAN,
(SELECT COUNT(*) FROM votantes v3 WHERE v3.idPartido = 3 AND v3.idFamilia IN (SELECT idFamilia FROM Familias WHERE idManzana = m.idManzana)) AS MORENA,
(SELECT COUNT(*) FROM votantes v3 WHERE v3.idPartido = 4 AND v3.idFamilia IN (SELECT idFamilia FROM Familias WHERE idManzana = m.idManzana)) AS NOSABE
FROM 
manzanas m
LEFT JOIN 
Familias f ON m.idManzana = f.idManzana
LEFT JOIN 
jefasmanzanas jefas ON m.idJefaManzana = jefas.idJefaManzana
LEFT JOIN 
Secciones s ON m.idSeccion = s.idSeccion
GROUP BY 
m.NombreManzana, jefas.NomJefManzana, s.Nombre;
";
$result = $link->query($sql);

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
                        <th scope="col">PAN</th>
                        <th scope="col">PRD</th>
                        <th scope="col">NOSABE</th> <!-- Agregamos la columna para NOSABE -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            // Aquí imprimes los datos de cada manzana
                    ?>
                            <tr>
                                <td scope="row"><?php echo $row['NombreManzana'] ?></td>
                                <td scope="row"><?php echo $row['TotalCasas'] ?></td>
                                <td scope="row"><?php echo $row['TotalVotantes'] ?></td>
                                <td scope="row"><?php echo $row['JefaManzana'] ?></td>
                                <td scope="row"><?php echo $row['Seccion'] ?></td>
                                <td scope="row"><?php echo $row['MORENA'] ?></td> <!-- Mostramos el número de votantes de MORENA -->
                                <td scope="row"><?php echo $row['PAN'] ?></td> <!-- Mostramos el número de votantes de PT -->
                                <td scope="row"><?php echo $row['PRD'] ?></td> <!-- Mostramos el número de votantes de PRD -->
                                <td scope="row"><?php echo $row['NOSABE'] ?></td> <!-- Mostramos el número de votantes de NOSABE -->
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