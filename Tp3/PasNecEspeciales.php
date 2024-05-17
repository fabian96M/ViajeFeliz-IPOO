<?php
include "Pasajero.php";
class PasNecEsp extends Pasajero{
    /* Atributos */
    private $conSilla;
    private $conAsistencia;
    private $comidaEspecial;

    /* Metodo construct */
    public function __construct($nombre, $numAsiento, $numTicket, $conSilla, $conAsistencia, $comidaEspecial)
    {
        parent::__construct($nombre, $numAsiento, $numTicket);
        $this->conSilla = $conSilla;
        $this->conAsistencia = $conAsistencia;
        $this->comidaEspecial = $comidaEspecial;
    }
    /* Metodos setters */
    public function setConSilla($conSilla){
        $this->conSilla = $conSilla;
    }
    public function setConAsistencia($conAsistencia){
        $this->conAsistencia = $conAsistencia;
    }
    public function setComidaEspecial($comidaEspecial){
        $this->comidaEspecial = $comidaEspecial;
    }
    /* Metodos getters */
    public function getConSilla(){
        return $this->conSilla;
    }
    public function getConAsistencia(){
        return $this->conAsistencia;
    }
    public function getComidaEspecial(){
        return $this->comidaEspecial;
    }
    /* Metodo booleano a texto */
    public function booleanoTexto($booleano){
        $texto = "No";
        if($booleano){
            $texto = "Si";
        }
        return $texto;
    }
    /* Metodo toString */
    public function __toString()
    {
        $datosP = parent::__toString();
        return "".$datosP." El Pasajero ".$this->booleanoTexto($this->getConSilla())." Viaja con silla de ruedas \n El Pasajero ".$this->booleanoTexto($this->getConAsistencia())." Requiere asistencia para subir y bajar del avion \n El pasajero ".$this->booleanoTexto($this->getComidaEspecial())." Requiere comida especial \n";
    }


}