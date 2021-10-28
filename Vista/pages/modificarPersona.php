<?php
$titulo = "Modificar Persona";
include_once '../estructura/cabecera.php';
?>

<div class="col-md-4"></div>
<div class="container col-md-4 mt-3">
    <h1 class="text-center">Modificar Persona</h1>
    <form class="mt-3" id="buscarPersona" name="buscarPersona" method="post" action="../acciones/accionModificarPersona.php">
        <div>
            <div class="form-floating">
                <input class="form-control" id="nro_dni" name="nro_dni" type="text" maxlength="8" minlength="7" placeholder="DNI">
                <label for="nro_dni">Ingrese su DNI</label>
            </div>
        </div>
        <?php
        if (isset($_GET['message'])) {
            echo "<div class='mt-3 card bg-danger bg-gradient text-white text-center'>" . $_GET['message'] . "</div>";
        }
        ?>
        <div class="row mt-3">
            <div class="col-md-4"></div>
            <div class="col-md-4">
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit" value="Enviar">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include_once '../estructura/pie.php';
