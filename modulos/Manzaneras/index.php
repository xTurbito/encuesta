<?php 
include("../../layout/top.php"); 
require("../../config/dbcontext.php");

?>

    <div class="card mt-5">
        <div class="card-header">
            <a href="">ALTA JEFA MANZANA</a>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Manzana</th>
                            <th>Seccion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php include("./MostrarManzaneras.php") ?>
                  </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include("../../layout/foot.php"); ?>