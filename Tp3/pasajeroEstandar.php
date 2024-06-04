<?php
include "Pasajero.php" ;
class PasajeroEstandar extends Pasajero{
    

    public function __construct($nombre, $apellido, $numAsiento, $numTicket, $dni, $telefono)
    {
        parent::__construct($nombre, $apellido, $numAsiento, $numTicket, $dni, $telefono);
    }

    public function darPorcentajeIncremento(){
       $incremento = parent::darPorcentajeIncremento();
        $incremento = 0.1;
        return $incremento;
    }
    public function __toString()
    {
        return parent::__toString()." Incremento: ".$this->darPorcentajeIncremento()."\n";
    }
}