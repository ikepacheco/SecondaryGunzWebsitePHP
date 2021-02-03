<?php

SetTitle("SecondaryGunz - Gift Item");

if($_SESSION[AID] == "")
{
    SetURL("index.php?do=giftdonator&itemid={$_GET[itemid]}");
    SetMessage("Mensaje De La Tienda", array("Login first please"));
    header("Location: index.php?do=login");
    die();
}

if(!isset($_POST[itemid]))
{
    if($_GET[itemid] == "" || !is_numeric($_GET[itemid]))
    {
        SetMessage("Mensaje De La Tienda", array("Incorrecta Informacion Del item"));
        header("Location: index.php?do=shopdonator");
        die();
    }
}

if(isset($_POST[itemid]))
{
    $itemid  = clean($_POST[itemid]);
    $accid  = clean($_SESSION[AID]);

    $recid  = clean($_POST[recipient]);
	$price = clean($_POST[price]);
	$period = clean($_POST[period]);
	switch($period){
		case $period = 0:
			$period = 24 * 3;
		break;
		case $period = 1:
			$period = 24 * 14;
		break;
		case $period = 2:
			$period = 24 * 30;
		break;
		case $period = 3:
			$period = 0;
		break;
		default:
			$period = 0;
		break;
	}

    if(strlen($recid) == 0)
    {
        SetMessage("Error De La Tienda", array("Por Favor Introduzca El UserID Del Beneficiario"));
        header("Location: index.php?do=giftdonator&itemid=$itemid");
        die();
    }

    $rres = mssql_query_logged("SELECT * FROM Account(nolock) WHERE UserID = '$recid'");

    if(mssql_num_rows($rres) == 0)
    {
        SetMessage("Error De La Tienda", array("El beneficiario No Existe Recuerda Que Debes Introducir El UserID No El Nombre Del Personaje"));
        header("Location: index.php?do=giftdonator&itemid=$itemid");
        die();
    }

    $abc = mssql_fetch_object($rres);

    $ires = mssql_query_logged("SELECT * FROM ShopItems(nolock) WHERE CSSID = $itemid");
                           
    if(mssql_num_rows($ires) == 0)
    {
        SetMessage("Error De La Tienda", array("Item no Existe"));
        header("Location index.php?do=shopdonator");
        die();
    }

    $ires = mssql_fetch_object($ires);
    $ares = mssql_fetch_object(mssql_query_logged("SELECT * FROM Account(nolock) WHERE AID  = $accid"));

    $accountbalance = $ares->DonatorCoins;
    $afterbalance   = $accountbalance - $totalprice;
    $ugradeid = $abc->UGradeID;

    if ($itemid == 1 && $ugradeid == 2)
    {
        SetMessage("Mensaje De La Tienda", array("El Beneficiario Ya Posee Jjang"));
        header("Location: index.php?do=giftdonator&itemid=$itemid");
        die();
    }
    elseif($itemid == 1 && $ugradeid != 0)
    {
        SetMessage("Mensaje De La Tienda", array("No Puedes Regalar Jjang A Un Adm O Mod Ni A Los Usuarios Banneados!"));
        header("Location: index.php?do=giftdonator&itemid=$itemid");
        die();
    }

    if($afterbalance < 0)
    {
        SetMessage("Error De La Tienda", array("YNo Posees DCoins Para Efectuar La Compra."));
        header("Location: index.php?do=giftdonator&itemid=$itemid");
        die();

    }else{
        if( $itemid == 1 )
        {
            mssql_query_logged("UPDATE Account SET Coins = Coins - $price WHERE AID = {$_SESSION[AID]}");
            mssql_query_logged("UPDATE ShopItems SET Selled = Selled + 1 WHERE CSSID = $itemid");
            mssql_query_logged("UPDATE Account SET UGradeID = 2 WHERE AID = {$abc->AID}");

            SetMessage("Mensaje De La Tienda", array("Jjang comprado correctamente, para ver el cambio, tu amigo debe reloguearse en GunZ"));
            header("Location: index.php?do=giftdonator");
            die();
        }
        else
        {
            mssql_query_logged("UPDATE Account SET Coins = Coins - $price WHERE AID = {$_SESSION[AID]}");
            mssql_query_logged("UPDATE ShopItems SET Selled = Selled + 1 WHERE CSSID = $itemid");

            //Head
            mssql_query_logged("INSERT INTO AccountItem(AID, ItemID, RentDate, RentHourPeriod, Cnt)VALUES" .
                        "({$abc->AID}, {$ires->zItemID}, GETDATE(), $period, 1)");


            SetMessage("Tienda", array("Event Item Regalado A $recid"));
            header("Location: index.php?do=shopdonator");
            die();
        }
    }
}else{
    $itemid  = clean($_GET[itemid]);

    $ires = mssql_query_logged("SELECT * FROM ShopItems(nolock) WHERE CSSID = $itemid");


    if(mssql_num_rows($ires) == 0)
    {
        SetMessage("Error De La Tienda", array("Item no Existe"));
        header("Location index.php?do=shopdonator");
        die();
    }

    $acd = mssql_fetch_object(mssql_query_logged("SELECT * FROM Account(nolock) WHERE AID = {$_SESSION[AID]}"));

    $data = mssql_fetch_object($ires);

    switch($data->Slot)
{
    case 3:
        $type = "Armor";
    break;
    case 2:
        $type = "Melee";
    break;
    case 1:
        $type = "Ranged";
    break;
    case 5:
        $type = "Special";
    break;
    default:
        $type = "Armor";
    break;
}
}




