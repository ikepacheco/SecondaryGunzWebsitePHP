<?php
include "config.php";
?>
<?php
$ip = ''.($_SERVER['REMOTE_ADDR']);
?>
<?php
$query = mssql_query_logged("SELECT * FROM AccountBan WHERE IP = '$ip'");
if (mssql_num_rows($query) == 1)
{
include "owned.php";
exit();
}
?>