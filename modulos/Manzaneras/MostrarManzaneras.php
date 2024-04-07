<?php 
require("../../config/dbcontext.php");  

$sql ="SELECT *, jefasManzanas.NomJefManzana, jefasSecciones.Nombre AS NombreJefaSeccion, manzanas.NombreManzana AS NombreManzana
FROM jefasManzanas 
LEFT JOIN jefasSecciones ON jefasManzanas.idJefaSeccion = jefasSecciones.idJefaSeccion
LEFT JOIN manzanas ON jefasManzanas.idManzana = manzanas.idManzana";


$result = $link->query($sql);
?>

<?php
 if($result->num_rows > 0){
     while($row = $result->fetch_assoc()){ ?>
            <tr>
                <td><?php echo $row['NomJefManzana']; ?></td>
                <td><?php echo $row['NombreManzana']; ?></td>
                <td><?php echo $row['NombreJefaSeccion'] ?></td>
                <td>
                    <a href="EditarManzanera.php?id=<?php echo $row['idJefaManzana']; ?>" class="btn btn-warning">Editar</a>
                    <a href="EliminarManzanera.php?id=<?php echo $row['idJefaManzana']; ?>" class="btn btn-danger">Eliminar</a>
                </td>
<?php
     }
 }
?>

