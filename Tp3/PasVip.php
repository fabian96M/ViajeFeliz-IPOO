<?php
include "Pasajero.php"; 
class PasVip extends Pasajero{
/* atributos */
private $numViajeroFrecuente;
private $cantMillasAcum;

/* Metodo construct */
public function __construct($nombre, $apellido, $numAsiento, $numTicket, $dni, $telefono, $numViajeroFrecuente, $cantMillasAcum)
{
    parent::__construct($nombre, $apellido, $numAsiento, $numTicket, $dni, $telefono);
    $this->numViajeroFrecuente = $numViajeroFrecuente;
    $this->cantMillasAcum = $cantMillasAcum;
}

/* Metodos setters */
public function setNumViajeroFrecuente($numViajeroFrecuente){
$this->numViajeroFrecuente = $numViajeroFrecuente;
}
public function setCantMillasAcum($cantMillasAcum){
$this->cantMillasAcum = $cantMillasAcum;
}
/* Metodos getters */
public function getNumViajeroFrecuente(){
    return $this->numViajeroFrecuente;
}
public function getCantMillasAcum(){
    return $this->cantMillasAcum;
}
/* Metodo darPorcentajeIncremento() */
public function darPorcentajeIncremento(){
    $incremento = parent::darPorcentajeIncremento();
    $incremento = 0.35;
    if($this->getCantMillasAcum() > 300){
        $incremento = 0.3;
    }
    return $incremento;
}
/* Metodo ToString */
public function __toString()
{
    $datosP = parent::__toString();
    return "".$datosP." Numero de viajero Frecuente: ".$this->getNumViajeroFrecuente()."\n Cantidad de millas acumuladas: ".$this->getCantMillasAcum()."\n ";   
}
}