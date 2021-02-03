<head>
<script type="text/javascript">
function UpdateBP(){
	var TotalBP = document.getElementById("bountyactual");
    var SplittedDrop = document.changebt.charlist.value;
	var Splitted = SplittedDrop.split("|");
	TotalBP.innerHTML = Splitted[1];
}

function UpdateRBP(){
    var TotalPrice = document.getElementById("precio");
    var TotalBP = document.getElementById("bountyactual");

    TotalPrice.innerHTML = document.changebt.totalcoins.value * 300;

    var AfterBounty = TotalBP.innerHTML - TotalPrice.innerHTML;
    if (AfterBounty < 1){
		document.changebt.submit.disabled = true;
		document.changebt.submit.value = "Insufficient Bounty";
	}else{
		document.changebt.submit.disabled = false;
		document.changebt.submit.value = "Purchase EU Coins";
	}
}

function SoloNumeros(evt){
    evt = (evt) ? evt : window.event
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57)) {
        status = "This field accepts numbers only."
        return false
    }
    status = ""
    return true
}
</script>
</head>
<?

if( $_SESSION['AID'] == "" )
{
    SetMessage("Mensaje del sistema", array("Debes estar logueado para cabiar bounty por AGCoins"));
    header("Location: index.php");
    die();
}

SetTitle("SecondaryGunZ - Cambiar Bounty por AGCoins");

if( isset($_POST['submit']) )
{

    $cid = split( '[|]', clean( $_POST['charlist'] ) );
    $cid = $cid[0];
    $coins = clean( $_POST['totalcoins'] );

    if ( !is_numeric($cid) )
    {
        SetMessage("Mensaje del sistema", array("La ID del personaje ha sido editada"));
        header("Location: index.php?do=changebt");
        die();
    }
    else
    {
        $coma = array('.', ',');
        $cid2 = str_replace($coma, '', $cid);
        if ($cid != $cid2)
        {
            SetMessage("Mensaje del sistema", array("La ID del personaje ha sido editada"));
            header("Location: index.php?do=changebt");
            die();
        }
    }

    $qbt02 = mssql_query_logged("SELECT * FROM Character(nolock) WHERE AID = '".$_SESSION['AID']."' AND CID = '$cid'");
    if (mssql_num_rows($qbt02) < 1)
    {
        SetMessage("Mensaje del sistema", array("The selected character does not belong to your account or it does not exist"));
        header("Location: index.php?do=changebt");
        die();
    }

    if ( !is_numeric($coins) )
    {
        SetMessage("Mensaje del sistema", array("La cantidad de coins debe ser introducida en n�meros"));
        header("Location: index.php?do=changebt");
        die();
    }
    else
    {
        $coma = array('.', ',');
        $coins2 = str_replace($coma, '', $coins);
        if ($coins != $coins2)
        {
            SetMessage("Mensaje del sistema", array("La cantidad de coins debe de ser introducida en n�meros"));
            header("Location: index.php?do=changebt");
            die();
        }
    }

    $totalbp = $coins * 300;

    if( $totalbp < 0 )
    {
        SetMessage("Mensaje del sistema", array("No regalamos bounty"));
        header("Location: index.php?do=changebt");
        die();
    }

    $databt02 = mssql_fetch_assoc($qbt02);

    if($totalbp > $databt02['BP'])
    {
        SetMessage("Mensaje del sistema", array("Insuficiente bounty"));
        header("Location: index.php?do=changebt");
        die();
    }

    mssql_query_logged("UPDATE Character SET BP = BP - '$totalbp' WHERE AID = '".$_SESSION['AID']."' AND CID = '$cid'");
    mssql_query_logged("UPDATE Account SET Coins = Coins + '$coins' WHERE AID = '".$_SESSION['AID']."'");

    SetMessage("Mensaje del sistema", array("Has cambiado el bounty por $coins AGCoins"));
    header("Location: index.php?do=changebt");
    die();

}
else
{

    $qbt01 = mssql_query_logged("SELECT CID, Name, BP FROM Character(nolock) WHERE AID = '".$_SESSION['AID']."'AND CharNum != '-1'");

    if( mssql_num_rows($qbt01) < 1 )
    {
        SetMessage("Mensaje del sistema", array("No tienes ningun personaje", "Si no tienes un personaje pues no tendras bounty. Registrese o cree un personaje para cambiar el bounty por AGCoins"));
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
						</div>						<p>&nbsp;</p></td>
						<td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
						<td valign="top" style="background-image: url('images/md_center.png'); background-size: 100% 40%">
							<div style="margin: 20px 20px 20px 20px;">
						<div align="center">
							<table border="0" style="border-collapse: collapse;background: url('images/md_register.png') no-repeat center top; background-size: 100%; border-bottom: 1px solid rgba(124,255,255, 0.3)" width="100%">
								<tr>
									<td height="24" style="">
									<div align="left">
										<b><font face="Tahoma" size="2">&nbsp;&nbsp;Change SGCoins from Bounty</font></b></td>
							  </tr>
								<tr>
									<td>
									<div align="center"><form method="POST" action="index.php?do=changebt" name="changebt">
										<table border="0" style="border-collapse: collapse" width="414" height="100%">
											<tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3">&nbsp;</td>
												<td width="11">&nbsp;</td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3"><p>Here you can buy AGCoins using bounty of character.
                                                  <br />
                                                  <br />
                                              Every SGCoin costs 300 bounty.</p>
											  </td>
											  <td width="11">&nbsp;</td>
											</tr>
                                            <tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3"><br /></td>
												<td width="11">&nbsp;</td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="181">
												<p align="right">Select character:</td>
												<td width="13">&nbsp;</td>
												<td width="190">
												<select size="1" name="charlist" onchange="UpdateBP()">
                                                <?
                                                while( $databt01 = mssql_fetch_row($qbt01) )
                                                {
                                                ?>
                                                    <option value="<?=$databt01[0]?>|<?=$databt01[2]?>"><?=$databt01[1]?></option><br />';
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
												<td width="10">&nbsp;</td>
												<td width="181">
												<p align="right">Total Bounty:</td>
												<td width="13">&nbsp;</td>
												<td width="190"><b><span id="bountyactual">0</span></b></td>
												<td width="11">&nbsp;</td>
											</tr>
                                            <script type="text/javascript">
                                            UpdateBP();
                                            </script>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3">&nbsp;</td>
												<td width="11">&nbsp;</td>
											</tr>
                                            <tr>
												<td width="10">&nbsp;</td>
												<td width="181">
												<p align="right">Quantity of SGCoins:</td>
												<td width="13">&nbsp;</td>
												<td width="190">
												<input type="text" name="totalcoins" size="9" onkeypress="return SoloNumeros(event)" onkeyup="UpdateRBP()" value=0></td>
												<td width="11">&nbsp;</td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3">&nbsp;</td>
												<td width="11">&nbsp;</td>
											</tr>
                                            <tr>
												<td width="10">&nbsp;</td>
												<td width="181">
												<p align="right">Bounty required:</td>
												<td width="13">&nbsp;</td>
												<td width="190">
												<p align="left"><span id="precio">0</span></td>
												<td width="11">&nbsp;</td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td width="315" colspan="3">&nbsp;</td>
												<td width="11">&nbsp;</td>
											</tr>
											<tr>
												<td width="10">&nbsp;</td>
												<td colspan="3">
												<p align="center">
												<input type="submit" value="Purchase SGCoins" name="submit"></td>
												<td width="11">&nbsp;</td>
											</tr>
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
<?
}
?>