?>

<table border="0" style="border-collapse: collapse" width="778">
					<tr>
                       
						<td width="599" valign="top">
						<div align="center">
							<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/content_bg.jpg');background-size: 100%; background-repeat:repeat-y" width="603">
								<tr>
									<td style="background-image: url('images/content_title_shop_giftitem.jpg'); background-repeat: no-repeat; background-position: center top; background-size: 100%" height="55" width="601" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="597" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<div align="center">
									<table border="0" style="border-collapse: collapse;background: #272727; border: 1px solid rgba(124,255,255, 0.3)" width="100%" bordercolor="#4A4648">
											<tr>
												<td>
												<div align="center">
													<form method="POST" action="index.php?do=giftdonator" name="frmBuy"><table border="0" style="border-collapse: collapse" width="579" height="100%">
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104">&nbsp;</td>
															<td width="458" colspan="2">&nbsp;</td>
														</tr>
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104" valign="top">
															<div align="center">
															<img border="0" src="images/shop/donator/<?=$imgurl = file_exists("images/shop/donator/".$data->ImageURL) ? $data->ImageURL : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #1D1B1C"></td>
															<td width="458" colspan="2">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="458" height="100%">
																	<tr>
																		<td width="19">
																		<div align="left">&nbsp;</td>
																		<td width="435" colspan="2">
																		<div align="left">
																		<b>
																		<font size="2">
																		<?=$data->Name?></font></b></td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		Type:
																		</td>
																		<td width="372" align="left">
																		<?=$type?></td>
																	</tr>
                                                                    <tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		Sex:</td>
																		<td width="372" align="left">
																		<?=GetSexByID($data->Sex)?></td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		Level:</td>
																		<td width="372" align="left">
																		<?=$data->Level?></td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		</td>
																		<td width="372" align="left">
																		</td>
                                                                        <input type="hidden" name="itemid" value="<?=$_GET[itemid]?>">
                                                                    </tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="435" colspan="2" rowspan="5" style="background-image: url('images/mis_eumember.png'); background-size: 80% 60%; background-repeat: no-repeat; background-position: center" valign="middle">
																		<div align="center">
																		Period. <select name="price" id="price" style="padding: 1px 5px 1px 5px; box-shadow: inset 0px 0px 8px #000">
																				<option value="<?=$data->Price1?>">3 days (<?=$data->Price1?> coins)</option>
																				<option value="<?=$data->Price2?>">14 days (<?=$data->Price2?> coins)</option>
																				<option value="<?=$data->Price3?>" selected>30 days (<?=$data->Price3?> coins)</option>
																				<option value="<?=$data->Price?>">Permanent (<?=$data->Price?> coins)</option>
																			</select>
																			<input style="display: none" type="text" name="period" id="period" value="2">
                                                                        </div>
																		</td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																	</tr>
																</table>
															</div>
															</td>
														</tr>
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104">&nbsp;</td>
															<td width="19">&nbsp;</td>
															<td width="435" align="left" rowspan="4">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="435" height="66">
																	<tr>
																		<td width="419">
																		<div align="center" style="background-image: url('images/mis_finalbalance.png'); background-repeat: no-repeat; background-position: left; padding: 20px; background-size: 70% 100%">
																		<STYLE>
																			.pricetext{
																				border: none; 
																				background: rgba(0,0,0,0);
																				padding: 0; margin:0;
																				color: #fff !important;
																			}
																			.pricetext disabled{
																				color: #fff;
																			}
																		</STYLE>
																			<table border="0" style="border-collapse: collapse;" width="419" height="100%">
																				<tr>
																					<td width="216">Regalar A: <input name="recipient" size="10" class="textLogin" type="text"> </td>
																					<td width="117" align="left">Total:</td>
																					<td width="62" align="left"><input class="pricetext"  disabled id="pricetxt" type="text" value="<?=$data->Price3?>"></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">Tienes SACoins</td>
																					<td width="62" align="left"><input class="pricetext" disabled id="coinsaccount" type="text" value="<?=$acd->Coins?>"></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<?
																					$aftercoins = $acd->Coins - $data->Price3;
																				?>
																				<tr>
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">Despues:</td>
																					<td width="62" align="left"><input class="pricetext" disabled id="coinsafter" type="text" value="<?=$aftercoins?>"></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="413" colspan="4" height="1"></td>
																				</tr>
																			</table>
														<script>
																			document.getElementById("price").onchange = function() {myFunction()};

																			function myFunction() {
																				var price = document.getElementById("price");
																				var pricetxt = document.getElementById("pricetxt");
																				var period = document.getElementById("period");
																				var coinsafter = document.getElementById("coinsafter");
																				var coinsaccount = document.getElementById("coinsaccount");
																				pricetxt.value = price.value;
																				period.value = price.selectedIndex;
																				coinsafter.value = coinsaccount.value - price.value;
																			}
																		</script>
																		</div>
																		</td>
																		<td style="background-repeat: no-repeat; background-position: left center" width="12">&nbsp;</td>
																	</tr>
																</table>
															</div>
															</td>
														</tr>
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104">&nbsp;</td>
															<td width="19">&nbsp;</td>
														</tr>
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104">&nbsp;</td>
															<td width="19">&nbsp;</td>
														</tr>
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104">&nbsp;</td>
															<td width="19">&nbsp;</td>
														</tr>
														<tr>
															<td width="569" colspan="4">&nbsp;</td>
														</tr>
													</table>

												</div>
												</td>
											</tr>
										</table>
									</div>
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="597" colspan="3">&nbsp;
									</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="597" colspan="3">
									<p align="center">
									<a href="javascript:document.frmBuy.submit();">
									<img border="0" src="images/btn_giftitem_off.jpg" width="55" height="23" id="img1764" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1764',/*url*/'images/btn_giftitem_on.png')"></a>
									<a href="index.php?do=shopdonator">
									<img border="0" src="images/btn_cancel_off.jpg" width="79" height="23" id="img1765" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1765',/*url*/'images/btn_cancel_on.jpg')"></a></td>
								</tr>
								<tr>
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat;background-size: 100%; background-position: center bottom" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>