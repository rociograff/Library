<?php

class AbmPersona
{

    private function cargarObjeto($parametro)
    {
        $persona = null;
        if (array_key_exists('nro_dni', $parametro)) {
            $persona = new persona();
            $persona->setear(
                $parametro['nro_dni'],
                $parametro['nombre'],
                $parametro['apellido'],
                $parametro['domicilio'],
                $parametro['fecha_nac'],
                $parametro['telefono']
            );
        }
        return $persona;
    }

    private function cargarObjetoConClave($parametro)
    {
        $obj = null;
        if (isset($parametro['nro_dni'])) {
            $obj = new persona();
            $obj->setear($parametro['nro_dni'], null, null, null, null, null);
        }
        return $obj;
    }

    private function seteadosCamposClaves($parametro)
    {
        $resp = false;
        if (isset($parametro['nro_dni'])) {
            $resp = true;
        }
        return $resp;
    }

    public function alta($parametro)
    {
        $respuesta = false;
        //$parametro['nroDni'] = null;
        $objPersona = $this->cargarObjeto($parametro);
        if ($objPersona != null && $objPersona->insertar()) {
            $respuesta = true;
        }
        return $respuesta;
    }

    public function baja($parametro)
    {
        $respuesta = false;
        if ($this->seteadosCamposClaves($parametro)) {
            $objPersona = $this->cargarObjetoConClave($parametro);
            if ($objPersona != null && $objPersona->eliminar()) {
                $respuesta = true;
            }
        }
        return $respuesta;
    }

    public function modificar($parametro)
    {
        $respuesta = false;
        if ($this->seteadosCamposClaves($parametro)) {
            $objPersona = $this->buscar($parametro);
            $objPersona[0] = $this->cargarObjeto($parametro);
            if ($objPersona != null && $objPersona[0]->modificar()) {
                $respuesta = true;
            }
        }
        return $respuesta;
    }

    public function buscar($param)
    {
        $where = " true ";
        if ($param <> null) {
            if (isset($param['nro_dni']))
                $where .= " and nro_dni = '" . $param['nro_dni'] . "'";
            if (isset($param['nombre']))
                $where .= " and nombre = '" . $param['nombre'] . "'";
            if (isset($param['apellido']))
                $where .= " and apellido = '" . $param['apellido'] . "'";
            if (isset($param['fecha_nac']))
                $where .= " and fecha_nac = '" . $param['fecha_nac'] . "'";
            if (isset($param['telefono']))
                $where .= " and telefono = '" . $param['telefono'] . "'";
            if (isset($param['domicilio']))
                $where .= " and domicilio = '" . $param['domicilio'] . "'";
        }
        $arreglo = persona::listar($where);

        // $arreglo = [];

        // $arreglo = Persona::listar();
        return $arreglo;
    }
}
