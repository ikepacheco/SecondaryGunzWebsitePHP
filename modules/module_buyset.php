<?

SetTitle("SecondaryGunz - Comprar Set");

if($_SESSION[AID] == "")
{
    SetURL("index.php?do=buyset&setid={$_GET[setid]}");
    SetMessage("Message from Shop", array("Login first, Please"));
    header("Location: index.php?do=login");
    die();
}

if(!isset($_POST[SetID]))
{
    if($_GET[setid] == "" || !is_numeric($_GET[setid]))
    {
        SetMessage("Message from Shop", array("Incorrect item information"));
        header("Location: index.php?do=shopsets");
        die();
    }
}

if(isset($_POST[SetID]))
{
    $setid  = clean($_POST[SetID]);
    $pdays   = clean($_POST[rentdays]);
    $accid  = clean($_SESSION[AID]);

        switch($pdays){
        case 2;
        $days = 2;
        break;
        case 10;
        $days = 10;
        break;
        case 15;
        $days = 15;
        break;
        case 20;
        $days = 20;
        break;
        case 30;
        $days = 30;
        break;
        case 50;
        $days = 50;
        break;
        case 80;
        $days = 80;
        break;
        case 100;
        $days = 100;
        break;
        default:
        SetMessage("Message from Shop", array("The purchase days number was edited"));
        header("Location: index.php?do=shopitem");
        die();
    }

    $ires = mssql_query_logged("SELECT * FROM ShopSets(nolock) WHERE SSID = $setid");

    if(mssql_num_rows($ires) == 0)
    {
        SetMessage("Error from Shop", array("Item not found"));
        header("Location index.php?do=shopsets");
        die();
    }

    $ires = mssql_fetch_object($ires);

    $ares = mssql_fetch_object(mssql_query_logged("SELECT * FROM Account  WHERE AID  = $accid"));

    $dayprice       = $ires->Price / 10;
    $totalprice     = $dayprice * $days;
    $accountbalance = $ares->Coins;
    $afterbalance   = $accountbalance - $totalprice;
    $renthourperiod = $days * 24;

    echo    "Day Price: $dayprice </br>".
            "Total Price: $totalprice </br>".
            "Account Balance: $accountbalance </br>".
            "After Balance: $afterbalance </br>";

    if($afterbalance < 0)
    {
        SetMessage("Error from Shop", array("You have not enough EU Coins to buy this item for $days days, select a lower number of days"));
        header("Location: index.php?do=buyset&setid=$setid");
        die();

    }else{
        mssql_query_logged("UPDATE Account SET Coins = Coins - $totalprice WHERE AID = {$_SESSION[AID]}");
        mssql_query_logged("UPDATE ShopSets SET Selled = Selled + 1 WHERE SSID = $setid");

        //Head
        if( $ires->HeadItemID != 0 )
        {
            mssql_query_logged("INSERT INTO AccountItem(AID, ItemID, RentDate, RentHourPeriod, Cnt)VALUES" .
                        "($accid, {$ires->HeadItemID}, GETDATE(), $renthourperiod, 1)");
        }
        //Chest
        if( $ires->ChestItemID != 0 )
        {
            mssql_query_logged("INSERT INTO AccountItem(AID, ItemID, RentDate, RentHourPeriod, Cnt)VALUES" .
                        "($accid, {$ires->ChestItemID}, GETDATE(), $renthourperiod, 1)");
        }
        //Hand
        if( $ires->HandItemID != 0 )
        {
            mssql_query_logged("INSERT INTO AccountItem(AID, ItemID, RentDate, RentHourPeriod, Cnt)VALUES" .
                        "($accid, {$ires->HandItemID}, GETDATE(), $renthourperiod, 1)");
        }
        //Leg
        if ( $ires->LegItemID != 0 )
        {
            mssql_query_logged("INSERT INTO AccountItem(AID, ItemID, RentDate, RentHourPeriod, Cnt)VALUES" .
                        "($accid, {$ires->LegItemID}, GETDATE(), $renthourperiod, 1)");
        }
        //Feet
        if ( $ires->FeetItemID != 0 )
        {
            mssql_query_logged("INSERT INTO AccountItem(AID, ItemID, RentDate, RentHourPeriod, Cnt)VALUES" .
                        "($accid, {$ires->FeetItemID}, GETDATE(), $renthourperiod, 1)");
        }

        SetMessage("Message from Shop", array("Item purchased successfully, look at your storage in gunz for using it"));
        header("Location: index.php?do=shopsets");
        die();

    }
}else{
    $setid  = clean($_GET[setid]);

    $ires = mssql_query_logged("SELECT * FROM ShopSets(nolock) WHERE SSID = $setid");


    if(mssql_num_rows($ires) == 0)
    {
        SetMessage("Error from Shop", array("Set not found"));
        header("Location index.php?do=shopsets");
        die();
    }

    $acd = mssql_fetch_object(mssql_query_logged("SELECT * FROM Account(nolock) WHERE AID = {$_SESSION[AID]}"));

    $data = mssql_fetch_object($ires);
}




