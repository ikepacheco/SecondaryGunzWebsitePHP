<?
SetTitle("SecondaryGunz - Items Lista");

$sex = ($_GET[sex] == "") ? "2" : strtolower(clean($_GET[sex]));
$sex = ($sex < 0 || $sex > 2) ? "0" : $sex;

$sort = ($_GET[sort] == "") ? "0" : strtolower(clean($_GET[sort]));

$bodypart = ($_GET[bodypart] == "") ? "0" : strtolower(clean($_GET[bodypart]));
$bodypart = ($bodypart < 0 || $bodypart > 6) ? "0" : $bodypart;

if($sex == 2 && $bodypart == 0)
{
    $conditions = "";
}
elseif($sex == 2 && $bodypart != 0)
{
    $conditions = "WHERE BodyPart = $bodypart";
}
elseif($sex != 2 && $bodypart == 0)
{
    $conditions = "WHERE Sex = $sex";
}
elseif($sex != 2 && $bodypart != 0)
{
    $conditions = "WHERE Sex = $sex AND BodyPart = $bodypart";
}

switch ($sort)
{
    case 0:
    $sortq = "ORDER BY CSSID DESC";
    break;
    case 1:
    $sortq = "ORDER BY CSSID ASC";
    break;
    case 2:
    $sortq = "ORDER BY Level ASC";
    break;
    case 3:
    $sortq = "ORDER BY Level DESC";
    break;
    case 4:
    $sortq = "ORDER BY Price ASC";
    break;
    case 5:
    $sortq = "ORDER BY Price DESC";
    break;
    default:
    $sortq = "ORDER BY CSSID DESC";
    break;
}

$res = mssql_query_logged("SELECT * FROM ShopEvents(nolock) $conditions $sortq");


$count = 1;
$page = 1;
while( $a = mssql_fetch_object( $res ) ){
    $set[$count][$page]['SSID']         =  $a->CSSID;
    $set[$count][$page]['Name']         =  $a->Name;
    $set[$count][$page]['Level']        =  $a->Level;
    $set[$count][$page]['Price']        =  $a->Price;
    $set[$count][$page]['Sex']          =  $a->Sex;
    $set[$count][$page]['ImageURL']     =  $a->ImageURL;

    if ( $count == 6 ){
        $count = 1;
        $page++;
    }else{
        $count++;
    }
}

$cpage = ($_GET[page] == "") ? 1 : $_GET[page];

if($cpage > $page)
{
    SetMessage("Error from Shop", array("Incorrect page number"));
    header("Location: index.php?do=shopevent");
    die();
}else if(!is_numeric($cpage))
{
    SetMessage("Error from Shop", array("Incorrect page number"));
    header("Location: index.php?do=shopevent");
    die();
}

for ($i = 1; $i <= $page; $i++) {
    if($cpage == $i){
        $prefix = "<font color='#00FF00'><b>";
        $sufix = '</b></font>';
    }else{
        $prefix = "";
        $sufix = '';
    }
    $pagelinks.="[<a href='index.php?do=shopevent&page=$i&sex=$sex&sort=$sort&bodypart=$bodypart'>$prefix$i$sufix</a>] ";
}

$img = "content_title_shop_home.jpg";
$type = "Donator";

?>
<body onLoad="FP_preloadImgs(/*url*/'images/btn_giftitem_on.jpg',/*url*/'images/btn_buyitem3_on.jpg',/*url*/'images/btn_moreinfo3_on.jpg')">

