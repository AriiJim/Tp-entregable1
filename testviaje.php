<?php
 
include 'Viaje.php';

function seleccionarOpcion(){
    //int $suOpcion

    echo "\n****MENÚ DE OPCIONES****\n" ;
    echo "1) Ingrese los datos del viaje: \n";
    echo "2) Mostrar los datos de los pasajeros y del viaje: \n";
    echo "3) Modificar los datos del viaje: \n";
    echo "4) Modificar los datos de los pasajeros: \n";
    echo "5) Salir\n";
    echo "\nIngrese su opción: ";
    $suOpcion = solicitarNumeroEntre(1, 5);
    
    return $suOpcion;
}

/**Solicita un numero
 * @param INT $min
 * @param INT $max
 * @return INT
 */
function solicitarNumeroEntre($min, $max)
{
    //int $numero
    $numero = trim(fgets(STDIN));
    while (!is_int($numero) && !($numero >= $min && $numero <= $max)) {  
        echo "Debe ingresar un número entre " . $min . " y " . $max . ": ";
        $numero = trim(fgets(STDIN));
    }
    return $numero;
}

function cargarPasajeros($cantMaxPasajeros){

    for ($i= 1; $i < $cantMaxPasajeros + 1; $i++) { 
        echo "\nIngrese el nombre del pasajero [$i]: ";
        $nombre = trim(fgets(STDIN));
        echo "\nIngrese el apellido del pasajero [$i]: ";
        $apellido = trim(fgets(STDIN)); 
        echo "\nIngrese el DNI del pasajero [$i]: ";
        $documento = trim(fgets(STDIN));

        $cargaPasajeros [$i] = ["nombre"=>$nombre, "apellido"=>$apellido, "dni"=>$documento];
    }

    return $cargaPasajeros;
}

function cambiarDatos ($numPasajero){
   

}


do {
    $opcion = seleccionarOpcion();       

    switch ($opcion) {
        case 1: 

            echo "\nIngrese el código de su viaje: ";
            $codigo = trim(fgets(STDIN));
            echo "\nIngrese el destino de su viaje: ";
            $destino = trim(fgets(STDIN));
            echo"\nIngrese la cantidad de pasajeros que viajan: ";
            $cantMaxPasajeros = trim(fgets(STDIN));

            $pasajeros = cargarPasajeros($cantMaxPasajeros);
            $objetoViaje = new Viaje($codigo, $destino, $cantMaxPasajeros, $pasajeros);

            break;
        case 2: 
            
            echo $objetoViaje;
            $objetoViaje -> losPasajeros();
               
            break;

        case 3:

            echo"Ingrese el nuevo código del viaje: ";
            $codigoDos = trim(fgets(STDIN));
            echo "Ingrese el nuevo destino del viaje: ";
            $destinoDos = trim(fgets(STDIN));

            $objetoViaje -> modificacionViaje ($codigoDos, $destinoDos);

            break;
        case 4: 

            echo "Indique que N° de pasajero desea modificar: ";
            $numPasajero = solicitarNumeroEntre(1, $cantMaxPasajeros);
            $datoModificado = cambiarDatos ($numPasajero);

            break;
    }
} while ($opcion != 5);

?>