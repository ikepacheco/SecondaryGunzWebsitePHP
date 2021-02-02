<?php

SetTitle("SecondaryGunz - Regalar Item");

if($_SESSION[AID] == "")
{
    SetURL("index.php?do=giftitem&itemid={$_GET[itemid]}");
    SetMessage("Mensaje De La Tienda", array("Logueate Primero Por favor"));
    header("Location: index.php?do=login");
    die();
}

if(!isset($_POST[itemid]))
{
    if($_GET[itemid] == "" || !is_numeric($_GET[itemid]))
    {
        SetMessage("Mensaje De La Tienda", array("Incorrecta Informacion Del item"));
        header("Location: index.php?do=shopitem");
        die();
    }
}

if(isset($_POST[itemid]))
{
    $itemid  = clean($_POST[itemid]);
    $accid  = clean($_SESSION[AID]);

    $recid  = clean($_POST[recipient]);

    if(strlen($recid) == 0)
    {
        SetMessage("Error De La Tienda", array("Por Favor Introduzca El UserID Del Beneficiario"));
        header("Location: index.php?do=giftitem&itemid=$itemid");
        die();
    }

    $rres = mssql_query_logged("SELECT * FROM Account(nolock) WHERE UserID = '$recid'");

    if(mssql_num_rows($rres) == 0)
    {
        SetMessage("Error De La Tienda", array("El beneficiario No Existe Recuerda Que Debes Introducir El UserID No El Nombre Del Personaje"));
        header("Location: index.php?do=giftitem&itemid=$itemid");
        die();
    }

    $abc = mssql_fetch_object($rres);

    $ires = mssql_query_logged("SELECT * FROM ShopItems(nolock) WHERE CSSID = $itemid");
                           
    if(mssql_num_rows($ires) == 0)
    {
        SetMessage("Error De La Tienda", array("Item no Existe"));
        header("Location index.php?do=shopevent");
        die();
    }

    $ires = mssql_fetch_object($ires);
    $ares = mssql_fetch_object(mssql_query_logged("SELECT * FROM Account(nolock) WHERE AID  = $accid"));

    $totalprice       = $ires->Price;
    $accountbalance = $ares->Coins;
    $afterbalance   = $accountbalance - $totalprice;
    $ugradeid = $abc->UGradeID;

    if ($itemid == 1 && $ugradeid == 2)
    {
        SetMessage("Mensaje De La Tienda", array("El Beneficiario Ya Posee Jjang"));
        header("Location: index.php?do=giftitem&itemid=$itemid");
        die();
    }
    elseif($itemid == 1 && $ugradeid != 0)
    {
        SetMessage("Mensaje De La Tienda", array("No Puedes Regalar Jjang A Un Adm O Mod Ni A Los Usuarios Banneados!"));
        header("Location: index.php?do=giftitem&itemid=$itemid");
        die();
    }

    if($afterbalance < 0)
    {
        SetMessage("Error De La Tienda", array("YNo Posees DCoins Para Efectuar La Compra."));
        header("Location: index.php?do=giftitem&itemid=$itemid");
        die();

    }else{
        if( $itemid == 1 )
        {
            mssql_query_logged("UPDATE Account SET Coins = Coins - $totalprice WHERE AID = {$_SESSION[AID]}");
            mssql_query_logged("UPDATE ShopItems SET Selled = Selled + 1 WHERE CSSID = $itemid");
            mssql_query_logged("UPDATE Account SET UGradeID = 2 WHERE AID = {$abc->AID}");

            SetMessage("Mensaje De La Tienda", array("Jjang comprado correctamente, para ver el cambio, tu amigo debe reloguearse en GunZ"));
            header("Location: index.php?do=giftitem");
            die();
        }
        else
        {
            mssql_query_logged("UPDATE Account SET Coins = Coins - $totalprice WHERE AID = {$_SESSION[AID]}");
            mssql_query_logged("UPDATE ShopItems SET Selled = Selled + 1 WHERE CSSID = $itemid");

            //Head
            mssql_query_logged("INSERT INTO AccountItem(AID, ItemID, RentDate, Cnt)VALUES" .
                        "({$abc->AID}, {$ires->zItemID}, GETDATE(), 1)");


            SetMessage("Tienda", array("Event Item Regalado A $recid"));
            header("Location: index.php?do=shopevent");
            die();
        }
    }
}else{
    $itemid  = clean($_GET[itemid]);

    $ires = mssql_query_logged("SELECT * FROM ShopItems(nolock) WHERE CSSID = $itemid");


    if(mssql_num_rows($ires) == 0)
    {
        SetMessage("Error De La Tienda", array("Item no Existe"));
        header("Location index.php?do=shopevent");
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
                        <td width="164" valign="top">
                            <table border="0" style="border-collapse: collapse" width="164">
                            <tr>
                                <td width="164" style="background-image: url('images/md_content_menu_t.jpg'); background-repeat: no-repeat; background-position: center top" valign="top">&nbsp;
                                
                                </td>
                            </tr>
                            <tr>
                                <td width="164" style="background-image: url('images/md_content_menu_m.jpg'); background-repeat: repeat-y; background-position: center top" valign="top">
                                <div align="center">
        							<table border="0" style="border-collapse: collapse" width="164">
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127">
                                            <a href="index.php?do=shop">
                                            <img border="0" src="images/btn_newestitems_off.jpg" id = "76176img" width="132" height="22" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'76176img',/*url*/'images/btn_newestitems_on.jpg')"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopdonator"><img src="images/btn_donatoritems_off.jpg" alt="" name="donatoritems" width="132" height="26" border="0" id="donatoritems" onmouseover="FP_swapImg(1,1,/*id*/'donatoritems',/*url*/'images/btn_donatoritems_on.jpg')" onmouseout="FP_swapImgRestore()" /></a></td>
       									  <td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopevent"><img border="0" src="images/btn_eventitems_off.jpg" id="eventitems37" width="132" height="26" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'eventitems37',/*url*/'images/btn_eventitems_on.jpg')" /></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopsets"><img src="images/btn_completeset_off.jpg" alt="" width="132" height="26" border="0" id="7816imgxD271" onmouseover="FP_swapImg(1,1,/*id*/'7816imgxD271',/*url*/'images/btn_completeset_on.jpg')" onmouseout="FP_swapImgRestore()" /></a></td>
       									  <td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopitem&cat=3"><img border="0" src="<?=($_GET[cat] <> 3) ? "images/btn_armor_off.jpg" : "images/btn_armor_on.jpg"?>" id="7816img272" width="132" height="25" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'7816img272',/*url*/'images/btn_armor_on.jpg')" /></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopitem&cat=2"><img border="0" src="<?=($_GET[cat] <> 2) ? "images/btn_meleeweapons_off.jpg" : "images/btn_meleeweapons_on.jpg"?>" id="7816img273" width="132" height="25" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'7816img273',/*url*/'images/btn_meleeweapons_on.jpg')" /></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopitem&cat=1"><img border="0" src="<?=($_GET[cat] <> 1) ? "images/btn_rangedweapons_off.jpg" : "images/btn_rangedweapons_on.jpg"?>" id="7816img274" width="132" height="27" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'7816img274',/*url*/'images/btn_rangedweapons_on.jpg')" /></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        								  <td>&nbsp;</td>
        								  <td><a href="index.php?do=shopitem&cat=5"><img border="0" src="<?=($_GET[cat] <> 5) ? "images/btn_specialitems_off.jpg" : "images/btn_specialitems_on.jpg"?>" id="7816img275" width="132" height="23" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'7816img275',/*url*/'images/btn_specialitems_on.jpg')" /></a></td>
        								  <td>&nbsp;</td>
      								  </tr>
        								</table>
        						</div>

        						</td>
                        </tr>
                        <tr>
    						<td width="164" style="background-image: url('images/md_content_menu_d.jpg'); background-repeat: no-repeat; background-position: center top" valign="top">
                            <div align="center">
                            &nbsp;<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</p>
    						<p>&nbsp;</div></td>
                        </tr>
                            </table>
                        </td>
						<td width="599" valign="top">
						<div align="center">
							<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/content_bg.jpg'); background-repeat:repeat-y" width="603">
								<tr>
									<td style="background-image: url('images/content_title_shop_giftitem.jpg'); background-repeat: no-repeat; background-position: center top" height="25" width="601" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="597" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<div align="center">
										<table border="1" style="border-collapse: collapse; border: 1px solid #4A4648" width="100%" bordercolor="#4A4648">
											<tr>
												<td>
												<div align="center">
													<form method="POST" action="index.php?do=giftitem" name="frmBuy"><table border="0" style="border-collapse: collapse" width="579" height="100%">
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104">&nbsp;</td>
															<td width="458" colspan="2">&nbsp;</td>
														</tr>
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104" valign="top">
															<div align="center">
															<img border="0" src="images/shop/<?=$data->ImageURL?>" width="100" height="100" style="border: 2px solid #1D1B1C"></td>
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
																		Price:</td>
																		<td width="372" align="left">
																		<span id="currentprice"><?=$data->Price?></span></td>
                                                                        <input type="hidden" name="itemid" value="<?=$_GET[itemid]?>">
                                                                    </tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="435" colspan="2" rowspan="5" style="background-image: url('images/mis_eumember.jpg'); background-repeat: no-repeat; background-position: center" valign="middle">
																		<div align="center">
																																							Duracion (Dias): Permanente
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
																		<td style="background-image: url('images/mis_finalbalance.jpg'); background-repeat: no-repeat; background-position: right center" width="419">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="419" height="100%">
																				<tr>
																					<td width="216">Regalar A:<input name="recipient" size="10" class="textLogin" type="text"> </td>
																					<td width="117" align="left">Total:</td>
																					<td width="62" align="left"><span id="Total"><?=$data->Price?></span></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">Tienes SACoins</td>
																					<td width="62" align="left"><span id="currbalance"><?=$acd->Coins?></span></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">Despues:</td>
																					<td width="62" align="left"><span id="afterpur"><?=(($acd->Coins) - ($data->Price))?></span></td>
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