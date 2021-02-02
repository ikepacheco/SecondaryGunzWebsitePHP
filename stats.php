<?

///////////////////////////////////////////////
///////////     Configuración     ////////////
/////////////////////////////////////////////

// Configura aquí el tiempo en segundos que durará
// la cantidad de jugadores online antes de ser actualizada

$uTime = 30;

// Fin de la configuración

/////////////////////////////////////////////

include "secure/config.php";       // Carga de archivos de configuración
include "secure/functions.php";   // y funciones escenciales

// Se carga para lectura el archivo de datos de los jugadores online
$data = file_get_contents("logs/playercount.txt");

// Se separan los dos valores que hay en el archivo
$asd = explode("/", $data);
$time = $asd[0]; // Valor de tiempo en el txt
$players = $asd[1]; // Valor de Jugadores Online en el txt

// Se obtiene el tiempo actual
$currtime = time();

// Se verifica si pasó suficiente tiempo como
// para tener que actualizar el txt
if(($currtime - $time) > $uTime)
{
    // En el caso de que sea necesario actualizar el txt
    // Se consultan los jugadores online en la Base de Datos
    $res = mssql_query_logged("SELECT * FROM serverstatus(nolock) WHERE Opened = 1");
    $countplayers = 0;

    // Se suman todos los jugadores online
    while($a = mssql_fetch_assoc($res))
    {
        $countplayers = $countplayers + $a[CurrPlayer];
    }

    // Se configura el nuevo texto para el archivo de datos
    $towrite = sprintf("%s/%s", time(), $countplayers);

    // Se abre en modo de escritura el archivo de datos de los jugadores online
    $a = fopen("logs/playercount.txt", "w+");
    fwrite($a, $towrite); // Se escribe el archivo con los nuevos datos
    fclose($a); // Se cierra el archivo

    // Se muestra en la web la nueva cantidad de jugadores online
    echo "&Current=$countplayers PLAYERS ONLINE";
}else{
    // En el caso de que no sea necesario actualizar el txt
    // Se muestra la cantidad de jugadores online que hay en el txt
    echo "&Current=$players PLAYERS ONLINE";
}
?>