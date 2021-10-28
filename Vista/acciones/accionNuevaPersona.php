<?php
include_once '../../configuracion.php';
$datos = data_submitted();
$datosBusqueda["nro_dni"] = $datos["nro_dni"];


$validador = new validador();
$message = $validador->validarDatos($datos);

if ($message != "") {
    header("Location: ../pages/nuevaPersona.php?message=" . urlencode($message));
    exit;
} else {
    $abmPersona = new AbmPersona();

    $listaPersona = $abmPersona->buscar($datosBusqueda);
    if (isset($listaPersona[0])) {
        $message = "El DNI ingresado ya se encuentra en la base de datos";
        header("Location: ../pages/nuevaPersona.php?message=" . urlencode($message));
        exit;
    }
    $exito = $abmPersona->alta($datos);
    if ($exito) {
        $message = "Nueva persona cargada correctamente";
        header('Location: ../pages/listarPersonas.php?message=' . $message);
        exit;
    } else {
        $message = "Error al cargar nueva persona";
        header('Location: ../pages/nuevaPersona.php?message=' . $message);
        exit;
    }
}

include_once '../estructura/pie.php';
