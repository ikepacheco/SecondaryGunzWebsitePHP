<?
include "configsing.php";
?>
<head>
<script type="text/javascript">
    function UpdateSignature()
    {
        var cid = document.signature.charlist.value;
        var firma = document.getElementById("firma");
        firma.innerHTML = '<img src="<?=$url?>/genericsing.php?cid='+ cid + '" />';
        document.signature.forumcode.value = '[URL="<?=$url?>/"][IMG]<?=$url?>/genericsing.php?cid=' + cid + '[/IMG][/URL]';
        document.signature.directlink.value = "<?=$url?>/genericsing.php?cid=" + cid + "";
    }

</script>
</head>
<?

if( $_SESSION['AID'] == "" )
{
    SetURL("index.php?do=signature");
    SetMessage("Mensaje del sistema", array("Tienes que estar logueado para utilizar esta funcion"));
    header("Location: index.php?do=login");
    die();
}

SetTitle("SecondaryGunZ - Signature");

    $qbt01 = mssql_query_logged("SELECT CID, Name FROM Character(nolock) WHERE AID = '".$_SESSION['AID']."'AND CharNum != '-1'");

    if( mssql_num_rows($qbt01) < 1 )
    {
        SetMessage("Mensaje del sistema", array("No tienes personajes"));
        header("Location: index.php");
        die();
    }

?>
<table border="0" style="border-collapse: collapse" width="100%">
					<tr>
						<td width="183" valign="top">
						<div align="center">
							<? include "blocks/block_rankingu.php" ?>
						</div>
						<p>
						<div align="center">
                          <p>
                            <? include "blocks/block_rankingc.php" ?>
                          <p>
						</div>
						</td>
						<td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
						<td valign="top" style="background-image: url('images/md_center.png'); background-size: 100% 55%">
							<div style="margin: 20px 20px 20px 20px;">
						<div align="center">
							<table border="0" style="border-collapse: collapse;background: url('images/md_register.png') no-repeat center top; background-size: 100%; border-bottom: 1px solid rgba(124,255,255, 0.3)" width="100%">
								<tr>
									<td height="24" style="">
									<div align="left">
										<b><font face="Tahoma" size="2">&nbsp;&nbsp;SecondaryGunZ 
										Generator</font></b></td>
							  </tr>
								<tr>
									<td>
									<div align="center"><form name="signature">
										<table border="0" style="border-collapse: collapse" width="414" height="100%">
											<tr>
												<td width="10" height="22">&nbsp;</td>
												<td width="315" colspan="3" height="22">&nbsp;</td>
												<td width="11" height="22">&nbsp;</td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="181">
												<p align="right">Select your character</td>
												<td width="13">&nbsp;</td>
												<td width="190">
												<select size="1" name="charlist" onchange="UpdateSignature()">
                                                <?
                                                while( $databt01 = mssql_fetch_row($qbt01) )
                                                {
                                                ?>
                                                    <option value="<?=$databt01[0]?>"><?=$databt01[1]?></option><br />';
                                                <?
                                                }
                                                ?>
												</select></td>
												<td width="11">&nbsp;</td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3">&nbsp;</td>
												<td width="11">&nbsp;</td>
											</tr>
											<tr>
												<td align="center" colspan="5">
												Signature:</td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3">&nbsp;</td>
												<td width="11">&nbsp;</td>
											</tr>
											<tr>
												<td align="center" colspan="5"><span id="firma"></span></td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3">&nbsp;</td>
												<td width="11">&nbsp;</td>
											</tr>
                                            <tr>
                                                <td width="10">&nbsp;</td>
												<td align="center" width="315" colspan="3">
                                                Code for insert in foros:<br />
                                                <input type="text" name="forumcode" onclick="javascript:select();" readonly="readonly" style="width: 310px; font-size: 11px;"/></td>
												<td width="11">&nbsp;</td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3">&nbsp;</td>
												<td width="11">&nbsp;</td>
											</tr>
                                            <tr>
                                                <td width="10">&nbsp;</td>
												<td align="center" width="315" colspan="3">
                                                Direct Link:<br />
                                                <input type="text" name="directlink" onclick="javascript:select();" readonly="readonly" style="width: 310px; font-size: 11px;"/></td>
												<td width="11">&nbsp;</td>
											</tr>
                                            <script type="text/javascript">
                                            UpdateSignature();
                                            </script>
										</table></form>
									</div>
									</td>
								</tr>
							</table>
						</div>
						</div>
						<td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
						<p align="center">&nbsp;</td>
						<td width="171" valign="top">
						<div align="center">
							<? include "blocks/block_login.php" ?>
						</div>
						</td>
					</tr>
				</table>