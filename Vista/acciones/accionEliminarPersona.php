<?php
include_once '../../configuracion.php';
$validador = new validador();

$datos = data_submitted();
$dni = $datos['nro_dni'];
$message = $validador->validarDni($dni);

if ($message != "") {
    header('Location: ../pages/eliminarPersona.php?message=' . urlencode($message));
    exit;
}

$abmPersona = new AbmPersona();

$lista = $abmPersona->buscar($datos);

if (isset($lista)) {
    $exito = $abmPersona->baja($datos);
} else {
    $message = "Persona no encontrada";
    header('Location: ../pages/eliminarPersona.php?message=' . urlencode($message));
    exit;
}

if ($exito) {
    $message = "Persona eliminada correctamente";
    header('Location: ../pages/listarPersonas.php?message=' . urlencode($message));
    exit;
} else {
    $message = "Error al eliminar persona";
    header('Location: ../pages/eliminarPersona.php?message=' . urlencode($message));
    exit;
}
