<?php
include_once '../../configuracion.php';
$datos = data_submitted();

$validador = new validador();
$message = $validador->validarDatosModificacion($datos);

if ($message == "") {
    $datosBusqueda['nro_dni'] = $datos['nro_dni'];
    $datosBusqueda['fecha_nac'] = $datos['fecha_nac'];
    $abmPersona = new AbmPersona();

    $lista = $abmPersona->buscar($datosBusqueda);

    if (!isset($lista)) {
        $message = "La persona ingresada no se encuentra en la base de datos";
        header('Location: accionModificarPersona.php?message=' . urlencode($message));
        exit;
    } else {
        $exito = $abmPersona->modificar($datos);
        if ($exito) {
            $message = "Datos modificados correctamente";
        } else {
            $message = "Error en la modificacion de datos";
        }
        header('Location: ../pages/listarPersonas.php?message=' . urlencode($message));
        exit;
    }
} else {
    header('Location: accionModificarPersona.php?message=' . urlencode($message));
    exit;
}
