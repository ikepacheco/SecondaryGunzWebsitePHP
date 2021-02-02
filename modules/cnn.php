<?
// Conexão & Protect -- Não mexer 
include "config/config.php";
$cnn=@mssql_connect($iphost,$usersql,$senhasql) or die('Erro ao conectar ao sql');
$db=@mssql_select_db($dbsql,$cnn) or die('Erro ao conectar na database');
include 'secure/sql_check.php';
include 'secure/anti_inject.php';
/////////////////////////////////
?>