?>

<body onLoad="FP_preloadImgs(/*url*/'../images/btn_cancel_on.jpg')">

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
        									<td width="127"><a href="index.php?do=shopdonator"><img src="images/btn_donatoritems_off.jpg" alt="" name="donatoritems" width="132" height="26" border="0" id="donatoritems" onMouseOver="FP_swapImg(1,1,/*id*/'donatoritems',/*url*/'images/btn_donatoritems_on.jpg')" onMouseOut="FP_swapImgRestore()" /></a></td>
       									  <td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopevent"><img border="0" src="images/btn_eventitems_off.jpg" id="eventitems37" width="132" height="26" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'eventitems37',/*url*/'images/btn_eventitems_on.jpg')"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopsets"><img border="0" src="images/btn_completeset_on.jpg" id="7816imgxD271" width="132" height="26"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopitem&cat=3"><img border="0" src="<?=($_GET[cat] <> 3) ? "images/btn_armor_off.jpg" : "images/btn_armor_on.jpg"?>" id="7816img272" width="132" height="25" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'7816img272',/*url*/'images/btn_armor_on.jpg')"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopitem&cat=2"><img border="0" src="<?=($_GET[cat] <> 2) ? "images/btn_meleeweapons_off.jpg" : "images/btn_meleeweapons_on.jpg"?>" id="7816img273" width="132" height="25" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'7816img273',/*url*/'images/btn_meleeweapons_on.jpg')"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        									<td width="14">&nbsp;</td>
        									<td width="127"><a href="index.php?do=shopitem&cat=1"><img border="0" src="<?=($_GET[cat] <> 1) ? "images/btn_rangedweapons_off.jpg" : "images/btn_rangedweapons_on.jpg"?>" id="7816img274" width="132" height="27" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'7816img274',/*url*/'images/btn_rangedweapons_on.jpg')"></a></td>
        									<td width="17">&nbsp;</td>
        								</tr>
        								<tr>
        								  <td>&nbsp;</td>
        								  <td><a href="index.php?do=shopitem&cat=5"><img border="0" src="<?=($_GET[cat] <> 5) ? "images/btn_specialitems_off.jpg" : "images/btn_specialitems_on.jpg"?>" id="7816img275" width="132" height="23" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'7816img275',/*url*/'images/btn_specialitems_on.jpg')"></a></td>
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
									<td style="background-image: url('images/content_title_shop_buyset.jpg'); background-repeat: no-repeat; background-position: center top" height="25" width="601" colspan="3">&nbsp;</td>
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
													<form method="POST" action="index.php?do=buyset" name="frmBuy"><table border="0" style="border-collapse: collapse" width="579" height="100%">
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104">&nbsp;</td>
															<td width="458" colspan="2">&nbsp;</td>
														</tr>
														<tr>
															<td width="11">&nbsp;</td>
															<td width="104" valign="top">
															<div align="center">
															<img border="0" src="images/shop/<?=$data->ImageURL?>" width="100" height="150" style="border: 2px solid #1D1B1C"></td>
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
																		Complete Set</td>
																	</tr>
																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="61" align="left">
																		Sex:</td>
																		<td width="372" align="left">
																		<?=$data->Sex?></td>
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
																		<span id="currentprice"><?=$data->Price?></span> (10 Days)</td>
																	</tr>
 																	<tr>
																		<td width="19">&nbsp;</td>
																		<td width="435" colspan="2" rowspan="5" style="background-image: url('images/mis_eumember.jpg'); background-repeat: no-repeat; background-position: center" valign="middle">
																		<div align="center">
																																							Duration (Days):
																					<select size="1" name="rentdays" onChange="UpdatePrice()">
																						<option value="2">2</option>
																						<option value="10" selected>10</option>
																						<option value="15">15</option>
																						<option value="20">20</option>
																						<option value="30">30</option>
																						<option value="50">50</option>
																						<option value="80">80</option>
																						<option value="100">100</option></select> (<span id="dayprice">10</span> EU Coins per day)<input type="hidden" name="SetID" value="<?=$_GET[setid]?>"></div>
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
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">Total:</td>
																					<td width="62" align="left"><span id="Total">0</span></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">Actual Balance:</td>
																					<td width="62" align="left"><span id="currbalance"><?=$acd->Coins?></span></td>
																					<td width="16">&nbsp;</td>
																				</tr>
																				<tr>
																					<td width="216">&nbsp;</td>
																					<td width="117" align="left">After:</td>
																					<td width="62" align="left"><span id="afterpur">0</span></td>
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
									<img border="0" src="images/btn_buyset_off.jpg" width="79" height="23" id="img1764" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'img1764',/*url*/'images/btn_buyset_on.jpg')"></a>
									<a href="index.php?do=shopsets">
									<img border="0" src="images/btn_cancel_off.jpg" width="79" height="23" id="dale1872" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'dale1872',/*url*/'images/btn_cancel_on.jpg')"></a></td>
								</tr>
								<tr>
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat; background-position: center bottom" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>
   <script language="javascript">
        UpdatePrice();
   </script>