<table border="0" style="border-collapse: collapse" width="778">
					<tr>
                       
						<td width="599" valign="top">
						<div align="center">
							<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/content_bg.jpg'); background-repeat:repeat-y; background-size: 100%;" width="603">
								<tr>
									<td style="background-image: url('images/<?=$img?>'); background-repeat: no-repeat; background-position: center top; background-size: 100%" height="55" width="601" colspan="3">&nbsp;</td>
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
									<form method="GET" name="setlist" action="index.php?do=shopevent">
									<p align="right">
                                        Parte:&nbsp;
                                        <select name="bodypart" onChange="document.location = 'index.php?do=shopevent&sex=' + document.setlist.sex.value + '&sort=' + document.setlist.sort.value + '&bodypart=' + document.setlist.bodypart.value;">
                                        <option value="0" <?=($_GET[bodypart] == "0") ? "selected" : ""?>>Todos</option>
                                        <option value="6" <?=($_GET[bodypart] == "6") ? "selected" : ""?>>No Armaduras</option>
                                        <option value="1" <?=($_GET[bodypart] == "1") ? "selected" : ""?>>Armadura: Cabeza</option>
                                        <option value="2" <?=($_GET[bodypart] == "2") ? "selected" : ""?>>Armadura: Cuerpo</option>
                                        <option value="3" <?=($_GET[bodypart] == "3") ? "selected" : ""?>>Armadura: Manos</option>
                                        <option value="4" <?=($_GET[bodypart] == "4") ? "selected" : ""?>>Armadura: Piernas</option>
                                        <option value="5" <?=($_GET[bodypart] == "5") ? "selected" : ""?>>Armadura: Pies</option>
                                        </select>&nbsp;
                                        Sexo:&nbsp;
                                        <select <?=($_GET[bodypart] == 0 || $_GET[bodypart] == 6) ? "disabled " : ""?>size="1" name="sex" onChange="document.location = 'index.php?do=shopevent&sex=' + document.setlist.sex.value + '&sort=' + document.setlist.sort.value + '&bodypart=' + document.setlist.bodypart.value;">
                                        <?
                                        if($_GET[bodypart] == 0 || $_GET[bodypart] == 6)
                                        {
                                        ?>
                                        <option value="2" <?=($_GET[sex] == "2") ? "selected" : ""?>>Hombre y Mujer</option> <? } ?>
                                        <option value="2" <?=($_GET[sex] == "2") ? "selected" : ""?>>Hombre y Mujer</option>
										<option value="0" <?=($_GET[sex] == "0") ? "selected" : ""?>>Hombre</option>
										<option value="1" <?=($_GET[sex] == "1") ? "selected" : ""?>>Mujer</option>
										</select>
                                        &nbsp;Ordenar:&nbsp;

                                        <select name="sort" onChange="document.location = 'index.php?do=shopevent&sex=' + document.setlist.sex.value + '&sort=' + document.setlist.sort.value + '&bodypart=' + document.setlist.bodypart.value;">
                                        <option value="0" <?=($_GET[sort] == "0") ? "selected" : ""?>>Nuevos Primero</option>
                                        <option value="1" <?=($_GET[sort] == "1") ? "selected" : ""?>>Viejos Primero</option>
                                        <option value="2" <?=($_GET[sort] == "2") ? "selected" : ""?>>Nivel: Bajo Primero</option>
                                        <option value="3" <?=($_GET[sort] == "3") ? "selected" : ""?>>Nivel: Alto Primero</option>
                                        <option value="4" <?=($_GET[sort] == "4") ? "selected" : ""?>>Precio: Bajo Primero</option>
                                        <option value="5" <?=($_GET[sort] == "5") ? "selected" : ""?>>Precio: Alto Primero</option>
                                        </select>
                                        </p>
									</form>
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
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
                                                                    <?
                                                                    if($set[1][$cpage]['Name'] <> "")
                                                                    {
                                                                    ?>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95" valign="top">
																		<img border="0" src="images/shop/event/<?=$imgurl = file_exists("images/shop/event/".$set[1][$cpage]['ImageURL']) ? $set[1][$cpage]['ImageURL'] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[1][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$type?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=GetSexByID($set[1][$cpage]['Sex']);?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$set[1][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$set[1][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<table style="width: 166px; height: 100%" cellpadding="0">
																							<tr>
																								<td style="width: 55px"><a href="index.php?do=giftevent&itemid=<?=$set[1][$cpage]['SSID']?>&cat=<?=$cat?>"><img border="0" id="76286ns7b2" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b2',/*url*/'images/btn_giftitem_on.png')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoevent&itemid=<?=$set[1][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b1" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b1',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buyevent&itemid=<?=$set[1][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b4" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b4',/*url*/'images/btn_buyitem3_on.png')"></a></td>
																							</tr>
																						</table>
																						&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
                                                                    <?
                                                                    }
                                                                    ?>
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
                                                                    <?
                                                                    if($set[2][$cpage]['Name'] <> "")
                                                                    {
                                                                    ?>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95" valign="top">
																		<img border="0" src="images/shop/event/<?=$imgurl = file_exists("images/shop/event/".$set[2][$cpage]['ImageURL']) ? $set[2][$cpage]['ImageURL'] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[2][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$type?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=GetSexByID($set[2][$cpage]['Sex']);?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$set[2][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$set[2][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<table style="width: 166px; height: 100%" cellpadding="0">
																							<tr>
																								<td style="width: 55px"><a href="index.php?do=giftevent&itemid=<?=$set[2][$cpage]['SSID']?>&cat=<?=$cat?>"><img border="0" id="76286ns7b27" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b27',/*url*/'images/btn_giftitem_on.png')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoevent&itemid=<?=$set[2][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b17" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b17',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buyevent&itemid=<?=$set[2][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b47" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b47',/*url*/'images/btn_buyitem3_on.png')"></a></td>
																							</tr>
																						</table>
																						&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
                                                                    <?
                                                                    }
                                                                    ?>																	<tr>
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
                                                                    <?
                                                                    if($set[3][$cpage]['Name'] <> "")
                                                                    {
                                                                    ?>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95" valign="top">
																		<img border="0" src="images/shop/event/<?=$imgurl = (file_exists("images/shop/event/".$set[3][$cpage]['ImageURL'])) ? $set[3][$cpage]['ImageURL'] : "noimage.jpg"?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[3][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$type?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=GetSexByID($set[3][$cpage]['Sex']);?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$set[3][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$set[3][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<table style="width: 166px; height: 100%" cellpadding="0">
																							<tr>
																								<td style="width: 55px"><a href="index.php?do=giftevent&itemid=<?=$set[3][$cpage]['SSID']?>&cat=<?=$cat?>"><img border="0" id="76286ns7b21" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b21',/*url*/'images/btn_giftitem_on.png')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoevent&itemid=<?=$set[3][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b11" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b11',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buyevent&itemid=<?=$set[3][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b41" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b41',/*url*/'images/btn_buyitem3_on.png')"></a></td>
																							</tr>
																						</table>
																						&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
                                                                    <?
                                                                    }
                                                                    ?>																	<tr>
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
                                                                     <?
                                                                    if($set[4][$cpage]['Name'] <> "")
                                                                    {
                                                                    ?>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95" valign="top">
																		<img border="0" src="images/shop/event/<?=$imgurl = (file_exists("images/shop/event/".$set[4][$cpage]['ImageURL'])) ? $set[4][$cpage]['ImageURL'] : "noimage.jpg"?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[4][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$type?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=GetSexByID($set[4][$cpage]['Sex']);?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$set[4][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$set[4][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<table style="width: 166px; height: 100%" cellpadding="0">
																							<tr>
																								<td style="width: 55px"><a href="index.php?do=giftevent&itemid=<?=$set[4][$cpage]['SSID']?>&cat=<?=$cat?>"><img border="0" id="76286ns7b26" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b26',/*url*/'images/btn_giftitem_on.png')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoevent&itemid=<?=$set[4][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b16" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b16',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buyevent&itemid=<?=$set[4][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b46" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b46',/*url*/'images/btn_buyitem3_on.png')"></a></td>
																							</tr>
																						</table>
																						&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
                                                                    <?
                                                                    }
                                                                    ?>																	<tr>
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
																		<td width="95">&nbsp;
																		</td>
																		<td width="178">&nbsp;
																		</td>
																	</tr>
                                                                     <?
                                                                    if($set[5][$cpage]['Name'] <> "")
                                                                    {
                                                                    ?>
																	<tr>
																		<td width="8">&nbsp;
																		</td>
																		<td width="95" valign="top" style="height: 100%">
																		<img border="0" src="images/shop/event/<?=$imgurl = (file_exists("images/shop/event/".$set[5][$cpage]['ImageURL'])) ? $set[5][$cpage]['ImageURL'] : "noimage.jpg"?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[5][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$type?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=GetSexByID($set[5][$cpage]['Sex']);?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$set[5][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$set[5][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<table style="width: 166px; height: 100%" cellpadding="0">
																							<tr>
																								<td style="width: 55px"><a href="index.php?do=giftevent&itemid=<?=$set[5][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"><img border="0" id="76286ns7b211" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b211',/*url*/'images/btn_giftitem_on.png')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoevent&itemid=<?=$set[5][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b111" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b111',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buyevent&itemid=<?=$set[5][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b411" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b411',/*url*/'images/btn_buyitem3_on.png')"></a></td>
																							</tr>
																						</table>
																						&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
                                                                    <?
                                                                    }
                                                                    ?>																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">&nbsp;
																		</td>
																		<td width="178">&nbsp;
																		</td>
																	</tr>
																</table>
															</div>
															</td>
															<td width="290" valign="top">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="287" height="100%">
                                                                     <?
                                                                    if($set[6][$cpage]['Name'] <> "")
                                                                    {
                                                                    ?>
																	<tr>
																		<td width="8">&nbsp;
																		</td>
																		<td width="95" valign="top">&nbsp;
																		</td>
																		<td width="178" valign="top">&nbsp;
																		</td>
																	</tr>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95" valign="top">
																		<img border="0" src="images/shop/event/<?=$imgurl = (file_exists("images/shop/event/".$set[6][$cpage]['ImageURL'])) ? $set[6][$cpage]['ImageURL'] : "noimage.jpg" ?>" width="100" height="100" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[6][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Tipo:</td>
																					<td width="111"><?=$type?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sexo:</td>
																					<td width="111"><?=GetSexByID($set[6][$cpage]['Sex']);?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Nivel:</td>
																					<td width="111"><?=$set[6][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Precio:</td>
																					<td width="111"><?=$set[6][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																					<td width="166" colspan="2">
																					<div align="center">
																						<table style="width: 166px; height: 100%" cellpadding="0">
																							<tr>
																								<td style="width: 55px"><a href="index.php?do=giftevent&itemid=<?=$set[6][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"><img border="0" id="76286ns7b233" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b233',/*url*/'images/btn_giftitem_on.png')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoevent&itemid=<?=$set[6][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b133" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b133',/*url*/'images/btn_moreinfo3_on.png')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buyevent&itemid=<?=$set[6][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b433" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b433',/*url*/'images/btn_buyitem3_on.png')"></a></td>
																							</tr>
																						</table>
																						&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="55">&nbsp;</td>
																					<td width="111">&nbsp;</td>
																				</tr>
																			</table>
																		</div>
																		</td>
																	</tr>
                                                                    <?
                                                                    }
                                                                    ?>																	<tr>
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
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">&nbsp;
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<div align="center"><?=$pagelinks?></td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<p>&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
								</tr>
								<tr>
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat; background-position: center bottom; background-size: 100%" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>