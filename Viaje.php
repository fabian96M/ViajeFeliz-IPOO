<?php

class Viaje{
    private $codViaje;
    private $destino;
    private $maxPasajeros;
    /* El arreglo de pasajeros sera un array que contendra arrays con los datos de cada parsajero */
    private $pasajeros;
    /* Metodo constructor */
    public function __construct($codViaje, $destino, $maxPasajeros, $pasajeros)
    {
        $this->codViaje = $codViaje;
        $this->destino = $destino;
        $this->maxPasajeros = $maxPasajeros;
        $this->pasajeros = $pasajeros;
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
    public function setPasajeros($pasajeros){
        $this->pasajeros = $pasajeros;
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
    public function getPasajeros(){
        return $this->pasajeros;
    }
    /* Metodos Especiales */
    /* Metodo para convertir un arreglo de pasajeros en string */
    public function listaPasajeros(){
        $DatosPas = " ";
         /* Recorremos el arreglo de pasajeros  */
    foreach($this->getPasajeros() as $pasajero){
       /* Convertimos cada arreglo pasajero en un string y lo adicionamos a un string a devolver al final */
       $DatosPas = $DatosPas." \n ".implode(" \n ", $pasajero);
    }
    return $DatosPas;
    }

    /* Metodo toString */
    public function __toString()
    {
        /*  */
        return "\n Codigo de Viaje: ".$this->getCodViaje()." \n Destino: ".$this->getDestino()." \n Maximo de Pasajeros: ".$this->getMaxPasajeros()."\n Datos De Pasajeros: \n".$this->listaPasajeros()." \n";
    }


}