<?php
class Persona{
    /**Atributos */
    private $nombre;
    private $apellido;
    private $dni;

    /**Metodo Construct */
    public function __construct($nombre, $apellido, $dni)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->dni = $dni;
    }

    /*Setters */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }

    /**Getters */
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getDni(){
        return $this->dni;
    }

    /**Metodo toString */
    public function __toString()
    {
        return "\n Nombre: ".$this->getNombre()."\n Apellido: ".$this->getApellido()."\n DNI: ".$this->getDni()."\n";
    }


}