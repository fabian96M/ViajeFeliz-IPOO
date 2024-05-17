<?php
class Pasajero{
    /* atributos */
    private $nombre;
    private $numAsiento;
    private $numTicket;

    /* Metodo construct */
    public function __construct($nombre, $numAsiento, $numTicket)
    {
        $this->nombre = $nombre;
        $this->numAsiento = $numAsiento;
        $this->numTicket = $numTicket;
    }

    /* Metodos setters */
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function setNumAsiento($numAsiento){
        $this->numAsiento = $numAsiento;
    }
    public function setNumTicket($numTicket){
        $this->numTicket = $numTicket;
    }

    /* Metodos getters */
    public function getNombre(){
        return $this->nombre;
    }
    public function getNumAsiento(){
        return $this->numAsiento;
    }
    public function getNumTicket(){
        return $this->numTicket;
    }
    /* Metodo toString */
    public function __toString()
    {
        return "\n Nombre: ".$this->getNombre()."\n Numero de asiento: ".$this->getNumAsiento()."\n Numero de ticket: ".$this->getNumTicket()."\n ";
    }


}