<?
SetTitle("SecondaryGunz - Lista de Items");

$sex = ($_GET[sex] == "") ? "2" : strtolower(clean($_GET[sex]));

$cat = ($_GET[cat] == "") ? "3" : strtolower(clean($_GET[cat]));

$sort = ($_GET[sort] == "") ? "0" : strtolower(clean($_GET[sort]));

$bodypart = ($_GET[bodypart] == "") ? "0" : strtolower(clean($_GET[bodypart]));

if($cat == 3 && $sex == "2")
{
    $sex = 3;
}

if($cat != 3 && $bodypart != 0)
{
$bodypart = 0;
}

if($sex == 3)
{
    $append = "";
}else{
    $append = "Sex = $sex AND";
}

$bodypart = ($bodypart < 0 || $bodypart > 5) ? "0" : $bodypart;

if( $bodypart == 0 )
{
    $bodypq = "";
}
else
{
    $bodypq = "AND BodyPart = $bodypart";
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

if($_GET[cat] == 2 || $_GET[cat] == 1 || $_GET[cat] == 5)
{
    $res = mssql_query_logged("SELECT * FROM ShopDonator(nolock) WHERE Slot = $cat $sortq");
}else{
    $res = mssql_query_logged("SELECT * FROM ShopDonator(nolock) WHERE $append Slot = $cat $bodypq $sortq");
}

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
    header("Location: index.php?do=shopdonator");
    die();
}else if(!is_numeric($cpage))
{
    SetMessage("Error from Shop", array("Incorrect page number"));
    header("Location: index.php?do=shopdonator");
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
    $pagelinks.="[<a href='index.php?do=shopdonator&page=$i&sex=$sex&sort=$sort&bodypart=$bodypart&cat=$cat'>$prefix$i$sufix</a>] ";
}

switch($cat)
{
    case 3:
        $img = "content_title_shop_armor.jpg";
        $type = "Armadura";
    break;
    case 2:
        $img = "content_title_shop_meleewea.jpg";
        $type = "Melee";
    break;
    case 1:
        $img = "content_title_shop_rangedwe.jpg";
        $type = "Rango";
    break;
    case 5:
        $img = "content_title_shop_speciali.jpg";
        $type = "Especial";
    break;
    default:
        $img = "content_title_shop_armor.jpg";
        $type = "Armadura";
    break;
}

