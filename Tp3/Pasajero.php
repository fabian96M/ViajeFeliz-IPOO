<?php
class Pasajero{
        /* Atributos */
    private $nombre;
    private $apellido;
    private $dni;
    private $numTelefono;
    private $numAsiento;
    private $numTicket;

    /* Metodo construct */
    public function __construct($nombre, $apellido, $numAsiento, $numTicket, $dni, $numTelefono)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
        $this->dni = $dni;
        $this->numTelefono = $numTelefono;
    }

    /* Metodos setters */
  
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setApellido($apellido){
        $this->apellido = $apellido;
    }
    public function setNumAsiento($numAsiento){
        $this->numAsiento = $numAsiento;
    }
    public function setNumTicket($numTicket){
        $this->numTicket = $numTicket;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
    public function setNumTelefono($numTelefono){
        $this->numTelefono = $numTelefono;
    }

    /* Metodos getters */

    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getNumAsiento(){
        return $this->numAsiento;
    }
    public function getNumTicket(){
        return $this->numTicket;
    }
    public function getDni(){
        return $this->dni;
    }
    public function getNumTelefono(){
        return $this->numTelefono;
    }
    /* metodo darPorcentajeIncremento */
    public function darPorcentajeIncremento(){

        return 0;
    }
    /* Metodo toString */
    public function __toString()
    {
        return "\n Nombre: ".$this->getNombre()."\n Apellido: ".$this->getApellido()."\n Numero de asiento: ".$this->getNumAsiento()."\n Numero de ticket: ".$this->getNumTicket()."\n "."\n Numero de documento: ".$this->getDni()."\n Numero de telefono: ".$this->getNumTelefono()."\n";
    }


}
