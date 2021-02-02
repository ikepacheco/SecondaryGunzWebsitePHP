<?
require "config.php";
$rforo = mysql_connect('GATIN\SQLEXPRESS', 'sa', 'fede261995') or die("GunzDB");
mysql_select_db('hgforum', $rforo);
$res = mysql_query_logged("SELECT * FROM HGF_thread WHERE forumid = 2 ORDER BY threadid DESC LIMIT 0,7", $rforo) or die(mysql_error($rforo));
?>