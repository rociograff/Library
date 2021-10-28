<?php
$titulo = "Eliminar Persona";
include_once '../estructura/cabecera.php';

$abmPersona = new AbmPersona();
$lista = $abmPersona->buscar(null);

if (isset($lista)) {
?>

    <div class="col-md-4"></div>
    <div class="container col-md-4 mt-3">
        <h1 class="text-center">Eliminar Persona</h1>
        <form class="mt-3" id="buscarPersona" method="post" action="../acciones/accionEliminarPersona.php">
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
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4 mb-3 mt-3">
                    <div class="d-grid">
                        <button class="btn btn-primary" type="submit" value="Enviar">Enviar</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

<?php
} else {
    echo "<h1>No hay personas cargadas en la base de datos</h1>";
}
include_once '../estructura/pie.php';
