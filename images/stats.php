<?
include "config.php";

$res = mysql_query_logged("SELECT * FROM serverstatus");

$countplayers = 0;

while($a = mysql_fetch_assoc($res))
{
    $countplayers = $countplayers + $a[CurrPlayer];
}
echo "&Current=$countplayers JUGADORES ONLINE";

?>