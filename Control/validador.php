<?php
require('../../vendor/autoload.php');  //autoload carga todas las funciones

use Respect\Validation\Validator as v;

class validador {
    //Nueva Persona
    public function validarDatos($datos) {
        $mensajeError = "";
        $valido = true;
        $nro_dni = $datos['nro_dni'];
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $fecha_nac = $datos['fecha_nac'];
        $telefono = $datos['telefono'];
        $domicilio = $datos['domicilio'];

        //Valido el numero de DNI
        $checkValid = v::positive()->noWhitespace()->length(7, 8); //CREO LA INSTANCIA DE VALIDADOR DE LA LIBRERIA
        $valido = $checkValid->validate($nro_dni); //REALIZA LA VALIDACION CON LOS PARAMETROS ELEGIDOS ANTERIORMENTE
        if (!$valido) {
            //EN CASO DE NO SER VALIDO RETORNA UN MENSAJE DE ERROR
            $mensajeError .= "DNI inválido<br>";
        }

        //Valido el apellido
        $checkValid = v::alpha()->length(1, 50)->regex("/^[A-Z]+([\ A-Za-z]+)*/");
        $valido = $checkValid->validate($apellido);
        if (!$valido) {
            $mensajeError .= "Apellido inválido<br>";
        }

        //Valido el nombre
        $checkValid = v::alpha()->length(1, 50)->regex("/^[A-Z]+([\ A-Za-z]+)*/");
        $valido = $checkValid->validate($nombre);
        if (!$valido) {
            $mensajeError .= "Nombre inválido<br>";
        }

        //Valido la fecha de nacimiento
        $checkValid = v::minAge(0)->date();  //minAge(0) para que se pueda cargar una persona que haya nacido
        $valido = $checkValid->validate($fecha_nac);
        if (!$valido) {
            $mensajeError .= "Fecha inválida<br>";
        }

        //Valido el numero de telefono
        $checkValid = v::phone();
        $valido = $checkValid->validate($telefono);
        if (!$valido) {
            $mensajeError .= "Teléfono inválido<br>";
        }

        //Valido el domicilio
        $checkValid = v::stringType()->length(5, 200);   //Longitud (5, 200) porque NULL tiene longitud 4
        $valido = $checkValid->validate($domicilio);
        if (!$valido) {
            $mensajeError .= "Domicilio inválido<br>";
        }

        return $mensajeError;
    }

    //Modificar Persona
    public function validarDatosModificacion($datos) {
        $mensajeError = "";
        $valido = true;
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $telefono = $datos['telefono'];
        $domicilio = $datos['domicilio'];

        //Valido el apellido
        $checkValid = v::alpha()->length(1, 50)->regex("/^[A-Z]+([\ A-Za-z]+)*/");
        $valido = $checkValid->validate($apellido);
        if (!$valido) {
            $mensajeError .= "Apellido inválido<br>";
        }

        //Valido el nombre
        $checkValid = v::alpha()->length(1, 50)->regex("/^[A-Z]+([\ A-Za-z]+)*/");
        $valido = $checkValid->validate($nombre);
        if (!$valido) {
            $mensajeError .= "Nombre inválido<br>";
        }

        //Valido el numero de telefono
        $checkValid = v::phone();
        $valido = $checkValid->validate($telefono);
        if (!$valido) {
            $mensajeError .= "Teléfono inválido<br>";
        }

        //Valido el domicilio
        $checkValid = v::stringVal()->length(5, 200); //Longitud (5, 200) porque NULL tiene longitud 4
        $valido = $checkValid->validate($domicilio);
        if (!$valido) {
            $mensajeError .= "Domicilio inválido<br>";
        }

        return $mensajeError;
    }

    //Validar DNI para modificar una persona
    public function validarDni($dni) {
        $mensajeError = "";
        $checkValid = v::positive()->noWhitespace()->length(7, 8); //CREO LA INSTANCIA DE VALIDADOR DE LA LIBRERIA
        $valido = $checkValid->validate($dni); //REALIZA LA VALIDACION CON LOS PARAMETROS ELEGIDOS ANTERIORMENTE
        if (!$valido) {
            //EN CASO DE NO SER VALIDO RETORNA UN MENSAJE DE ERROR
            $mensajeError .= "DNI inválido";
        }
        return $mensajeError;
    }

    //Verifico si el mensaje tiene error
    public function tieneError($mensaje) {
        return v::contains('Error')->validate($mensaje);
    }
}
