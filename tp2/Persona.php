<?php
class Persona{
    /**Atributos */
    private $nombre;
    private $apellido;
 

    /**Metodo Construct */
    public function __construct($nombre, $apellido)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }

    /*Setters */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }


    /**Getters */
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }

    /**Metodo toString */
    public function __toString()
    {
        return "\n Nombre: ".$this->getNombre()."\n Apellido: ".$this->getApellido()."\n ";
    }


}