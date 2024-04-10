<?php
include_once "Viaje.php";
/* para probar las funciones de la clase viaje */
/* Creamos varios arreglos de tipo pasajero */
$pasajero1 = ["juan","Estevez", 93123945];
$pasajero2 = ["Regina","Silva", 23498245];
$pasajero3 = ["Marisol","Tasa", 23457923];
$pasajero4 = ["Romina","Estevez", 32452343];
/* Asignamos los arreglos al arreglo pasajeros */
$pasajeros = [$pasajero1, $pasajero2, $pasajero3, $pasajero4];
/* Instanciamos un objeto de clase Viaje */
$viaje = new Viaje("sds234", "Valparaiso", 15, $pasajeros);
/* Verificamos que el echo de la funcion devuelva datos */
echo $viaje;