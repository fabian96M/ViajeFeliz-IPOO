<?php
class Responsable{
    /* atributos */
    private $objPersona;
    private $numEmpleado;
    private $numLicencia;

    /* Metodo construct */
    public function __construct($objPersona, $numEmpleado, $numLicencia)
    {
        $this->objPersona = $objPersona;
        $this->numEmpleado = $numEmpleado;
        $this->numLicencia = $numLicencia;
    }
    /* Metodos setters */
    public function setObjPersona($objPersona){
        $this->objPersona = $objPersona;
    }
    public function setNumEmpleado($numEmpleado){
        $this->numEmpleado = $numEmpleado;
    }
    public function setNumLicencia($numLicencia){
        $this->numLicencia = $numLicencia;
    }
    /* Metodos getters */
    public function getObjPersona(){
        return $this->objPersona;
    }
    public function getNumEmpleado(){
        return $this->numEmpleado;
    }
    public function getNumLicencia(){
        return $this->numLicencia;
    }
    /* Metodo toString */
    public function __toString()
    {
        return "\n Apellido: ".$this->getObjPersona()."\n Numero de empleado: ".$this->getNumEmpleado()."\n Numero de licencia: ".$this->getNumLicencia()."\n";
    }

}