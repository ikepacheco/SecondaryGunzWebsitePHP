<?php


if( !isset($_GET[clid]) )
{
    die();
}

include "secure/config.php";
include "secure/functions.php";

if(isset($_POST[submit]))
{

    CheckIsBanned();
    $clid = clean($_GET[clid]);

    if(mssql_num_rows(mssql_query_logged("SELECT * FROM Clan WHERE CLID = $clid")) == 0)
    {
        SetMessage("Cambiar Emblema", array("El clan no existe"));
        header("Location: index.php");
        die();
    }

    $res = mssql_query_logged("SELECT * FROM Character WHERE AID = {$_SESSION[AID]}");

    while($a = mssql_fetch_object($res))
    {
        $bufalo = mssql_query_logged("SELECT * FROM Clan WHERE CLID = $clid AND MasterCID = {$a->CID}");

        if(mssql_num_rows($bufalo) == 1)
        {
            if(is_uploaded_file($_FILES[emblem][tmp_name]))
            {
                $tmpfile =  $_FILES[emblem][tmp_name];

                $partes = pathinfo( $_FILES['emblem']['name'] );
                $extension = $partes['extension'];

                $extensiones = array('jpg', 'jpeg', 'png', 'gif');
                if( !in_array(strtolower($extension), $extensiones) ){
                    SetMessage("Subir Emblema", array("Solo puedes subir imagenes"));
                    header("Location: index.php");
                    die();
                }
                elseif(!$imginfo = getimagesize($tmpfile))
                {
                    SetMessage("Subir Emblema", array("Solo puedes subir imagenes"));
                    header("Location: index.php");
                    die();
                }
                elseif( $imginfo[0] > 200 || $imginfo[1] > 200 )
                {
                        SetMessage("Subir Emblema", array("La imagen no puede ser mas grande de: 200 x 200 pixeles"));
                        header("Location: index.php");
                        die();
                }
                elseif( $imginfo[0] <= 5 || $imginfo[1] <= 5 )
                {
                        SetMessage("Subir Emblemam", array("El tama�o de la imagen debe de ser de 5 x 5", "Y debe ser 200 x 200 pixeles") );
                        header("Location: index.php");
                        die();
                }else{

                    $tmpclid = sprintf("%d.jpg", $clid);
                    $rftp = UploadFTPFile($tmpfile, "127.0.0.1", "demon", "123456", "$tmpclid");

                    if($rftp && mssql_query_logged(sprintf("UPDATE Clan SET EmblemUrl = '%d.jpg', EmblemChecksum = EmblemChecksum + 2 WHERE CLID = $clid", $clid)))
                    {
                        SetMessage("Subir Emblema", array("Emblema subido satisfactoriamente"));
                        header("Location: index.php");
                        die();
                    }else{
                        SetMessage("Subir Emblema", array("Error subiendo la imagen, Trata mas tarde"));
                        header("Location: index.php");
                        die();
                    }
                }

            }else{
                SetMessage("Subir Emblema", array("Selecciona una imagen para subir"));
                header("Location: index.php");
                die();
            }
        }
    }
    SetMessage("Cambiar Emblema", array("No eres el lider del clan, no puedes cambiar el emblema"));
    header("Location: index.php");
    die();

}else{
    $clid = clean($_GET[clid]);

    $res = mssql_query_logged("SELECT EmblemUrl FROM Clan WHERE CLID = $clid");

    if(mssql_num_rows($res) == 0)
    {
        SetMessage("Subir Emblema", array("El clan no existe"));
        header("Location: index.php");
        die();
    }else{
        $a = mssql_fetch_object($res);
    }
}
?>

<script language="javascript">

function lol()
{
    alert('yawn');
}

</script>
<form method="POST" id="emblemafrm" enctype="multipart/form-data" action="emblemupload.php?clid=<?=$_GET[clid]?>" name="upEmb">

<div align="center">
	<table border="0" style="background-position:  center top; border-collapse: collapse; background-image:url('images/mis_emblemuploadbg.jpg'); background-repeat:no-repeat" width="407">
		<tr>
			<td width="398">
			<div align="center">
				<table border="0" style="border-collapse: collapse" width="398" height="124">
					<tr>
						<td width="12" height="28"></td>
						<td width="50" height="28"></td>
						<td width="330" height="28" colspan="2"></td>
					</tr>
					<tr>
						<td width="12" height="65" rowspan="2">&nbsp;</td>
						<td width="50" valign="top" height="65" rowspan="2">
						<img border="0" src="http://localhost/emblem/<?=$a->EmblemUrl?>" width="64" height="64" style="border: 1px solid #5D5D5D"></td>
						<td width="9" height="21">&nbsp;</td>
						<td width="305" height="21">Select the image (max
						200x200 pixels)</td>
					</tr>
					<tr>
						<td width="9" height="44">
						<p align="center">&nbsp;</td>
						<td width="305" height="44">
						<input type="file" name="emblem" size="20"></td>
					</tr>
					<tr>
						<td width="12">&nbsp;</td>
						<td width="50">&nbsp;</td>
						<td width="330" colspan="2">&nbsp;</td>
					</tr>
				</table>
			</div>
			</td>
		</tr>
		<tr>
			<td width="398">
            <div align="center">
            <input type="image" border="0" src="images/btn_emblemupload.jpg" width="130" height="28" id="img1" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(0,1,/*id*/'img1',/*url*/'images/btn_emblemupload_on.jpg')"></a>
			<a href="javascript:HidePanel();">
			<img border="0" src="images/btn_closewindow.jpg" width="130" height="28" id="img2" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(0,1,/*id*/'img2',/*url*/'images/btn_closewindow_on.jpg')"></a></td>
		</tr>
		</table>
</div><input type="hidden" name="submit" value="1"><input type="hidden" name="clid" value="<?=$_GET[clid]?>"></form>

<?
sleep(3);
?>