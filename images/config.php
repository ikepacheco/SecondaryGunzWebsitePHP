<?

@session_start();

//MSSQL Server configuration

$_MSSQL[Host]               = "66.187.99.106";
$_MSSQL[User]               = "hggunzweb";
$_MSSQL[Pass]               = "BeaT67%$**as";
$_MSSQL[DBNa]               = "hgGunZDB";

//MySQL Server configuration

$_MYSQL[Host]               = "GATIN\SQLEXPRESS";
$_MYSQL[User]               = "sa";
$_MYSQL[Pass]               = "fede261995";
$_MYSQL[DBNa]               = "GunzDB";

//Configuration

$_CONFIG[NewsFID]           = 2;
$_CONFIG[EventsFID]         = 0;
$_CONFIG[vBulletinPrefix]   = "HGF";
$_CONFIG[ForumURL]          = "http://radiality.crearforo.org";

//Offline page
$_CONFIG[OfflinePage]       = "";




$r = mysql_connect($_MSSQL[Host], $_MSSQL[User], $_MSSQL[Pass]) or die("Cant connect to database");
mysql_select_db($_MSSQL[DBNa], $r);

?>