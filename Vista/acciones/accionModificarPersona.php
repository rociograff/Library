<?php
include_once '../../configuracion.php';
$datos = data_submitted();

$validador = new validador();

if (isset($datos['nro_dni'])) {
    $dni = $datos['nro_dni'];
    $message = $validador->validarDni($dni); //Verifico el DNI para modificar a la persona 

    if ($message != "") {
        header('Location: ../pages/modificarPersona.php?message=' . urlencode($message));
        exit;
    }
}

$abmPersona = new AbmPersona();
$lista = $abmPersona->buscar($datos);

if (!isset($lista[0])) {
    $message = "Persona no encontrada";
    header('Location: ../pages/modificarPersona.php?message=' . urlencode($message));
    exit;
}

$titulo = "Modificar Persona";
include_once '../estructura/cabecera.php';

?>
<div class="col-md-4"></div>
<div class="container col-md-4 mt-3">
    <h1 class="text-center">Modificar Datos</h1>
    <?php
    if (isset($_GET['message'])) {
        echo "<div class='mt-3 card bg-danger text-white text-center'>" . $_GET['message'] . "</div>";
    }
    ?>
    <form id="datosPersona" name="modificarPersona" method="post" action="../acciones/accionModificarDatos.php">
        <div>
            <?php
            echo "<input id='nro_dni' name='nro_dni' type='hidden' value=" . $lista[0]->getNroDni() . ">";
            echo "<input id='fecha_nac' name='fecha_nac' type='hidden' value=" . $lista[0]->getFechaNac() . ">";
            ?>
        </div>
        <div class="mt-3">
            <div class="form-floating">
                <?php
                echo "<input class='form-control' id='apellido' name='apellido' type='text' placeholder='Apellido' value='{$lista[0]->getApellido()}'>";
                ?>
                <label for="apellido">Ingrese su apellido</label>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-floating">
                <?php
                echo "<input class='form-control' id='nombre' name='nombre' type='text' placeholder='Nombre' value='{$lista[0]->getNombre()}'>";
                ?>
                <label for="nombre">Ingrese su nombre</label>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-floating">
                <?php
                echo "<input class='form-control' id='telefono' name='telefono' type='text' placeholder='Teléfono' value='{$lista[0]->getTelefono()}'>";
                ?>
                <label for="telefono">Ingrese su teléfono</label>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-floating">
                <?php
                echo "<input class='form-control' id='domicilio' name='domicilio' type='text' placeholder='Domicilio' value='{$lista[0]->getDomicilio()}'>";
                ?>
                <label for="domicilio">Ingrese su domicilio</label>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4 mt-3">
                <div class="d-grid">
                    <button class="btn btn-primary" type="submit">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>

<?php
include_once '../estructura/pie.php';