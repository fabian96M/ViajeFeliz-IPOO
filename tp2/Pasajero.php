<?php
class Pasajero{
    /* Atributos */
    private $objPersona;
    private $dni;
    private $numTelefono;

    /* Metodo construct */
    public function __construct($objPersona, $dni, $numTelefono)
    {
        $this->objPersona = $objPersona;
        $this->dni = $dni;
        $this->numTelefono = $numTelefono;
    }
    /* Metodos setters */
    public function setObjPersona($objPersona){
        $this->objPersona = $objPersona;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
    public function setNumTelefono($numTelefono){
        $this->numTelefono = $numTelefono;
    }
    /* Metodos getters */
    public function getObjPersona(){
        return $this->objPersona;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getNumTelefono(){
        return $this->numTelefono;
    }
    /* metodo toString */
    public function __toString()
    {
        return "".$this->getObjPersona()."\n Numero de documento: ".$this->getDni()."\n Numero de telefono: ".$this->getNumTelefono()."\n";
    }
}