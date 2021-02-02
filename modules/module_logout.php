<?
include "secure/anti_inject.php";
include "secure/sql_check.php";
if($_SESSION[AID] <> "")
{
    $u = $_SESSION[UserID];

    session_unset();

    if (isset($_COOKIE[session_name()]))
    {
        setcookie(session_name(), '', time()-42000, '/');
    }

    session_destroy();

    SetMessage("Message from System", array("User $u Desconectado Correctamente"));
    header("Location: index.php");
    die();
}else{
    SetMessage("Message from System", array("No Puedes Desconectarte Ya Que No Estas Conectado!"));
    header("Location: index.php");
    die();
}

?>