<?
SetTitle("SecondaryGunZ - Shop");


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

$res = mssql_query("SELECT TOP 4 * FROM ShopItems(nolock) where Slot=5 ORDER BY Selled DESC");

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


?><table border="0" style="border-collapse: collapse" width="778">
					<tr>
                        
						<td width="599" valign="top">
						<div align="center">
							<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/content_bg.jpg'); background-repeat:repeat-y; background-size: 100%;" width="603">
								<tr>
									<td style="background-image: url('images/content_title_shop_armor.jpg'); background-repeat: no-repeat; background-position: center top; background-size: 100%" height="45" width="601" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">&nbsp;
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
								</tr>
								<tr height="30" style="border-collapse: collapse; background-image: url('images/content_ranking_data_bg.jpg'); background-repeat: no-repeat; background-position: center top; background-size: 85%">
									<td style="background-repeat: repeat; background-position: center top; text-align: center;vertical-align: top;font-size: 9.5pt; padding-top: 3px" width="597" colspan="3">
									<a href="?do=shopdonator">Donator Shop</a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="?do=shopevent">Event Shop</a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="?do=shopdonator&cat=1">Ranged weapons</a>
									&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
									<a href="?do=shopdonator&cat=1">Melee weapons</a>
									</td>
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
									<div align="center">
									<img border="0" src="images/mis_shop_mostselled_index.jpg" width="258" height="25"></div></td>
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
																		<img border="0" src="images/shop/donator/<?=$imgurl = file_exists("images/shop/donator/".$items[0][ImageURL]) ? $items[0][ImageURL] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																									<td width="55"><a href="index.php?do=giftdonator&itemid=<?=$items[0][ID]?>&cat=<?=$items[0][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790',/*url*/'images/btn_giftitem_on.png')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[0][ID]?>&cat=<?=$items[0][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img1792" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1792',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																									<td width="55"><a href="index.php?do=buydonator&itemid=<?=$items[0][ID]?>&cat=<?=$items[0][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img1791" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1791',/*url*/'images/btn_buyitem3_on.png')"></a></td>
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
																		<img border="0" src="images/shop/donator/<?=$imgurl = file_exists("images/shop/donator/".$items[1][ImageURL]) ? $items[1][ImageURL] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																									<td width="55"><a href="index.php?do=giftdonator&itemid=<?=$items[1][ID]?>&cat=<?=$items[1][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790xD3" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790xD3',/*url*/'images/btn_giftitem_on.png')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[1][ID]?>&cat=<?=$items[1][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img1792xD1" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1792xD1',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																									<td width="55"><a href="index.php?do=buydonator&itemid=<?=$items[1][ID]?>&cat=<?=$items[1][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img1791xD2" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1791xD2',/*url*/'images/btn_buyitem3_on.png')"></a></td>
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
																		<img border="0" src="images/shop/donator/<?=$imgurl = file_exists("images/shop/donator/".$items[2][ImageURL]) ? $items[2][ImageURL] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																									<td width="55"><a href="index.php?do=giftdonator&itemid=<?=$items[2][ID]?>&cat=<?=$items[2][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790xDxDxD" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790xDxDxD',/*url*/'images/btn_giftitem_on.png')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[2][ID]?>&cat=<?=$items[2][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img1792xD" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1792xD',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																									<td width="55"><a href="index.php?do=buydonator&itemid=<?=$items[2][ID]?>&cat=<?=$items[2][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img1791xDxD" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1791xDxD',/*url*/'images/btn_buyitem3_on.png')"></a></td>
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
																		<img border="0" src="images/shop/donator/<?=$imgurl = file_exists("images/shop/donator/".$items[3][ImageURL]) ? $items[3][ImageURL] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																									<td width="55"><a href="index.php?do=giftdonator&itemid=<?=$items[3][ID]?>&cat=<?=$items[3][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790111" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790111',/*url*/'images/btn_giftitem_on.png')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[3][ID]?>&cat=<?=$items[3][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img17921" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img17921',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																									<td width="55"><a href="index.php?do=buydonator&itemid=<?=$items[3][ID]?>&cat=<?=$items[3][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img179111" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img179111',/*url*/'images/btn_buyitem3_on.png')"></a></td>
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
									<td style="background-repeat: repeat; background-position: center top;" width="583">
									<center><img border="0" src="images/mis_shop_mostselled_sets_in.jpg" align="center" width="285" height="25"></center></td>
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
																		<img border="0" src="images/shop/donator/<?=$imgurl = file_exists("images/shop/donator/".$items[4][ImageURL]) ? $items[4][ImageURL] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[4][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111">Special Item</td>
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
																					<div align="center">
																						<div align="center">
																							<table border="0" style="border-collapse: collapse" width="166" height="100%">
																								<tr>
																									<td width="55"><a href="index.php?do=giftdonator&itemid=<?=$items[4][ID]?>&cat=<?=$items[4][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790112" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790112',/*url*/'images/btn_giftitem_on.png')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[4][ID]?>&cat=<?=$items[4][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img17922" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img17922',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																									<td width="55"><a href="index.php?do=buydonator&itemid=<?=$items[4][ID]?>&cat=<?=$items[4][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img179112" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img179112',/*url*/'images/btn_buyitem3_on.png')"></a></td>
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
																		<td width="95">
																		<img border="0" src="images/shop/donator/<?=$imgurl = file_exists("images/shop/donator/".$items[5][ImageURL]) ? $items[5][ImageURL] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[5][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111">Special Item</td>
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
																					<div align="center">
																						<div align="center">
																							<table border="0" style="border-collapse: collapse" width="166" height="100%">
																								<tr>
																									<td width="55"><a href="index.php?do=giftdonator&itemid=<?=$items[5][ID]?>&cat=<?=$items[5][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790113" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790113',/*url*/'images/btn_giftitem_on.png')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[5][ID]?>&cat=<?=$items[5][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img17923" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img17923',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																									<td width="55"><a href="index.php?do=buydonator&itemid=<?=$items[5][ID]?>&cat=<?=$items[5][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img179113" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img179113',/*url*/'images/btn_buyitem3_on.png')"></a></td>
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
																		<td width="95">
																		<img border="0" src="images/shop/donator/<?=$imgurl = file_exists("images/shop/donator/".$items[6][ImageURL]) ? $items[6][ImageURL] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[6][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111">Special Item</td>
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
																					<div align="center">
																						<div align="center">
																							<table border="0" style="border-collapse: collapse" width="166" height="100%">
																								<tr>
																									<td width="55"><a href="index.php?do=giftdonator&itemid=<?=$items[6][ID]?>&cat=<?=$items[6][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790114" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790114',/*url*/'images/btn_giftitem_on.png')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[6][ID]?>&cat=<?=$items[6][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img17924" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img17924',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																									<td width="55"><a href="index.php?do=buydonator&itemid=<?=$items[6][ID]?>&cat=<?=$items[6][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img179114" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img179114',/*url*/'images/btn_buyitem3_on.png')"></a></td>
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
																		<td width="95">
																		<img border="0" src="images/shop/donator/<?=$imgurl = file_exists("images/shop/donator/".$items[7][ImageURL]) ? $items[7][ImageURL] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$items[7][Name]?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111">Special Item</td>
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
																					<div align="center">
																						<div align="center">
																							<table border="0" style="border-collapse: collapse" width="166" height="100%">
																								<tr>
																									<td width="55"><a href="index.php?do=giftdonator&itemid=<?=$items[7][ID]?>&cat=<?=$items[7][CatID]?>"><img border="0" src="images/btn_giftitem_off.jpg" width="50" height="23" id="img1790115" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1790115',/*url*/'images/btn_giftitem_on.png')"></a></td>
																									<td width="56"><a href="index.php?do=infoitem&itemid=<?=$items[7][ID]?>&cat=<?=$items[7][CatID]?>"><img border="0" src="images/btn_moreinfo3_off.jpg" width="56" height="23" id="img17925" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img17925',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																									<td width="55"><a href="index.php?do=buydonator&itemid=<?=$items[7][ID]?>&cat=<?=$items[7][CatID]?>"><img border="0" src="images/btn_buyitem3_off.jpg" width="52" height="23" id="img179115" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img179115',/*url*/'images/btn_buyitem3_on.png')"></a></td>
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
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;
									</td>
								</tr>
								<tr>
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat; background-position: center bottom; background-size: 100%" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>