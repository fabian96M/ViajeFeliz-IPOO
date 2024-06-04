<?php
include "Viaje.php";
include "Persona.php";
include "Responsable.php";
include "Pasajero.php";
/* Inicializacion de var */
$bandera = true;

/* Instanciamos 4 personas */
$persona1 = new Persona("Pedro", "Coral");
$persona2 = new Persona("Gerardo", "Martinez");
$persona3 = new Persona("Andrea", "Quinta");
$persona4 = new Persona("Eduardo", "Giron");

/* Instanciamos 3 pasajeros */
$colPasajeros = [ 
$pasajero1 = new Pasajero($persona1, 23840952, 2040234052),
$pasajero2 = new Pasajero($persona2, 23948025, 2049029343),
$pasajero3 = new Pasajero($persona3, 23940294, 2293402938)];

/* Instanciamos un responsable */
$responsable1 = new Responsable($persona4, 6334, 39453223);

/* Instanciamos 1 viaje */
$viaje1 = new Viaje(1235, "Mar del plata", 5, $colPasajeros, $responsable1);
$viajes[] = $viaje1;

/* Presentamos las opciones al usuario (carga de datos de viaje, modificar datos de viaje o mostrar los datos del viaje) */
while($bandera){
echo "\n A continuacion ingrese la opcion deseada: \n ";
echo "\n
1 - Cargar Datos de un viaje nuevo \n
2 - Modificar Datos de un Viaje \n
3 - Mostrar Datos de un viaje \n
4 - Salir \n";

/* Recibimos la opcion y segun ella ejecutamos la secuencia a realizar */
$eleccion1 = trim(fgets(STDIN));

/* Segun la eleccion del usuario se ejecutara una secuencia */
switch ($eleccion1) {
    case 1:
        $viajes[] = cargaDatosViaje();
        echo "Se ha añadido un nuevo viaje";
        break;
    case 2:
        echo "\n Ingrese el numero del viaje a modificar \n";
        $numViaje = trim(fgets(STDIN));
        menuDerivadora();
        $eleccion = trim(fgets(STDIN));
        modificarViaje($eleccion, $viajes[$numViaje - 1]);

        break;
    case 3:
        echo "\n Ingrese el numero de viaje que desee visualizar \n";
        $numViaje = trim(fgets(STDIN));
        echo "\n " . $viajes[$numViaje - 1] . "\n";
        break;
    case 4:
        $bandera = false;
        echo "\n Tenga buen dia \n";
        break;
    default:
        echo "La opcion ingresada no es valida";
        break;
}
}


/* FUNCIONES PARA CARGA DE DATOS */
/* Funcion para agregar los datos de una persona */
function cargarPersona(){
    echo "\n Ingrese Nombre:  \n";
    $nombre = trim(fgets(STDIN));
    echo "\n Ingrese Apellido: \n";
    $apellido = trim(fgets(STDIN));
    $objPersona = new Persona($nombre, $apellido);
    return $objPersona;
}
/* funcion para agregar un pasajero */
/* crea un objeto con los datos de un pasajero */
function crearPasajero()
{
     /* Solicitamos los datos del pasajero */
     echo "\n Ingrese datos del pasajero \n";
     $objPers1 = cargarPersona();
     echo "\n Numero de Documento: \n";
     $numDoc = trim(fgets(STDIN));
     echo "\n Numero de telefono\n";
     $numTelefono = trim(fgets(STDIN));
     /* Creamos un los objetos con los datos del pasajero*/
     $objPasajero = new Pasajero($objPers1, $numDoc, $numTelefono);
    /* Retornamos el objeto con los datos */
    return $objPasajero;
}
/* Funcion para crear un responsable */
function cargarResponsable()
{

    /* Solicitamos los datos del Responsable */
    echo "\n Ingrese datos del Responsable \n";
    $objPers1 = cargarPersona();
    echo "\n Numero de Empleado: \n";
    $numEmp = trim(fgets(STDIN));
    echo "\n Numero de Licencia\n";
    $numLic = trim(fgets(STDIN));
    /* Creamos un los objetos con los datos del pasajero*/
    $objResponsable = new Responsable($objPers1, $numEmp, $numLic);
    /* Retornamos el objeto con los datos */
    return $objResponsable;
}

function crearArrayPasajeros($maxPasajeros)
{

    $arrayPasajeros = [];
    $continuar = true;
    $i = 0;
    /* Realizamos un echo explicando las reglas de carga */
    echo "\n A continuacion ingrese los datos de cada pasajero, si hay espacio para mas se le consultara si desea añadir otro mas\n";
    /* Solicitamos los datos dentro del bucle consultando al final de cada iteracion */
    do {
        $pasajero = crearPasajero();
        if(pasajeroCargado($arrayPasajeros, $pasajero)){
            echo "\n El pasajero ya es encuentra cargado \n";
        }
        else{
            $arrayPasajeros[] = $pasajero;
        $i++;
        echo "\n Desea añadir otro pasajero? Por favor pulse: \n
             |1) Para si  \n
             |2) Para No \n ";
        $eleccion = trim(fgets(STDIN));
        if ($eleccion == 2) {
            $continuar = false;
        }
        elseif($i == $maxPasajeros){
            echo "\n Ya no es posible añadir mas pasajeros (Maximo alcanzado)\n";
            break;
        }
        }
    } while ($i < $maxPasajeros && $continuar);
    /* Retornamos el arreglo resultante */
    return $arrayPasajeros;
}

