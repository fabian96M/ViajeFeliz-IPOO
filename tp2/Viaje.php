<?php

class Viaje{
    private $codViaje;
    private $destino;
    private $maxPasajeros;
    /* El arreglo de pasajeros sera un array que contendra objetos de la clase pasajero */
    private $colObjPasajeros;
    private $responsableV;
    /* Metodo constructor */
    public function __construct($codViaje, $destino, $maxPasajeros, $colObjPasajeros, $responsableV)
    {
        $this->codViaje = $codViaje;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->colObjPasajeros = $colObjPasajeros;
        $this->responsableV = $responsableV;
    }
    /* Metodos Setters */
    public function setCodViaje($codViaje){
        $this->codViaje = $codViaje;
    }
    public function setDestino($destino){
        $this->destino = $destino;
    }
    public function setMaxPasajeros($maxPasajeros){
        $this->maxPasajeros = $maxPasajeros;
    }
    public function setColPasajeros($colObjPasajeros){
        $this->colObjPasajeros = $colObjPasajeros;
    }
    public function setResponsable($responsableV){
        $this->responsableV = $responsableV;
    }
    /* metodos Getters */
    public function getCodViaje(){
        return $this->codViaje;
    }
    public function getDestino(){
        return $this->destino;
    }
    public function getMaxPasajeros(){
        return $this->maxPasajeros;
    }
    public function getColObjPasajero(){
        return $this->colObjPasajeros;
    }
    public function getResponsable(){
        return $this->responsableV;
    }
    /* Metodos Especiales */
    /* Metodo para convertir un arreglo de pasajeros en string */
    public function listaPasajeros(){
        $DatosPas = " ";
        $numPasajero = 1;
         /* Recorremos el arreglo de pasajeros  */
    foreach($this->getColObjPasajero() as $objPasajero){
       /* Convertimos cada arreglo pasajero en un string y lo adicionamos a un string a devolver al final */
       $DatosPas = "\n".$DatosPas."\n Pasajero Nro: ".$numPasajero." \n ".$objPasajero."\n";
       $numPasajero++;
    }
    return $DatosPas;
    }

    /* Metodo toString */
    public function __toString()
    {
        return "\n Codigo de Viaje: ".$this->getCodViaje()." \n Destino: ".$this->getDestino()." \n Maximo de Pasajeros: ".$this->getMaxPasajeros()."\n Datos De Pasajeros: \n".$this->listaPasajeros()." \n Datos del Responsable: \n".$this->getResponsable()."\n";
    }


}