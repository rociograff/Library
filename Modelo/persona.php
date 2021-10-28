<?php
class persona {
    //Atributos
    private $nroDni;
    private $apellido;
    private $nombre;
    private $fechaNac;
    private $telefono;
    private $domicilio;
    private $mensajeOperacion;

    //Constructor
    public function __construct() {
        $this->nroDni = "";
        $this->apellido = "";
        $this->nombre = "";
        $this->fechaNac = "";
        $this->telefono = "";
        $this->domicilio = "";
        $this->mensajeOperacion = "";
    }

    //Metodos observadores
    public function getNroDni() {
        return $this->nroDni;
    }

    public function getApellido() {
        return $this->apellido;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getFechaNac() {
        return $this->fechaNac;
    }

    public function getTelefono() {
        return $this->telefono;
    }

    public function getDomicilio() {
        return $this->domicilio;
    }

    public function getMensajeOperacion() {
        return $this->mensajeOperacion;
    }

    //Metodos Modificadores
    public function setNroDni($nroDni) {
        $this->nroDni = $nroDni;
    }

    public function setApellido($apellido) {
        $this->apellido = $apellido;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setFechaNac($fechaNac) {
        $this->fechaNac = $fechaNac;
    }

    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setDomicilio($domicilio) {
        $this->domicilio = $domicilio;
    }

    public function setMensajeOperacion($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    //Metodo para setear
    public function setear($dni, $apellido, $nombre, $domicilio, $fechaNac, $telefono) {
        $this->setNroDni($dni);
        $this->setApellido($apellido);
        $this->setNombre($nombre);
        $this->setDomicilio($domicilio);
        $this->setFechaNac($fechaNac);
        $this->setTelefono($telefono);
    }

    /******************Funciones Base de Datos******************/
    public function cargar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM 'persona' WHERE nro_dni = " . $this->getNroDni();
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    $row = $base->Registro();
                    $this->setear(
                        $row['nro_dni'],
                        $row['apellido'],
                        $row['nombre'],
                        $row['domicilio'],
                        $row['fecha_nac'],
                        $row['telefono']
                    );
                }
            }
        } else {
            $this->setmensajeoperacion("Tabla->listar: " . $base->getError());
        }
        return $resp;
    }

    public function modificar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE persona SET apellido = '{$this->getApellido()}', nombre = '{$this->getNombre()}', telefono = '{$this->getTelefono()}' , domicilio = '{$this->getDomicilio()}' , fecha_nac = '{$this->getFechaNac()}' WHERE nro_dni = '" . $this->getNroDni() . "'";
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setmensajeoperacion("Persona->modificar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Persona->modificar: " . $base->getError());
        }
        return $resp;
    }

    public function eliminar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM persona WHERE nro_dni = " . $this->getNroDni();
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                return true;
            } else {
                $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Tabla->eliminar: " . $base->getError());
        }
        return $resp;
    }

    public static function listar($parametro = "") {
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM persona ";

        if ($parametro != "") {
            $sql .= 'WHERE ' . $parametro;
        }
        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if ($res > -1) {
                if ($res > 0) {
                    while ($row = $base->Registro()) {
                        $obj = new persona();
                        $obj->setear(
                            $row['nro_dni'],
                            $row['apellido'],
                            $row['nombre'],
                            $row['domicilio'],
                            $row['fecha_nac'],
                            $row['telefono']
                        );
                        array_push($arreglo, $obj);
                    }
                }
            }
        } else {
            $this->setMensajeOperacion("Tabla->listar: " . $base->getError());
            // echo $base->getError();
        }
        return $arreglo;
    }

    public function insertar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO persona(nro_dni, apellido, nombre, fecha_nac, telefono, domicilio)
                VALUES('" . $this->getNroDni() . "', '" . $this->getApellido() . "', '" . $this->getNombre() . "', '" . $this->getFechaNac() . "', " . $this->getTelefono() . ", '" . $this->getDomicilio() . "')";
        if ($base->Iniciar()) {
            if ($elid = $base->Ejecutar($sql)) {
                $this->setNroDni($elid);
                $resp = true;
            } else {
                $this->setmensajeoperacion("Persona->insertar: " . $base->getError());
            }
        } else {
            $this->setmensajeoperacion("Persona->insertar: " . $base->getError());
        }
        return $resp;
    }
}
