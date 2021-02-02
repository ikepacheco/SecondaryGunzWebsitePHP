<?
$user = $_GET[u];
$text = $_GET[t];

$f = fopen("CommandLog.txt", "a+");
fprintf($f, "IP: %s\tFecha: %s\tUser: %s\tComando: %s\r\n",
        $_SERVER['REMOTE_ADDR'], date("d-m-y - H:i:s"), $user, $text);

fputs($f, $log);
fclose($f);
?>