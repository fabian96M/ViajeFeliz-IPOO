<?php
include_once "Viaje.php";
/* para probar las funciones de la clase viaje */
/* Creamos varios arreglos de tipo pasajero */
$pasajero1 = ["juan", "Estevez", 93123945];
$pasajero2 = ["Regina", "Silva", 23498245];
$pasajero3 = ["Marisol", "Tasa", 23457923];
$pasajero4 = ["Romina", "Estevez", 32452343];
/* Asignamos los arreglos al arreglo pasajeros */
$pasajeros = [$pasajero1, $pasajero2, $pasajero3, $pasajero4];
/* Instanciamos un objeto de clase Viaje */
$viaje = new Viaje("sds234", "Valparaiso", 15, $pasajeros);
$viajes[] = $viaje;
/* Presentamos las opciones al usuario (carga de datos de viaje, modificar datos de viaje o mostrar los datos del viaje) */
echo "A continuacion ingrese la opcion deseada: \n 
1 - Cargar Datos de un viaje nuevo \n
2 - Modificar Datos de un viaje \n
3 - Mostrar Datos de un viaje \n";
/* Recibimos la opcion y segun ella ejecutamos la secuencia a realizar */
$eleccion1 = trim(fgets(STDIN));
/* Segun la eleccion del usuario se ejecutara una secuencia */
switch($eleccion1){
    case 1: 
        $viajes[] = cargaDatosViaje();
        echo "Se ha añadido un nuevo viaje";
        break;
    case 2:
        
        break;
    case 3:
        echo "\n Ingrese el numero de viaje que desee visualizar \n";
        $numViaje = trim(fgets(STDIN));
        echo "\n ".$viajes[$numViaje -1]."\n";
        break;
    default: 
    echo "La opcion ingresada no es valida";
    break;    
}

///////////////////////////////////////
/* FUNCIONES PARA CARGA DE DATOS */
///////////////////////////////////////////////////////////////////////////////////////////////

/* crea un arreglo con los datos de un pasajero */
function crearPasajero() {

    /* Solicitamos los datos del pasajero */
    echo "\n Ingrese datos del pasajero \n";
    echo "\n Nombre:  \n";
    $nombPasajero = trim(fgets(STDIN));
    echo "\n Apellido: \n";
    $apellidoPasajero = trim(fgets(STDIN));
    echo "\n Numero de Documento: \n";
    $numDoc = trim(fgets(STDIN));
    /* Cargamos los datos dentro de un array */
    $colPasajero = ['nombre' => $nombPasajero, 'apellido' => $apellidoPasajero, 'dni' => $numDoc];
    /* Retornamos el array con los datos */
    return $colPasajero;
}
////////////////////////////////////////////////////////////////////////////////////////////////
/* Crea un arreglo con los datos de multiples pasajeros */
function crearArrayPasajeros($maxPasajeros) {
    /* se ayuda de la funcion crear pasajero en cada iteracion para cargar en un arreglo indexado una coleccion de pasajeros determinada por el maximo de pasajeros o por el usuario  */
    /* inicializamos el arreglo a retornar, la variable booleana a usar para consulta al usuario y la variable iterativa para controlar no exeder el maximo de pasajeros */
    $arrayPasajeros = [];
    $continuar = true;
    $i = 0;
    /* Realizamos un echo explicando las reglas de carga */
    echo "\n A continuacion ingrese los datos de cada pasajero, si hay espacio para mas se le consultara si desea añadir otro mas\n";
    /* Solicitamos los datos dentro del bucle consultando al final de cada iteracion */
    do {
        $arrayPasajeros[] = crearPasajero();
        $i++;
        echo "\n Desea añadir otro pasajero? Por favor pulse: \n
|1) Para si  \n
|2) Para No \n 
";
        $eleccion = trim(fgets(STDIN));
        if ($eleccion == 2) {
            $continuar = false;
        }
    } while ($i < $maxPasajeros && $continuar);
    /* Retornamos el arreglo resultante */
    return $arrayPasajeros;
}



//////////////////////////////////////////////////////////////////////////////////////////////

