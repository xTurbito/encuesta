<?php 
include("../../layout/top.php"); 
require("../../config/dbcontext.php");

?>

<div class="card mt-5">
        <div class="card-header">
        <a class="btn mt-2 mb-2 btn-hover-gray" href="Encuesta.php" role="button" style="color: #8000ff">Nueva Encuesta <i class="fa-solid fa-plus"></i></a>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre Familia</th>
                            <th>Acciones</th>
                            
                        </tr>
                    </thead>
                    <tbody>
        
                  </tbody>
                </table>
            </div>
        </div>
    </div>

<?php include("../../layout/foot.php"); ?>