/* Funcion para cargar los datos de un viaje */
function cargaDatosViaje()
{
    $arrayPasajeros = [];
    /* solicitamos los datos del viaje y almacenamos cada uno */
    echo "\n Ingrese un codigo de viaje \n";
    $CodViaje = trim(fgets(STDIN));
    echo "\n Ingrese un Destino \n";
    $destino = trim(fgets(STDIN));
    echo "\n Ingrese un Maximo de pasajeros \n";
    $maxPasajeros = trim(fgets(STDIN));
    $arrayPasajeros = crearArrayPasajeros($maxPasajeros);
    $responsableV = cargarResponsable();
    $viaje = new Viaje($CodViaje, $destino, $maxPasajeros, $arrayPasajeros, $responsableV);
    return $viaje;
}
/* FUNCIONES PARA MODIFICAR DATOS */
///////////////////////////////////////
function menuDerivadora()
{
    /* Muestra el menu de opciones de las funciones para modificar datos */
    echo "\n A continuacion ingrese el numero de acuerdo a lo que desee modificar \n";
    echo "|1 ) Para modificar el codigo de viaje: \n";
    echo "|2 ) Para modificar el Destino de viaje: \n";
    echo "|3 ) Para modificar el Maximo de pasajeros de un viaje: \n";
    echo "|4 ) Para modificar los parajeros de un viaje: \n";
    echo "|5 ) Para modificar el pasajero de un viaje: \n";
}
function modificarViaje($numEleccion, $viaje)
{
    /* Recibe un numero por parametro y deriva segun el numero  */

    switch ($numEleccion) {
        case 1:
            echo "\n Indique el Nuevo codigo de viaje \n";
            $viaje->setCodViaje(trim(fgets(STDIN)));  
            break;
        case 2:
            echo "\n Ingrese un nuevo destino de viaje \n";
            $destino = trim(fgets(STDIN));
            $viaje->setDestino($destino);
            break;
        case 3:
            $viaje = modificarMaximoPasajeros($viaje);
            break;

        case 4:
            $maxPasajeros = $viaje->getMaxPasajeros();
            $viaje->setColPasajeros(crearArrayPasajeros($maxPasajeros));
            break;

        case 5:
            modificarPasajero($viaje);
            break;
        case 6: $viaje->setResponsable(cargarResponsable());

        default:
            echo "\n El numero ingresado no esta contemplado \n";
            break;
    }
}

/* funcion para modificar el maximo de pasajeros */
function modificarMaximoPasajeros($viaje)
{
    /* solicitamos que ingrese el nuevo maximo teniendo en cuenta la cantidad actual de pasajeros cargados */
    $cantPasajeros = count($viaje->getColObjPasajero());
    echo "\n A continuacion ingrese el nuevo maximo de pasajeros pero recuerde que no puede ingresar un numero menor a: " . $cantPasajeros . "\n";

    do {
        $nuevoMaxPasajeros = trim(fgets(STDIN));
        if ($nuevoMaxPasajeros <= $cantPasajeros) {
            echo "\n El numero esta por debajo del rango de pasajeros cargados \n Por favor ingresa uno por encima de " . $cantPasajeros . " \n";
        }
    } while ($nuevoMaxPasajeros <= $cantPasajeros);
    $viaje->setMaxPasajeros($nuevoMaxPasajeros);
}

/* modifica un pasajero de un arreglo de pasajero de un objeto viaje  */
function modificarPasajero($objViaje)
{
    /* creamos un arreglo de pasajeros auxiliar y asignamos los datos del arreglo pasajeros del viaje */
    $bandera = true;
    $pasajeros = $objViaje->getPasajeros();

    /* solicitamos el numero de pasajero */
    echo "\n Ingrese el numero de pasajero a modificar \n";

    /* confirmamos que sea una posicion valida */
    while ($bandera) {
        $numPasajero = trim(fgets(STDIN));
        if ($numPasajero < count($pasajeros) && $numPasajero > 0) {
            /* Si el numero esta dentro del rango */
            $bandera = false;
        } else {
            echo "\n El numero no es valido, porfavor ingrese otro \n";
        }
    }
    /* si es valida creamos un pasajero usando la funcion crearPasajero */
    $pasajero = crearPasajero();
    /* Verificamos que el pasajero no este cargado en la coleccion de pasajeros */
    if(pasajeroCargado($objViaje->getPasajeros(), $pasajero)){
        echo "\n El pasajero ya es encuentra cargado \n";
    }else{
         /* Asignamos el pasajero en la posicion especificada */
    $pasajeros[$numPasajero-1] = $pasajero;
    /* Seteamos el arreglo de pasajeros dentro del objeto */
    $objViaje->setPasajeros($pasajeros);

    }
   
}
/* Funcion para verificar si un pasajero que entra por parametro esta cargado en el array que entra por parametro*/
function pasajeroCargado($arregloPasajeros, $objPasajero){
    /* si el pasajero ya esta cargado retorna true */
    $pCargado = false;
    $i = 0;
    while(!$pCargado && $i < count($arregloPasajeros)){
        if($arregloPasajeros[$i]=== $objPasajero){
            $pCargado = true;
        }
        $i++;
    }
    return $pCargado;
}