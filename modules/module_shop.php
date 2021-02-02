<?
SetTitle("SecondaryGunZ - Tienda");


$res = mssql_query("SELECT TOP 4 * FROM ShopItems(nolock) ORDER BY Selled DESC");

$count = 0;
                                                                                                                           
while($a = mssql_fetch_object($res))
{
    $items[$count][ID]        = $a->CSSID;
    $items[$count][Name]      = $a->Name;
    $items[$count][Type]      = GetTypeByID($a->Slot);
    $items[$count][Sex]       = GetSexByID($a->Sex);
    $items[$count][Level]     = $a->Level;
    $items[$count][Price]     = $a->Price;
    $items[$count][ImageURL]  = $a->ImageURL;
    $items[$count][CatID]     = $a->Slot;

    $count++;
}

$count = 4;

$res = mssql_query("SELECT TOP 4 * FROM ShopSets(nolock) ORDER BY Selled DESC");

while($a = mssql_fetch_object($res))
{
    $items[$count][ID]        = $a->SSID;
    $items[$count][Name]      = $a->Name;
    $items[$count][Type]      = GetTypeByID($a->Slot);
    $items[$count][Sex]       = GetSexByID($a->Sex);
    $items[$count][Level]     = $a->Level;
    $items[$count][Price]     = $a->Price;
    $items[$count][ImageURL]  = $a->ImageURL;
    $items[$count][CatID]     = $a->Slot;

    $count++;
}


