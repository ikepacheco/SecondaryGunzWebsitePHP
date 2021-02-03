<?php

SetTitle("SecondaryGunz - Comprar Item");

if($_SESSION[AID] == "")
{
    SetURL("index.php?do=buyevent&itemid={$_GET[itemid]}");
    SetMessage("Mensaje de la Tienda", array("Logueate Primero Por Favor"));
    header("Location: index.php?do=login");
    die();
}

if(!isset($_POST[itemid]))
{
    if($_GET[itemid] == "" || !is_numeric($_GET[itemid]))
    {
        SetMessage("Mensaje de la Tienda", array("Incorrecta Informacion Del Item"));
        header("Location: index.php?do=shopitem");
        die();
    }
}

if(isset($_POST[itemid]))
{
    $itemid  = clean($_POST[itemid]);
    $accid  = clean($_SESSION[AID]);

    $ires = mssql_query_logged("SELECT * FROM ShopEvents(nolock) WHERE CSSID = $itemid");

    if(mssql_num_rows($ires) == 0)
    {
        SetMessage("Error de la Tienda", array("Item not found"));
        header("Location index.php?do=shopevent");
        die();
    }

    $ires = mssql_fetch_object($ires);

    $ares = mssql_fetch_object(mssql_query_logged("SELECT * FROM Account(nolock) WHERE AID  = $accid"));

    $totalprice       = $ires->Price;
    $accountbalance = $ares->EventCoins;
    $afterbalance   = $accountbalance - $totalprice;
    $ugradeid = $ares->UGradeID;

    if ($itemid == 1 && $ugradeid == 2)
    {
        SetMessage("Mensaje de la Tienda", array("Ya Usted Posee Jjang No Tiene Por Que Comprarlo De Nuevo."));
        header("Location: index.php?do=buyevent&itemid=$itemid");
        die();
    }
    elseif($itemid == 1 && $ugradeid != 0)
    {
        SetMessage("Mensaje de la Tienda", array("No Puedes Comprara Un Jjang A Un Moderador O A Un Usuario Banneado."));
        header("Location: index.php?do=buyevent&itemid=$itemid");
        die();
    }

    if($afterbalance < 0)
    {
        SetMessage("Error de la Tienda", array("Usted no Posee DCoins suficientes para comprar este Item."));
        header("Location: index.php?do=buyevent&itemid=$itemid");
        die();

    }else{
        if( $itemid == 1 )
        {
            mssql_query_logged("UPDATE Account SET UGradeID = 2, EventCoins = EventCoins - $totalprice WHERE AID = {$_SESSION[AID]}");
            mssql_query_logged("UPDATE ShopEvents SET Selled = Selled + 1 WHERE CSSID = $itemid");

            SetMessage("Mensaje de la Tienda", array("Compra Del Jjang Completa"));
            header("Location: index.php?do=shopevent");
            die();
        }
        else
        {
            mssql_query_logged("UPDATE Account SET EventCoins = EventCoins - $totalprice WHERE AID = {$_SESSION[AID]}");
            mssql_query_logged("UPDATE ShopEvents SET Selled = Selled + 1 WHERE CSSID = $itemid");

            //Head
            mssql_query_logged("INSERT INTO AccountItem(AID, ItemID, RentDate, Cnt)VALUES" .
                        "($accid, {$ires->zItemID}, GETDATE(), 1)");


            SetMessage("Mensaje de la Tienda", array("Item purchased successfully, look at your storage in gunz for using it"));
            header("Location: index.php?do=shopevent");
            die();
        }

    }
}else{
    $itemid  = clean($_GET[itemid]);

    $ires = mssql_query_logged("SELECT * FROM ShopEvents(nolock) WHERE CSSID = $itemid");


    if(mssql_num_rows($ires) == 0)
    {
        SetMessage("Error de la Tienda", array("Item not found"));
        header("Location index.php?do=shopevent");
        die();
    }

    $acd = mssql_fetch_object(mssql_query_logged("SELECT * FROM Account(nolock) WHERE AID = {$_SESSION[AID]}"));

    $data = mssql_fetch_object($ires);
    switch($data->Slot)
{
    case 3:
        $type = "Armadura";
    break;
    case 2:
        $type = "Melee";
    break;
    case 1:
        $type = "Rango";
    break;
    case 5:
        $type = "Especial";
    break;
    default:
        $type = "Armadura";
    break;
}
}




?>

<table border="0" style="border-collapse: collapse" width="778">
					<tr>
                        <td width="599" valign="top">
						<div align="center">
							<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/content_bg.jpg'); background-size:100%; background-repeat:repeat-y" width="603">
								<tr>
									<td style="background-image: url('images/content_title_shop_buyitem.jpg'); background-repeat: no-repeat; background-position: center top; background-size:100%" height="55" width="601" colspan="3">&nbsp;</td>
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
													<form method="POST" action="index.php?do=buyevent" name="frmBuy"><table border="0" style="border-collapse: collapse" width="579" height="100%">
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104">&nbsp;</td>
															<td width="458" colspan="2">&nbsp;</td>
														</tr>
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104" valign="top">
															<div align="center">
															<img border="0" src="images/shop/event/<?=$imgurl = file_exists("images/shop/donator/".$data->ImageURL) ? $data->ImageURL : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #1D1B1C"></td>
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
																		Tipo:
																		</td>
																		<td width="372" align="left">
																		<?=$type?></td>
																	</tr>
                                                                    <tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		Sexo:</td>
																		<td width="372" align="left">
																		<?=GetSexByID($data->Sex)?></td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		Nivel:</td>
																		<td width="372" align="left">
																		<?=$data->Level?></td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		Precio:</td>
																		<td width="372" align="left">
																		<span id="currentprice"><?=$data->Price?></span>
                                                                        <input type="hidden" name="itemid" value="<?=$_GET[itemid]?>">
                                                                        </td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="435" colspan="2" rowspan="5" style="background-image: url('images/mis_eumember.png'); background-repeat: no-repeat; background-position: center; background-size: 80%" valign="middle">
																		<div align="center">
																																							Duracion (Dias): Permanente.
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
																		<td style="background-image: url('images/mis_finalbalance.png'); background-repeat: no-repeat; background-position: right center" width="419">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="419" height="100%">
																				<tr>
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">Total:</td>
																					<td width="62" align="left"><span id="Total"><?=$data->Price?></span></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">Tienes DCoins</td>
																					<td width="62" align="left"><span id="currbalance"><?=$acd->EventCoins?></span></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">Despues:</td>
																					<td width="62" align="left"><span id="afterpur"><?=(($acd->EventCoins) - ($data->Price))?></span></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="413" colspan="4" height="1"></td>
																				</tr>
																			</table>
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
									<img border="0" src="images/btn_buyitem2_off.jpg" width="79" height="23" id="img1764" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1764',/*url*/'images/btn_buyitem2_on.jpg')"></a>
									<a href="index.php?do=shopevent">
									<img border="0" src="images/btn_cancel_off.jpg" width="79" height="23" id="img1765" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1765',/*url*/'images/btn_cancel_on.jpg')"></a></td>
								</tr>
								<tr>
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat; background-position: center bottom" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>