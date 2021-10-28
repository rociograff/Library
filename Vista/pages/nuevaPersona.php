<?php
$titulo = "Nueva Persona";
include_once '../estructura/cabecera.php';
?>
<div class="container col-md-4"></div>
<div class="container mt-3 col-md-4">
    
    <h1 class="text-center">Formulario para cargar persona</h1>
    <form class="mt-3" id="datosPersona" name="datosPersona" method="post" action="../acciones/accionNuevaPersona.php">
        <div>
            <div class="form-floating">
                <input class="form-control" id="nro_dni" name="nro_dni" type="text" maxlength="8" minlength="7" placeholder="DNI">
                <label for="nro_dni">Ingrese su DNI</label>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-floating">
                <input class="form-control" id="apellido" name="apellido" type="text" placeholder="Apellido">
                <label for="apellido">Ingrese su apellido</label>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-floating">
                <input class="form-control" id="nombre" name="nombre" type="text" placeholder="Nombre">
                <label for="nombre">Ingrese su nombre</label>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-floating">
                <input class="form-control" id="fecha_nac" name="fecha_nac" type="date" placeholder="Fecha de Nacimiento">
                <label for="fecha_nac">Ingrese su fecha de nacimiento</label>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-floating">
                <input class="form-control" id="telefono" name="telefono" type="text" placeholder="Teléfono">
                <label for="telefono">Ingrese su teléfono</label>
            </div>
        </div>
        <div class="mt-3">
            <div class="form-floating">
                <input class="form-control" id="domicilio" name="domicilio" type="text" placeholder="Domicilio">
                <label for="domicilio">Ingrese su domicilio</label>
            </div>
        </div>
        <?php
        if (isset($_GET['message'])) {
            echo "<div class='mt-3 card bg-danger bg-gradient text-white text-center'>" . $_GET['message'] . "</div>";
        }
        ?>
        <div class="mt-3">
            <div class="d-grid">
                <button class="btn btn-primary" type="submit">Enviar</button>
            </div>
        </div>
    </form>
</div>

<?php
include_once '../estructura/pie.php';
?>