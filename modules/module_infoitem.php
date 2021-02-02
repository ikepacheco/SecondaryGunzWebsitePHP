<?

if($_GET[itemid] <> "" && is_numeric($_GET[itemid]))
{
    $itemid = clean($_GET[itemid]);
}else{
    SetMessage("Error from Shop", array("Incorrect item information"));
    header("Location: index.php?do=shopitem");
    die();
}

$res = mssql_fetch_object(mssql_query_logged("SELECT * FROM ShopItems(nolock) WHERE CSSID = $itemid"));

SetTitle("SecondaryGunz - Informaci�n {$res->Name}");


switch($res->Slot)
{
    case 3:
        $type = "Armadura";
    break;
    case 2:
        $type = "Melee";
    break;
    case 1:
        $type = "Ranged";
    break;
    case 5:
        $type = "Especial";
    break;
    default:
        $type = "Armadura";
    break;
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
									<td style="background-image: url('images/content_title_shop_moreitem.jpg'); background-repeat: no-repeat; background-position: center top" height="25" width="601" colspan="3">&nbsp;</td>
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
													<form method="POST" action="index.php?do=buyset" name="frmBuy"><input type="hidden" name="SetID" value="<?=$_GET[setid]?>"><table border="0" style="border-collapse: collapse" width="579" height="100%">
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104">&nbsp;</td>
															<td width="458" colspan="2">&nbsp;</td>
														</tr>
														<tr>
															<td width="11" rowspan="3">&nbsp;</td>
															<td width="104" valign="top">
															<div align="center">
															<img border="0" src="images/shop/<?=$res->ImageURL?>" width="100" height="100" style="border: 2px solid #1D1B1C"></td>
															<td width="443">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="100%" height="100%">
																	<tr>
																		<td width="19">
																		<div align="left">&nbsp;</td>
																		<td width="435" colspan="2">
																		<div align="left">
																		<b>
																		<font size="2">
																		<?=$res->Name?></font></b></td>
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
																		<?=GetSexByID($res->Sex)?></td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		Nivel:</td>
																		<td width="372" align="left">
																		<?=$res->Level?></td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		Precio:</td>
																		<td width="372" align="left">
																		<?=$res->Price?></td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="435" colspan="2" style="background-repeat: no-repeat; background-position: center">&nbsp;
																		</td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="435" colspan="2" style="background-repeat: no-repeat; background-position: center">&nbsp;
																		</td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="435" colspan="2" style="background-repeat: no-repeat; background-position: center">&nbsp;
																		</td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="435" colspan="2" style="background-repeat: no-repeat; background-position: center">&nbsp;
																		</td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="435" colspan="2" style="background-repeat: no-repeat; background-position: center">&nbsp;
																		</td>
																	</tr>
																</table>
																<script language="javascript">
																	UpdatePrice();
																</script>
															</div>
															</td>
															<td width="13" rowspan="3">&nbsp;
															</td>
														</tr>
														<tr>
															<td width="544" colspan="2">&nbsp;</td>
														</tr>
														<tr>
															<td width="544" colspan="2" style="background-image: url('images/mis_iteminfo_bg.jpg'); background-repeat: no-repeat; background-position: center" height="144">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="544" height="100%">
																	<tr>
																		<td width="181">
																		<div align="center">
																			<table border="1" style="border-collapse: collapse" width="175" height="98" bordercolor="#565053">
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">Weight</span></td>
																					<td width="87" align="right"><?=$res->Weight?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">Damage</span></td>
																					<td width="87" align="right"><?=$res->Damage?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">Delay</span></td>
																					<td width="87" align="right"><?=$res->Delay?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">Controlability</span></td>
																					<td width="87" align="right"><?=$res->Control?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">Magazine</span></td>
																					<td width="87" align="right"><?=$res->Magazine?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																			</table>
																		</div>
																		</td>
																		<td width="181">
																		<div align="center">
																			<table border="1" style="border-collapse: collapse" width="175" height="98" bordercolor="#565053">
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">Max Bullets</span></td>
																					<td width="87" align="right"><?=$res->MaxBullet?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">HP</span></td>
																					<td width="87" align="right"><?=$res->HP?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">AP</span></td>
																					<td width="87" align="right"><?=$res->AP?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">Max Weight</span></td>
																					<td width="87" align="right"><?=$res->MaxWeight?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">Reload Time</span></td>
																					<td width="87" align="right"><?=$res->ReloadTime?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																			</table>
																		</div>
																		</td>
																		<td width="182">
																		<div align="center">
																			<table border="1" style="border-collapse: collapse" width="175" height="98" bordercolor="#565053">
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><span style="font-size: 7pt; font-weight: 700">Duration</span></td>
																					<td width="87" align="right"><?=$res->Duration?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><b><span style="font-size: 7pt">FR</span></b></td>
																					<td width="87" align="right"><?=$res->FR?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><b><span style="font-size: 7pt">CR</span></b></td>
																					<td width="87" align="right"><?=$res->CR?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><b><span style="font-size: 7pt">PR</span></b></td>
																					<td width="87" align="right"><?=$res->PR?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																				<tr>
																					<td width="86" bgcolor="#464244" align="left"><b><span style="font-size: 7pt">LR</span></b></td>
																					<td width="87" align="right"><?=$res->LR?>&nbsp;&nbsp;&nbsp; </td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
																</table>
															</div>
															</td>
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
									<div align="center">
									<a href="index.php?do=buyitem&itemid=<?=$_GET[itemid]?>">
									<img border="0" src="images/btn_buyitem4_off.jpg" width="79" height="23" id="img1764" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1764',/*url*/'images/btn_buyitem4_on.jpg')"></a>
									<a href="index.php?do=giftitem&itemid=<?=$_GET[itemid]?>">
									<img border="0" src="images/btn_giftitem4_off.jpg" width="79" height="23" id="img1765" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1765',/*url*/'images/btn_giftitem4_on.jpg')"></a>
									<a href="index.php?do=shopitem">
									<img border="0" src="images/btn_cancel_off.jpg" width="79" height="23" id="img1766" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1766',/*url*/'images/btn_cancel_on.jpg')"></a></td>
								</tr>
								<tr>
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat; background-position: center bottom" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>