<?

include "config.php";
include "functions.php";

if(isset($_POST[submit]))
{
    $clid = clean($_GET[clid]);

    if(mysql_num_rows(mysql_query_logged("SELECT * FROM Clan WHERE CLID = $clid")) == 0)
    {
        SetMessage("Cambiar Emblema", array("El Clan no existe"));
        header("Location: index.php");
        die();
    }

    $res = mysql_query_logged("SELECT * FROM `Character` WHERE AID = {$_SESSION[AID]}");

    while($a = mysql_fetch_object($res))
    {
        $bufalo = mysql_query_logged("SELECT * FROM Clan WHERE CLID = $clid AND MasterCID = {$a->CID}");

        if(mysql_num_rows($bufalo) == 1)
        {
            if(is_uploaded_file($_FILES[emblem][tmp_name]))
            {
                $tmpfile =  $_FILES[emblem][tmp_name];

                if(!$imginfo = getimagesize($tmpfile))
                {
                    SetMessage("Subir Emblema", array("Solo imágenes pueden ser subidas"));
                    header("Location: index.php");
                    die();
                }else{
                    if( $imginfo[0] > 200 || $imginfo[1] > 200 ) {
                        SetMessage("Subir Emblema", array("la imagen no puede ser mas grande que 200x200 pixels"));
                        header("Location: index.php");
                        die();
                    }else{
                        $filename = sprintf("emblem_%d_%s_%s", $clid, date("FjYgias"), $_FILES[emblem][name]);
		                if(strstr($filename, "htaccess"))
                        {
                            die("htaccess no, gracias :)");
                        }
                        $partes_ruta = pathinfo($filename);

                        switch($partes_ruta['extension'])
                        {
                            case "jpeg":
                                $rftp = UploadFTPFile($tmpfile, "emblem.herogamers.net", "herogunzemblem", "P*MJkhJZ", "/emblem.herogamers.net/$filename");
                            break;
                            case "jpg":
                                $rftp = UploadFTPFile($tmpfile, "emblem.herogamers.net", "herogunzemblem", "P*MJkhJZ", "/emblem.herogamers.net/$filename");
                            break;
                            case "gif":
                                $rftp = UploadFTPFile($tmpfile, "emblem.herogamers.net", "herogunzemblem", "P*MJkhJZ", "/emblem.herogamers.net/$filename");
                            break;
                            case "png":
                                $rftp = UploadFTPFile($tmpfile, "emblem.herogamers.net", "herogunzemblem", "P*MJkhJZ", "/emblem.herogamers.net/$filename");
                            break;
                            default:
                                SetMessage("Subir Emblema", array("La Imágen debe tener como extension: jpeg, jpg, gif o png"));
                                header("Location: index.php");
                                die();
                            break;
                        }

                        if($rftp && mysql_query_logged("UPDATE Clan SET EmblemUrl = '$filename', EmblemChecksum = EmblemChecksum + 2 WHERE CLID = $clid"))
                        {
                            SetMessage("Subir Emblema", array("Emblema subido y actualizado correctamente"));
                            header("Location: index.php");
                            die();
                        }else{
                            SetMessage("Subir Emblema", array("Error al subir el emblema, intenta de nuevo"));
                            header("Location: index.php");
                            die();
                        }
                    }
                }
            }else{
                SetMessage("Subir Emblema", array("Por favor selecciona un archivo para subir"));
                header("Location: index.php");
                die();
            }
        }
    }
    SetMessage("Cambiar Emblema", array("Tu no eres el master de este clan, no puedes cambiar el emblema, ulitma CID: "));
    header("Location: index.php");
    die();

}else{
    $clid = clean($_GET[clid]);

    $res = mysql_query_logged("SELECT EmblemUrl FROM Clan WHERE CLID = $clid");

    if(mysql_num_rows($res) == 0)
    {
        SetMessage("Subir Emblema", array("El Clan no existe"));
        header("Location: index.php");
        die();
    }else{
        $a = mysql_fetch_object($res);
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
						<img border="0" src="http://emblem.eurogunz.com/<?=$a->EmblemUrl?>" width="64" height="64" style="border: 1px solid #5D5D5D"></td>
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