<?php
include "secure/anti_inject.php";
include "secure/sql_check.php";
SetTitle("SecondaryGunz - Recuperar Personajes Borrados");

if($_SESSION[AID] == "")
{
    SetURL("index.php?do=recoverchar");
    SetMessage("Recover Character", array("You must be logged in to recover characters"));
    header("Location: index.php?do=login");
    die();
}
else
{
    $qchars = mssql_query("SELECT * FROM Character(NOLOCK) WHERE AID = '{$_SESSION[AID]}'");
    if( mssql_num_rows($qchars) == 0 )
    {
        SetMessage("Recover Character", array("You do not have any character in this account"));
        header("Location: index.php");
        die();
    }
    else
    {

    if( isset($_GET['cid']) )
    {
        $cid = clean($_GET['cid']);
        $qcharinfo = mssql_query_logged("SELECT * FROM Character(NOLOCK) WHERE AID = '{$_SESSION[AID]}' AND CID = $cid");
        if( mssql_num_rows($qcharinfo) == 0 )
        {
            SetMessage("Recover Character", array("The selected Character does not exist or does not belong to your account"));
            header("Location: index.php");
            die();
        }

        $info = mssql_fetch_assoc($qcharinfo);

        if( mssql_num_rows(mssql_query("SELECT * FROM Character(NOLOCK) WHERE Name = '".$info['DeleteName']."'")) == 1 )
        {
            SetMessage("Recover Character", array("A character with the selected name already exists", "Unafortunately this character can not be recovered"));
            header("Location: index.php?do=recoverchar");
            die();
        }

        if( mssql_num_rows(mssql_query("SELECT * FROM Character(NOLOCK) WHERE AID = '".$_SESSION[AID]."' AND CharNum = 0")) == 0 )
        {
            mssql_query_logged("UPDATE Character SET CharNum = 0, Name = '".$info['DeleteName']."', DeleteFlag = 0, DeleteName = NULL WHERE AID = '".$_SESSION[AID]."' AND CID = '$cid'");
        }
        elseif( mssql_num_rows(mssql_query("SELECT * FROM Character(NOLOCK) WHERE AID = '".$_SESSION[AID]."' AND CharNum = 1")) == 0 )
        {
            mssql_query_logged("UPDATE Character SET CharNum = 1, Name = '".$info['DeleteName']."', DeleteFlag = 0, DeleteName = NULL WHERE AID = '".$_SESSION[AID]."' AND CID = '$cid'");
        }
        elseif( mssql_num_rows(mssql_query("SELECT * FROM Character(NOLOCK) WHERE AID = '".$_SESSION[AID]."' AND CharNum = 2")) == 0 )
        {
            mssql_query_logged("UPDATE Character SET CharNum = 2, Name = '".$info['DeleteName']."', DeleteFlag = 0, DeleteName = NULL WHERE AID = '".$_SESSION[AID]."' AND CID = '$cid'");
        }
        elseif( mssql_num_rows(mssql_query("SELECT * FROM Character(NOLOCK) WHERE AID = '".$_SESSION[AID]."' AND CharNum = 3")) == 0 )
        {
            mssql_query_logged("UPDATE Character SET CharNum = 3, Name = '".$info['DeleteName']."', DeleteFlag = 0, DeleteName = NULL WHERE AID = '".$_SESSION[AID]."' AND CID = '$cid'");
        }
        else
        {
            SetMessage("Recover Character", array("Your account has 4 active characters, that is the maximum allowed", "You have to delete one of your characters to recover the selected one"));
            header("Location: index.php?do=recoverchar");
            die();
        }

        SetMessage("Recover Character", array("The selected character has been recovered successfully"));
        header("Location: index.php?do=recoverchar");
        die();
    }
    else
    {


    ?>
    <table border="0" style="border-collapse: collapse" width="100%">
    <tr>
        <td width="183" valign="top">
    	<div align="center">
    	<? include "blocks/block_ranking.php" ?>
    	</div>
    	</td>
    	<td valign="top">
        <div align="center">
		<table border="1" style="border-collapse: collapse" width="100%" bordercolor="#000000">
		<tr>
		    <td background="images/content_bar.jpg" height="24" style="background-image: url('images/content_bar.jpg'); background-repeat: no-repeat; background-position: center top">
			<div align="center">
			<b><font face="Tahoma" size="2">Recuperaci�n de Personajes</font></b></td>
		</tr>
        <tr>
        <td align="center" width="75%">
        <p>
        <br /><br />
        Aqu� podr�s recuperar personajes que has borrado<br />o te han
        borrado involuntariamente.<br>Debes de saber que en una cuenta de GunZ se permite<br />
        un m�ximo de 4 personajes, por lo tanto<br>si ya tienes 4 personajes activos y
        deseas recuperar<br /> uno de los personajes borrados, <br><b>deber�s borrar un personaje
        activo</b><br /> para dar lugar al que recuperar�s.</p>

        Lista de personajes:<br /><br />
        <table align="center" border="1" width="60%" style="border-collapse: collapse" id="table1">
        	<tr>
        		<td><b>Nombre</b></td>
        		<td><b>Level</b></td>
        		<td><b>Tipo</b></td>
        		<td><b>�Recuperar?</b></td>
        	</tr>
            <?

        while( $data = mssql_fetch_assoc($qchars) )
        {
            echo '
            	<tr>
            		<td>';
                    if( $data[DeleteFlag] == "1" )
                    {
                        echo $data[DeleteName].'</td>';
                    }else{
                        echo $data[Name].'</td>';
                    }

                echo '<td>'.$data[Level].'</td>
            		<td>';
                    if( $data[DeleteFlag] == "1" )
                    {
                        echo 'Borrado</td>
                    <td>';
                    }else{
                        echo 'Activo</td>
                    <td>';
                    }
                    if( $data[DeleteFlag] == "1" )
                    {
                        echo '<a href="index.php?do=recoverchar&cid='.$data[CID].'">Recuperar!</a></td>
            	</tr>';
                    }else{
                        echo 'Activo</td>
            	</tr>';
                    }

        }
        ?>
        </table><br /><br /></td></tr></table></div>
						</td>
						<td width="171" valign="top">
						<div align="center">
							<? include "blocks/block_login.php" ?>
						</div>
						</td>
					</tr>
				</table>
        <?
    }
}
}

?>