?><table border="0" style="border-collapse: collapse" width="778">
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
                                            <img border="0" src="images/btn_newestitems_on.jpg" id = "76176img" width="132" height="22" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'76176img',/*url*/'images/btn_newestitems_on.jpg')"></a></td>
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
        									<td width="127"><a href="index.php?do=shopsets"><img border="0" src="images/btn_completeset_off.jpg" id="7816imgxD271" width="132" height="26" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'7816imgxD271',/*url*/'images/btn_completeset_on.jpg')" /></a></td>
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
									<td style="background-image: url('images/content_title_shop_home.jpg'); background-repeat: no-repeat; background-position: center top" height="25" width="601" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="597" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="597" colspan="3">
									<div align="center">
									<img border="0" src="images/mis_introshop.jpg" width="577" height="153"></td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">&nbsp;
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<div align="left">
									<img border="0" src="images/mis_shop_mostselled_index.jpg" width="90" height="11"></td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="597" colspan="3" height="5"></td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<div align="center">
								    <table border="1" style="border-collapse: collapse; border: 1px solid #4A4648" width="100%" height="100%" bordercolor="#4A4648">
											<tr>
												<td>
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="579" height="100%">
														<tr>
															<td width="289" valign="top">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="287" height="100%">
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95" valign="top">
																		<img border="0" src="images/shop/<?=$items[0][ImageURL]?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[0][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$items[0][Type]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=$items[0][Sex]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$items[0][Level]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$items[0][Price]?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<div align="center">
																							<table border="0" style="border-collapse: collapse" width="166" height="100%">
																								<tr>
																									<td width="55"><a href="index.php?do=giftitem&itemid=<?=$items[0][ID]?>&cat=<?=$items[0][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																									<td width="55"><a href="index.php?do=buyitem&itemid=<?=$items[0][ID]?>&cat=<?=$items[0][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img1791" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1791',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[0][ID]?>&cat=<?=$items[0][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img1792" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1792',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
																								</tr>
																							</table>
																						</div>
																					</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																</table>
															</div>
															</td>
															<td width="290" valign="top">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="287" height="100%">
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95" valign="top">
																		<img border="0" src="images/shop/<?=$items[1][ImageURL]?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[1][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$items[1][Type]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=$items[1][Sex]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$items[1][Level]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$items[1][Price]?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<div align="center">
																							<table border="0" style="border-collapse: collapse" width="166" height="100%">
																								<tr>
																									<td width="55"><a href="index.php?do=giftitem&itemid=<?=$items[1][ID]?>&cat=<?=$items[1][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790xD3" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790xD3',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																									<td width="55"><a href="index.php?do=buyitem&itemid=<?=$items[1][ID]?>&cat=<?=$items[1][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img1791xD2" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1791xD2',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[1][ID]?>&cat=<?=$items[1][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img1792xD1" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1792xD1',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
																								</tr>
																							</table>
																						</div>
																					</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																</table>
															</div>
															</td>
														</tr>
														<tr>
															<td width="289" valign="top">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="287" height="100%">
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95" valign="top">
																		<img border="0" src="images/shop/<?=$items[2][ImageURL]?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[2][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$items[2][Type]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=$items[2][Sex]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$items[2][Level]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$items[2][Price]?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<div align="center">
																							<table border="0" style="border-collapse: collapse" width="166" height="100%">
																								<tr>
																									<td width="55"><a href="index.php?do=giftitem&itemid=<?=$items[2][ID]?>&cat=<?=$items[2][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790xDxDxD" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790xDxDxD',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																									<td width="55"><a href="index.php?do=buyitem&itemid=<?=$items[2][ID]?>&cat=<?=$items[2][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img1791xDxD" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1791xDxD',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[2][ID]?>&cat=<?=$items[2][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img1792xD" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1792xD',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
																								</tr>
																							</table>
																						</div>
																					</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																</table>
															</div>
															</td>
															<td width="290" valign="top">
															<div align="center">
 																<table border="0" style="border-collapse: collapse" width="287" height="100%">
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95" valign="top">
																		<img border="0" src="images/shop/<?=$items[3][ImageURL]?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[3][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$items[3][Type]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=$items[3][Sex]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$items[3][Level]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$items[3][Price]?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<div align="center">
																							<table border="0" style="border-collapse: collapse" width="166" height="100%">
																								<tr>
																									<td width="55"><a href="index.php?do=giftitem&itemid=<?=$items[3][ID]?>&cat=<?=$items[3][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790111" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790111',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																									<td width="55"><a href="index.php?do=buyitem&itemid=<?=$items[3][ID]?>&cat=<?=$items[3][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img179111" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img179111',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[3][ID]?>&cat=<?=$items[3][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img17921" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img17921',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
																								</tr>
																							</table>
																						</div>
																					</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																</table>
															</div>
															</td>
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
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="583">&nbsp;
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;
									</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="583">
									<img border="0" src="images/mis_shop_mostselled_sets_in.jpg" align="left" width="86" height="11"></td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;
									</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="597" colspan="3" height="5">
									</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">
									<div align="center">
									&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583">
									<div align="center">
								    <table border="1" style="border-collapse: collapse; border: 1px solid #4A4648" width="100%" height="100%" bordercolor="#4A4648">
											<tr>
												<td>
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="579" height="100%">
														<tr>
															<td width="289" valign="top">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="287" height="100%">
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">
																		<img border="0" src="images/shop/<?=$items[4][ImageURL]?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[4][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111">Complete Set</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=$items[4][Sex]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$items[4][Level]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$items[4][Price]?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$items[4][ID]?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img1772" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1772',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$items[4][ID]?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img1773" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1773',/*url*/'images/btn_buyset_on.jpg')"></a></td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																</table>
															</div>
															</td>
															<td width="290" valign="top">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="287" height="100%">
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">
																		<img border="0" src="images/shop/<?=$items[5][ImageURL]?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[5][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111">Complete Set</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=$items[5][Sex]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$items[5][Level]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$items[5][Price]?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$items[5][ID]?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img1772dsd" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1772dsd',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$items[5][ID]?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img1773aav" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1773aav',/*url*/'images/btn_buyset_on.jpg')"></a></td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																</table>
															</div>
															</td>
														</tr>
														<tr>
															<td width="289" valign="top">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="287" height="100%">
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">
																		<img border="0" src="images/shop/<?=$items[6][ImageURL]?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[6][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111">Complete Set</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=$items[6][Sex]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$items[6][Level]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$items[6][Price]?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$items[6][ID]?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img177222" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img177222',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$items[6][ID]?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img177233" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img177233',/*url*/'images/btn_buyset_on.jpg')"></a></td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																</table>
															</div>
															</td>
															<td width="290" valign="top">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="287" height="100%">
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">
																		<img border="0" src="images/shop/<?=$items[7][ImageURL]?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[7][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111">Complete Set</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=$items[7][Sex]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$items[7][Level]?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$items[7][Price]?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$items[7][ID]?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img1772xD" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1772xD',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$items[7][ID]?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img1773asd" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1773asd',/*url*/'images/btn_buyset_on.jpg')"></a></td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;</td>
																		<td width="178">&nbsp;</td>
																	</tr>
																</table>

															</div>
															</td>
														</tr>
														</table>
 												</div>
												</td>
											</tr>
										</table>

									</div>
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;
									</td>
								</tr>
								<tr>
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat; background-position: center bottom" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>