/* La funcion recibira los datos de un viaje y los cargara en una instancia de viaje que retornara al final de la funcion */
function cargaDatosViaje() {
    $arrayPasajeros = [];
    /* solicitamos los datos del viaje y almacenamos cada uno */
    echo "\n Ingrese un codigo de viaje \n";
    $CodViaje = trim(fgets(STDIN));
    echo "\n Ingrese un Destino \n";
    $destino = trim(fgets(STDIN));
    echo "\n Ingrese un Maximo de pasajeros \n";
    $maxPasajeros = trim(fgets(STDIN));
    $arrayPasajeros = crearArrayPasajeros($maxPasajeros);
    $viaje = new Viaje($CodViaje, $destino, $maxPasajeros, $arrayPasajeros);
    return $viaje;
}
//////////////////////////////////////
/* FUNCIONES PARA MODIFICAR DATOS */
///////////////////////////////////////
function menuDerivadora(){
    /* Muestra el menu de opciones de las funciones para modificar datos */
    echo "\n A continuacion ingrese el numero de acuerdo a lo que desee modificar \n";
    echo "|1 ) Para modificar el codigo de viaje: \n";
    echo "|2 ) Para modificar el Destino de viaje: \n";
    echo "|3 ) Para modificar el Maxiomo de pasajeros de un viaje: \n";
    echo "|4 ) Para modificar los parajeros de un viaje: \n";
    echo "|5 ) Para modificar el pasajero de un viaje: \n";

}
function derivadoraDeFunciones(){
    /* Recibe un numero por parametro y deriva segun el numero  */

}
function modificarCodViaje($viaje){
$viajeNuevo = $viaje;
echo "\n Indique el Nuevo codigo de viaje \n";
$viajeNuevo->setCodViaje(trim(fgets(STDIN)));
return $viajeNuevo;
}

/* funcion para modificar el maximo de pasajeros */
function modificarMaximoPasajeros($viaje){
    /* solicitamos que ingrese el nuevo maximo teniendo en cuenta la cantidad actual de pasajeros cargados */
    $viajeNuevo = $viaje;
    $cantPasajeros = count($viajeNuevo->getPasajeros());
    echo "\n A continuacion ingrese el nuevo maximo de pasajeros pero recuerde que no puede ingresar un numero menor a: ".$cantPasajeros ."\n";
    
    do{
        $nuevoMaxPasajeros = trim(fgets(STDIN));
        if($nuevoMaxPasajeros <= $cantPasajeros){
            echo "\n El numero esta por debajo del rango de pasajeros cargados \n Por favor ingresa uno por encima de ".$cantPasajeros." \n";
        }
    }while($nuevoMaxPasajeros <= $cantPasajeros);
    $viajeNuevo->setMaxPasajeros($nuevoMaxPasajeros);
    return $viajeNuevo;
}
/* funcion para modificar un pasajero */
/** @param obj $viaje
 * return array 
 *  */
function modificarPasajero($objViaje){
    /* creamos un arreglo de pasajeros auxiliar y asignamos los datos del arreglo pasajeros del viaje */
    $pasajeros = [];
    $pasajero = [];
    $bandera = true;
    $pasajeros = $objViaje->getPasajeros();
    
    /* solicitamos el numero de pasajero */
echo "Ingrese el numero de pasajero a modificar";

    /* confirmamos que sea una posicion valida */
    while($bandera)
    {
        $numPasajero = trim(fgets(STDIN));
        if( $numPasajero < count($pasajeros)&& $numPasajero > 0){
            /* Si el numero esta dentro del rango */
            $bandera = false;
        }
        else{
            echo "El numero no es valido, porfavor ingrese otro";
        }

    }
    /* si es valida creamos un pasajero usando la funcion crearPasajero */
    $pasajero = crearPasajero();
    /* Asignamos el pasajero en la posicion especificada */
    $pasajeros[$numPasajero] = $pasajero;
    /* Seteamos el arreglo de pasajeros dentro del objeto */
    $objViaje->setPasajeros($pasajeros);

  
}
/* Recibe un objeto de la clase viaje por parametro y modifica el maximo de pasajeros siempre que este dentro del numero de pasajeros ya cargados en el arreglo pasajeros dentro del objeto */
function modificarMaxPasajeros($objViaje){
$noValido = true;
echo "\n Ingrese un nuevo maximo de pasajeros que no este por debajo de: ".count($objViaje->getPasajeros())."\n";
do{
    $nuevoMaxPasajeros = trim(fgets(STDIN));

    if($nuevoMaxPasajeros < count($objViaje->getPasajeros())){
/* Si el numero ingresado no es valido */
        echo "\n El numero no es valido, reintenta con un numero mayor a: ".count($objViaje->getPasajeros())."\n";
    }
    else{
        /* El numero ingresado es valido */
        $objViaje->setMaxPasajeros($nuevoMaxPasajeros);
        echo "\n El nuevo maximo se definio en : ".$objViaje->getMaxPasajeros()." Pasajeros \n";
        $noValido = false;
    }
}while($noValido);

}