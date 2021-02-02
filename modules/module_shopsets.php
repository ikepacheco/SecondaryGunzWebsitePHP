<?
SetTitle("SecondaryGunz - Lista de Sets");

if ($_GET[sex] == ""){
$sexq = "";
}else{
$sexq = "WHERE Sex = '".strtolower(clean($_GET[sex]))."'";
}

$sex = strtolower(clean($_GET[sex]));

$res = mssql_query_logged("SELECT * FROM ShopSets(nolock) ".$sexq." ORDER BY SSID DESC");

$count = 1;
$page = 1;
while( $a = mssql_fetch_object( $res ) ){
    $set[$count][$page]['SSID']         =  $a->SSID;
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
    header("Location: index.php?do=shopsets");
    die();
}else if(!is_numeric($cpage))
{
    SetMessage("Error from Shop", array("Incorrect page number"));
    header("Location: index.php?do=shopsets");
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
    $pagelinks.="[<a href='index.php?do=shopsets&page=$i&sex=$sex'>$prefix$i$sufix</a>] ";
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
        									<td width="127"><a href="index.php?do=shopsets"><img border="0" src="images/btn_completeset_on.jpg" id="7816imgxD271" width="132" height="26" /></a></td>
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
									<td style="background-image: url('images/content_title_shop_sets.jpg'); background-repeat: no-repeat; background-position: center top" height="25" width="601" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7">&nbsp;</td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<form method="GET" name="setlist" action="index.php?do=shopsets">
										<p align="right">
										<select size="1" name="sex" onchange="document.location = 'index.php?do=shopsets&sex=' + document.setlist.sex.value;">
										<option value="" <?=($_GET[sex] == "") ? "selected" : ""?>>All
										</option>
										<option value="Male" <?=($_GET[sex] == "male") ? "selected" : ""?>>Man</option>
										<option value="Female" <?=($_GET[sex] == "female") ? "selected" : ""?>>Woman</option>
										</select></p>
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
																		<td width="95">
																		<img border="0" src="images/shop/<?=$set[1][$cpage]['ImageURL']?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[1][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Type:</td>
																					<td width="111">Set Completo</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sex:</td>
																					<td width="111"><?=$set[1][$cpage]['Sex']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">lvl:</td>
																					<td width="111"><?=$set[1][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Price:</td>
																					<td width="111"><?=$set[1][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$set[1][$cpage]['SSID']?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img177222" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img177222',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$set[1][$cpage]['SSID']?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img1773111" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1773111',/*url*/'images/btn_buyset_on.jpg')"></a></td>
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
																		<td width="95">
																		<img border="0" src="images/shop/<?=$set[2][$cpage]['ImageURL']?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[2][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Type:</td>
																					<td width="111">Set Completo</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sex:</td>
																					<td width="111"><?=$set[2][$cpage]['Sex']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">lvl:</td>
																					<td width="111"><?=$set[2][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Price:</td>
																					<td width="111"><?=$set[2][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$set[2][$cpage]['SSID']?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img111772" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img111772',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$set[2][$cpage]['SSID']?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img1a7723" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1a7723',/*url*/'images/btn_buyset_on.jpg')"></a></td>
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
																		<td width="95">
																		<img border="0" src="images/shop/<?=$set[3][$cpage]['ImageURL']?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[3][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Type:</td>
																					<td width="111">Set Completo</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sex:</td>
																					<td width="111"><?=$set[3][$cpage]['Sex']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">lvll:</td>
																					<td width="111"><?=$set[3][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Price:</td>
																					<td width="111"><?=$set[3][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$set[3][$cpage]['SSID']?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img1771231232" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1771231232',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$set[3][$cpage]['SSID']?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img177xDD3" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img177xDD3',/*url*/'images/btn_buyset_on.jpg')"></a></td>
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
																		<td width="95">
																		<img border="0" src="images/shop/<?=$set[4][$cpage]['ImageURL']?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[4][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Type:</td>
																					<td width="111">Set Completo</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sex:</td>
																					<td width="111"><?=$set[4][$cpage]['Sex']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">lvl:</td>
																					<td width="111"><?=$set[4][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Price:</td>
																					<td width="111"><?=$set[4][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$set[4][$cpage]['SSID']?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img17adsasda22xD72" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img17adsasda22xD72',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$set[4][$cpage]['SSID']?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img1asdasddasd22773" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1asdasddasd22773',/*url*/'images/btn_buyset_on.jpg')"></a></td>
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
                                                                    if($set[5][$cpage]['Name'] <> "")
                                                                    {
                                                                    ?>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">
																		<img border="0" src="images/shop/<?=$set[5][$cpage]['ImageURL']?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[5][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Type:</td>
																					<td width="111">Set Completo</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sex:</td>
																					<td width="111"><?=$set[5][$cpage]['Sex']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Level:</td>
																					<td width="111"><?=$set[5][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Price:</td>
																					<td width="111"><?=$set[5][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$set[5][$cpage]['SSID']?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img1xDDa22772" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1xDDa22772',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$set[5][$cpage]['SSID']?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="im2XDDg1773" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'im2XDDg1773',/*url*/'images/btn_buyset_on.jpg')"></a></td>
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
                                                                     <?
                                                                    if($set[6][$cpage]['Name'] <> "")
                                                                    {
                                                                    ?>
																	<tr>
																		<td width="8">&nbsp;</td>
																		<td width="95">
																		<img border="0" src="images/shop/<?=$set[6][$cpage]['ImageURL']?>" width="100" height="150" style="border: 2px solid #171516"></td>
																		<td width="178" valign="top">
																		<div align="center">
																			<table border="0" style="border-collapse: collapse" width="170">
																				<tr>
																					<td width="168" colspan="2">
																					<div align="left"><b><span class="item_name"><?=$set[6][$cpage]['Name']?></span></b></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Type:</td>
																					<td width="111">Set Completo</td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Sex:</td>
																					<td width="111"><?=$set[6][$cpage]['Sex']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Level:</td>
																					<td width="111"><?=$set[6][$cpage]['Level']?></td>
																				</tr>
																				<tr>
																					<td width="55" align="left">Price:</td>
																					<td width="111"><?=$set[6][$cpage]['Price']?></td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="166" colspan="2">
																					<div align="center"><a href="index.php?do=giftset&setid=<?=$set[6][$cpage]['SSID']?>"><img border="0" src="images/btn_giftset_off.jpg" width="79" height="23" id="img1772" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1772',/*url*/'images/btn_giftset_on.jpg')"></a> <a href="index.php?do=buyset&setid=<?=$set[6][$cpage]['SSID']?>"> <img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img1773" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1773',/*url*/'images/btn_buyset_on.jpg')"></a></td>
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