<?php
$titulo = "Listar Personas";
include_once '../estructura/cabecera.php';
?>
<div class="container mt-3">
    <?php
    if (isset($_GET['message'])) {
        $validador = new validador();
        $error = $validador->tieneError($_GET['message']); //Verifico si el mensaje tiene algun error
        if(!$error) {
            //Si no tiene error muestra el mensaje en verde
        echo "<div class='mt-3 container card bg-success bg-gradient text-white text-center'>" . $_GET['message'] . "</div>";
        } else {
            //Si tiene error muestra el mensaje en rojo
        echo "<div class='mt-3 container card bg-danger bg-gradient text-white text-center'>" . $_GET['message'] . "</div>";
        }
    }
    $abmPersona = new AbmPersona();
    $lista = $abmPersona->buscar(null);
    if (count($lista) > 0) {
    ?>

        <h1 class="text-center">Personas en la Base de Datos</h1>
        <table class='table mt-3'>
            <thead class='table-dark'>
                <tr>
                    <th scope='col' class='text-center'>DNI</th>
                    <th scope='col' class='text-center'>Apellido</th>
                    <th scope='col' class='text-center'>Nombre</th>
                    <th scope='col' class='text-center'>Fecha de nacimiento</th>
                    <th scope='col' class='text-center'>Teléfono</th>
                    <th scope='col' class='text-center'>Domicilio</th>
                    <th scope='col' class='text-center'>Editar</th>
                    <th scope='col' class='text-center'>Eliminar</th>
                </tr>
            </thead>

        <?php

        foreach ($lista as $var) {
            $dni = $var->getNroDni();
            echo "<tr>
            <td class='text-center'>$dni</td>
            <td class='text-center'>{$var->getApellido()}</td>
            <td class='text-center'>{$var->getNombre()}</td>
            <td class='text-center'>{$var->getFechaNac()}</td>
            <td class='text-center'>{$var->getTelefono()}</td>
            <td class='text-center'>{$var->getDomicilio()}</td>";

            echo "<form method='post' action='../acciones/accionModificarPersona.php'>
        <td class='text-center'>
        <input name='nro_dni' id='nro_dni' type='hidden' value='$dni'><button class='btn btn-warning btn-sm' type='submit'><i class='fas fa-user-edit'></i></button></td></form>
        <form method='post' action='../acciones/accionEliminarPersona.php'>
        <td class='text-center'>
        <input name='nro_dni' id='nro_dni' type='hidden' value='$dni'><button class='btn btn-danger btn-sm' type='submit'><i class='bi bi-trash'></i></button></td></form></tr>";
        }
        echo "</table>";
    } else {
        echo "<h1 class='text-center'>No hay personas cargadas en la base de datos</h1>";
    }

        ?>
</div>

<?php
include_once '../estructura/pie.php';
?>