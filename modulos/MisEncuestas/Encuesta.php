<?php
include("../../layout/top.php");
require("../../config/dbcontext.php");
?>

<div class="container mt-3">
    <div class="card">
        <div class="card-header">
            <h3 class="d-flex flex-column flex-md-row justify-content-center">Datos Familia</h3>
        </div>
        <div class="card-body">
            <form method="post" id="formEncuesta">
                <div class="mb-3">
                    <label for="nombreFamilia" class="form-label>">Nombre Familia</label>
                    <input type="text" class="form-control" id="nombreFamilia" name="nombreFamilia" required>
                </div>
                <div class="mb-3">
                    <label for="" class="formlabel">No. Integrantes</label>
                    <input type="number" class="form-control" id="NumVotantes" name="NumVotantes" required>
                </div>
                <div class="mb-3">
                    <label for="" class="formlabel">Manzana</label>
                    <select name="" id="" class="form-control">
                        <option value="">Manzana 1</option>
                    </select>
                </div>
                <div id="container" class="mb-3">

                </div>
                <div class="mt-3">
                    <button id="addButton" class="btn btn-success">Agregar Integrantes</button>
                    <button id="removeButton" class="btn btn-danger">Eliminar Último Integrante</button>
                </div>
                <input type="hidden" id="inputCount" name="inputCount" value="0">

            </form>
        </div>
    </div>
</div>


<?php include("../../layout/foot.php"); ?>