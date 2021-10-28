<?php
require('../../vendor/autoload.php');

use Respect\Validation\Validator as v;

class validador
{
    public function validarDatos($datos)
    {
        $mensajeError = "";
        $valido = true;
        $nro_dni = $datos['nro_dni'];
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $fecha_nac = $datos['fecha_nac'];
        $telefono = $datos['telefono'];
        $domicilio = $datos['domicilio'];

        //VALIDO EL NUMERO DE DNI
        $checkValid = v::positive()->noWhitespace()->length(7, 8); //CREO LA INSTANCIA DE VALIDADOR DE LA LIBRERIA
        $valido = $checkValid->validate($nro_dni); //REALIZA LA VALIDACION CON LOS PARAMETROS ELEGIDOS ANTERIORMENTE
        if (!$valido) {
            //EN CASO DE NO SER VALIDO RETORNA UN MENSAJE DE ERROR
            $mensajeError .= "DNI inválido<br>";
        }

        $checkValid = v::alpha()->length(1, 50)->regex("/^[A-Z]+([\ A-Za-z]+)*/");
        $valido = $checkValid->validate($apellido);
        if (!$valido) {
            $mensajeError .= "Apellido inválido<br>";
        }

        $checkValid = v::alpha()->length(1, 50)->regex("/^[A-Z]+([\ A-Za-z]+)*/");
        $valido = $checkValid->validate($nombre);
        if (!$valido) {
            $mensajeError .= "Nombre inválido<br>";
        }

        $checkValid = v::minAge(0)->date();
        $valido = $checkValid->validate($fecha_nac);
        if (!$valido) {
            $mensajeError .= "Fecha inválida<br>";
        }

        $checkValid = v::phone();
        $valido = $checkValid->validate($telefono);
        if (!$valido) {
            $mensajeError .= "Teléfono inválido<br>";
        }

        $checkValid = v::stringType()->length(5, 200);
        $valido = $checkValid->validate($domicilio);
        if (!$valido) {
            $mensajeError .= "Domicilio inválido<br>";
        }

        return $mensajeError;
    }

    public function validarDatosModificacion($datos)
    {
        $mensajeError = "";
        $valido = true;
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $telefono = $datos['telefono'];
        $domicilio = $datos['domicilio'];

        $checkValid = v::alpha()->length(1, 50)->regex("/^[A-Z]+([\ A-Za-z]+)*/");
        $valido = $checkValid->validate($apellido);
        if (!$valido) {
            $mensajeError .= "Apellido inválido<br>";
        }

        $checkValid = v::alpha()->length(1, 50)->regex("/^[A-Z]+([\ A-Za-z]+)*/");
        $valido = $checkValid->validate($nombre);
        if (!$valido) {
            $mensajeError .= "Nombre inválido<br>";
        }

        $checkValid = v::phone();
        $valido = $checkValid->validate($telefono);
        if (!$valido) {
            $mensajeError .= "Teléfono inválido<br>";
        }

        $checkValid = v::stringVal()->length(5, 200);
        $valido = $checkValid->validate($domicilio);
        if (!$valido) {
            $mensajeError .= "Domicilio inválido<br>";
        }

        return $mensajeError;
    }

    public function validarDni($dni)
    {
        $mensajeError = "";
        $checkValid = v::positive()->noWhitespace()->length(7, 8); //CREO LA INSTANCIA DE VALIDADOR DE LA LIBRERIA
        $valido = $checkValid->validate($dni); //REALIZA LA VALIDACION CON LOS PARAMETROS ELEGIDOS ANTERIORMENTE
        if (!$valido) {
            //EN CASO DE NO SER VALIDO RETORNA UN MENSAJE DE ERROR
            $mensajeError .= "DNI inválido";
        }
        return $mensajeError;
    }

    public function tieneError($mensaje) {
        return v::contains('Error')->validate($mensaje);
        
    }
}