?>
<body onLoad="FP_preloadImgs(/*url*/'images/btn_giftitem_on.jpg',/*url*/'images/btn_buyitem3_on.jpg',/*url*/'images/btn_moreinfo3_on.jpg')">

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
                                            <img border="0" src="images/btn_newestitems_off.jpg" id = "76176img" width="132" height="22" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76176img',/*url*/'images/btn_newestitems_on.jpg')"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopdonator"><a href="index.php?do=shopdonator"><img border="0" src="images/btn_donatoritems_on.jpg" id="donatoritems" width="132" height="26"></a></td>
       									  <td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopevent"><img border="0" src="images/btn_eventitems_off.jpg" id="eventitems37" width="132" height="26" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'eventitems37',/*url*/'images/btn_eventitems_on.jpg')"></a></td>
       									  <td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopsets"><img src="images/btn_completeset_off.jpg" alt="" width="132" height="26" border="0" id="7816imgxD271" onMouseOver="FP_swapImg(1,1,/*id*/'7816imgxD271',/*url*/'images/btn_completeset_on.jpg')" onMouseOut="FP_swapImgRestore()"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopdonator&cat=3"><img border="0" src="<?=($_GET[cat] <> 3) ? "images/btn_armor_off.jpg" : "images/btn_armor_on.jpg"?>" id="7816img272" width="132" height="25" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'7816img272',/*url*/'images/btn_armor_on.jpg')"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopdonator&cat=2"><img border="0" src="<?=($_GET[cat] <> 2) ? "images/btn_meleeweapons_off.jpg" : "images/btn_meleeweapons_on.jpg"?>" id="7816img273" width="132" height="25" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'7816img273',/*url*/'images/btn_meleeweapons_on.jpg')"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopdonator&cat=1"><img border="0" src="<?=($_GET[cat] <> 1) ? "images/btn_rangedweapons_off.jpg" : "images/btn_rangedweapons_on.jpg"?>" id="7816img274" width="132" height="27" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'7816img274',/*url*/'images/btn_rangedweapons_on.jpg')"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        								  <td>&nbsp;</td>
        								  <td><a href="index.php?do=shopdonator&cat=5"><img border="0" src="<?=($_GET[cat] <> 5) ? "images/btn_specialitems_off.jpg" : "images/btn_specialitems_on.jpg"?>" id="7816img275" width="132" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'7816img275',/*url*/'images/btn_specialitems_on.jpg')"></a></td>
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
									<td style="background-image: url('images/<?=$img?>'); background-repeat: no-repeat; background-position: center top" height="25" width="601" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<form method="GET" name="setlist" action="index.php?do=shopdonator">
										<p align="right">
                                        <?
                                        if($_GET[cat] == 3)
                                        {
                                        $bodypartjs = "'&bodypart=' + document.setlist.bodypart.value +";
                                        ?>
                                        Parte:&nbsp;
                                        <select name="bodypart" onChange="document.location = 'index.php?do=shopdonator&sex=' + document.setlist.sex.value + '&sort=' + document.setlist.sort.value + '&bodypart=' + document.setlist.bodypart.value + '&cat=<?=$cat?>';">
                                        <option value="0" <?=($_GET[bodypart] == "0") ? "selected" : ""?>>Todos</option>
                                        <option value="1" <?=($_GET[bodypart] == "1") ? "selected" : ""?>>Cabeza</option>
                                        <option value="2" <?=($_GET[bodypart] == "2") ? "selected" : ""?>>Cuerpo</option>
                                        <option value="3" <?=($_GET[bodypart] == "3") ? "selected" : ""?>>Manos</option>
                                        <option value="4" <?=($_GET[bodypart] == "4") ? "selected" : ""?>>Piernas</option>
                                        <option value="5" <?=($_GET[bodypart] == "5") ? "selected" : ""?>>Pies</option>
                                        </select>&nbsp;
                                        <?
                                        }
                                        else
                                        {
                                        $bodypartjs = "";
                                        }
                                        ?>
                                        Sexo:&nbsp;
                                        <select <?=($_GET[cat] == 5 || $_GET[cat] == 1 || $_GET[cat] == 2) ? "disabled " : ""?>size="1" name="sex" onChange="document.location = 'index.php?do=shopdonator&sex=' + document.setlist.sex.value + '&sort=' + document.setlist.sort.value + '&bodypart=' + document.setlist.bodypart.value + '&cat=<?=$cat?>';">
                                        <?
                                        if($_GET[cat] != 3)
                                        {
                                        ?>
                                        <option value="2" <?=($_GET[sex] == "2") ? "selected" : ""?>>Hombre y Mujer</option> <? } ?>
                                        <option value="3" <?=($_GET[sex] == "3") ? "selected" : ""?>>Hombre y Mujer</option>
										<option value="0" <?=($_GET[sex] == "0") ? "selected" : ""?>>Hombre</option>
										<option value="1" <?=($_GET[sex] == "1") ? "selected" : ""?>>Mujer</option>
										</select>
                                        &nbsp;Ordenar:&nbsp;

                                        <select name="sort" onChange="document.location = 'index.php?do=shopdonator&sex=' + document.setlist.sex.value + '&sort=' + document.setlist.sort.value + <?=$bodypartjs?> '&cat=<?=$cat?>';">
                                        <option value="0" <?=($_GET[sort] == "0") ? "selected" : ""?>>Nuevos Primero</option>
                                        <option value="1" <?=($_GET[sort] == "1") ? "selected" : ""?>>Viejos Primero</option>
                                        <option value="2" <?=($_GET[sort] == "2") ? "selected" : ""?>>Nivel: Bajo Primero</option>
                                        <option value="3" <?=($_GET[sort] == "3") ? "selected" : ""?>>Nivel: Alto Primero</option>
                                        <option value="4" <?=($_GET[sort] == "4") ? "selected" : ""?>>Precio: Bajo Primero</option>
                                        <option value="5" <?=($_GET[sort] == "5") ? "selecter" : ""?>>Precio: Alto Primero</option>
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
																		<img border="0" src="images/shop/<?=$set[1][$cpage]['ImageURL']?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																								<td style="width: 55px"><a href="index.php?do=giftdonator&itemid=<?=$set[1][$cpage]['SSID']?>&cat=<?=$cat?>"><img border="0" id="76286ns7b2" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b2',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buydonator&itemid=<?=$set[1][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b4" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b4',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoitem&itemid=<?=$set[1][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b1" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b1',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
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
																		<img border="0" src="images/shop/<?=$set[2][$cpage]['ImageURL']?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																								<td style="width: 55px"><a href="index.php?do=giftdonator&itemid=<?=$set[2][$cpage]['SSID']?>&cat=<?=$cat?>"><img border="0" id="76286ns7b27" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b27',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buydonator&itemid=<?=$set[2][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b47" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b47',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoitem&itemid=<?=$set[2][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b17" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b17',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
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
																		<img border="0" src="images/shop/<?=$set[3][$cpage]['ImageURL']?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																								<td style="width: 55px"><a href="index.php?do=giftdonator&itemid=<?=$set[3][$cpage]['SSID']?>&cat=<?=$cat?>"><img border="0" id="76286ns7b21" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b21',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buydonator&itemid=<?=$set[3][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b41" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b41',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoitem&itemid=<?=$set[3][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b11" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b11',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
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
																		<img border="0" src="images/shop/<?=$set[4][$cpage]['ImageURL']?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																								<td style="width: 55px"><a href="index.php?do=giftdonator&itemid=<?=$set[4][$cpage]['SSID']?>&cat=<?=$cat?>"><img border="0" id="76286ns7b26" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b26',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buydonator&itemid=<?=$set[4][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b46" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b46',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoitem&itemid=<?=$set[4][$cpage]['SSID']?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b16" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b16',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
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
																		<img border="0" src="images/shop/<?=$set[5][$cpage]['ImageURL']?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																								<td style="width: 55px"><a href="index.php?do=giftdonator&itemid=<?=$set[5][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"><img border="0" id="76286ns7b211" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b211',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buydonator&itemid=<?=$set[5][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b411" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b411',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoitem&itemid=<?=$set[5][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b111" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b111',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
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
																		<img border="0" src="images/shop/<?=$set[6][$cpage]['ImageURL']?>" width="100" height="100" style="border: 2px solid #171516"></td>
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
																								<td style="width: 55px"><a href="index.php?do=giftdonator&itemid=<?=$set[6][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"><img border="0" id="76286ns7b233" src="images/btn_giftitem_off.jpg" width="50" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b233',/*url*/'images/btn_giftitem_on.jpg')"></a></td>
																								<td style="width: 55px"> <a href="index.php?do=buydonator&itemid=<?=$set[6][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b433" src="images/btn_buyitem3_off.jpg" width="52" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b433',/*url*/'images/btn_buyitem3_on.jpg')"></a></td>
																								<td style="width: 56px"> <a href="index.php?do=infoitem&itemid=<?=$set[6][$cpage]['SSID']?>&cat=<?=$cat?>&cat=<?=$cat?>"> <img border="0" id="76286ns7b133" src="images/btn_moreinfo3_off.jpg" width="56" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'76286ns7b133',/*url*/'images/btn_moreinfo3_on.jpg')"></a></td>
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
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat; background-position: center bottom" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>