<?
    $res = mssql_query("SELECT TOP 4 * FROM ShopItems WHERE Opened = 1 ORDER BY CSSID DESC");

    $count = 1;

    while($a = mssql_fetch_object($res))
    {
        $i[$count][ID]          = $a->CSSID;
        $i[$count][Name]        = $a->Name;
        $i[$count][ImageURL]    = $a->ImageURL;
        $i[$count][Slot]        = GetTypeByID($a->Slot);
        $i[$count][Sex]         = GetSexByID($a->Sex);
        $i[$count][Level]       = $a->Level;
        $i[$count][Price]       = $a->Price;

        $count++;
    }


    $res = mssql_query("SELECT TOP 4 * FROM ShopItems(nolock) ORDER BY CSSID DESC");

    $count = 1;

    while($a = mssql_fetch_object($res))
    {
        $c[$count][ID]          = $a->CSSID;
        $c[$count][ImageURL]    = $a->ImageURL;
        $c[$count][Name]        = $a->Name;
        $c[$count][Slot]        = GetTypeByID($a->Slot);
        $c[$count][Sex]         = GetSexByID($a->Sex);
        $c[$count][Level]       = $a->Level;
        $c[$count][Price]       = $a->Price;

        $count++;
    }
?>
<table border="0" style="border-collapse: collapse; margin: 0px 20px 0px 20px;" width="100%">
					<tr>
					  <td width="183" valign="top">
						<div align="center">
						  <div align="center">
						    <? include "blocks/block_rankingu.php" ?>
                          </div>
						  <p>&nbsp; </p>
						  <div align="center">
                            <p>
                              <? include "blocks/block_rankingc.php" ?>
                            </p>
						    <p>&nbsp; </p>
					      </div>
						  </div>
					  </td>
					  <td width="20" valign="top"> </td>
						<td valign="top" style="background: url('images/md_center.png') no-repeat center top; background-size: 100% 91%; padding: 0px 20px 0px 20px">
						<div align="center" style="margin-top: 20px">
							<table border="0" style="background-position: center top; border-collapse: collapse; background-repeat:no-repeat" width="419">
								<tr height="110">
									<td height="76" style="background-image: url(''); background-repeat: no-repeat; background-position: center top" width="417">
										<table border="0" style="width:100%; height: 100%" cellspacing="0" cellpadding="0">
											<tr style="height: 70%">
												<th style="width: 57%; color: #fff; font-size: 12pt; text-align:center;">
												<?php
													$res = mssql_query("SELECT * FROM ServerStatus WHERE Opened = 1");
													$i;
													while($a = mssql_fetch_object($res))
													{
														$i = $a->CurrPlayer;
													}
													echo $i, ' Players Online now!!';
												?>
												</th>
												<th style="width: 43%">
													<a href="?do=download" target="_blank"><img class="downloadbutton" src="images/downloadbutton_off.jpg" style="width: 100%; height: auto;"></a>
												</th>
											<tr>
											<tr style="height: 30%">
												<td colspan="2" style="text-align: center; font-size: 9pt; color: #fff; font-weight: bold">
													Indian server: <span style="color: #00ff00">Online</span> / Primary update server: <span style="color: #00ff00">ON</span>
												</td>
											<tr>
										</table>
									</td>
								</tr>
								<tr>
									<td height="20" width="417"></td>
								</tr>
								<tr>
									<td style="background-image: url('images/md_information.jpg'); background-repeat: no-repeat; background-position:  left top; background-size: 100%; margin-top: 50px" height="156" width="415" valign="top">
								  <div align="center" style="margin-top: 30px;">
								  <table border="0" style="border-collapse: collapse; background-image: url('images/index_panel.jpg'); background-position: center top" width="417" height="151">
                                    <tr>
                                      <td width="200" height="24">&nbsp;</td>
                                      <td width="7" height="24">&nbsp;</td>
                                      <td width="204" height="24">&nbsp;</td>
                                    </tr>
                                    <tr>
                                      <td width="200" valign="top"><table border="0" style="border-collapse: collapse" width="200" height="92%">
                                          <tr>
                                            <td width="4">&nbsp;</td>
                                            <td width="192" valign="top"><table border="0" style="border-collapse: collapse" width="100%" class="IndexC">
                                                <?
                                                                $res = mssql_query("SELECT TOP 5 * FROM IndexContent WHERE Type = '1' ORDER BY ICID DESC");
                                                                while($n = mssql_fetch_assoc($res)){
                                                                ?>
                                                <tr>
                                                  <td height="20"><span class="menu"><img src="images/mis_arrow.png" alt="a" width="5" height="9" border="0" /><font color="#FFFFFF"> <a href="index.php?do=indexcontent&amp;sub=announcement&amp;id=<?=$n['ICID']?>"><?=$n['Title']?>
                                                  </a></font></span></td>
                                                </tr>
                                                <?}?>
                                            </table></td>
                                          </tr>
                                      </table></td>
                                      <td width="7">&nbsp;</td>
                                      <td width="204" valign="top"><table border="0" style="border-collapse: collapse" width="100%" height="92%">
                                          <tr>
                                            <td valign="top"><table border="0" style="border-collapse: collapse" width="100%" class="IndexC">
                                                <?
                                                                $res = mssql_query("SELECT TOP 5 * FROM IndexContent WHERE Type = '2' ORDER BY ICID DESC");
                                                                while($n = mssql_fetch_assoc($res)){
                                                                ?>
                                                <tr>
                                                  <td height="20"><span class="menu"><img src="images/mis_arrow.png" alt="a" width="5" height="9" border="0" /><a href="index.php?do=indexcontent&amp;sub=update&amp;id=<?=$n['ICID']?>"> <font size="1" face="Verdana">
                                                    <?=$n['Title']?>
                                                  </font></a></span></td>
                                                </tr>
                                                <?}?>
                                            </table></td>
                                          </tr>
                                      </table></td>
                                    </tr>
                                  </table>
								  <p>&nbsp;</p></td>
								<!--<tr>
									<td style="background-image: url('images/md_MPI.jpg'); background-repeat: no-repeat; background-position: center top" height="305" width="417">
									<div align="center">
                                            <table border="0" style="border-collapse: collapse" width="417" height="100%">
											<tr>
												<td width="206" height="23">&nbsp;</td>
												<td width="207" height="23">&nbsp;</td>
											</tr>
											<tr>
												<td width="206" height="129">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="206" height="91%">
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72">&nbsp;</td>
															<td width="123">&nbsp;</td>
														</tr>
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72" valign="top">
															<img border="1" src="images/shop/<?=$i[1][ImageURL]?>" width="64" height="64"></td>
															<td width="123">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="123" height="48%">
																	<tr>
																		<td width="119" colspan="2">
																		<div align="left">
																		<span style="font-size: 7pt">
																		<?=$i[1][Name]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Type:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[1][Slot]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Sex:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[1][Sex]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Level:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[1][Level]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Price:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[1][Price]?></span></td>
																	</tr>
																</table>
															</div>															</td>
														</tr>
														<tr>
															<td width="202" height="30" colspan="3">
															<div align="center">
															<a href="index.php?do=infoitem&itemid=<?=$i[1][ID]?>">
															<img border="0" src="images/btn_moreinfo.jpg" width="83" height="21" id="img1764" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1764'".',/*url*/'."'images/btn_moreinfo_on.jpg'".')"></a>
															<a href="index.php?do=buyitem&itemid=<?=$i[1][ID]?>">
															<img border="0" src="images/btn_buyitem.jpg" width="83" height="21" id="img1765" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1765'".',/*url*/'."'images/btn_buyitem_on.jpg'".')"></a></div></td>
														</tr>
													</table>
												</div>												</td>
												<td width="207" height="129">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="206" height="91%">
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72">&nbsp;</td>
															<td width="123">&nbsp;</td>
														</tr>
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72" valign="top">
															<img border="1" src="images/shop/<?=$i[2][ImageURL]?>" width="64" height="64"></td>
															<td width="123">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="123" height="48%">
																	<tr>
																		<td width="119" colspan="2">
																		<div align="left">
																		<span style="font-size: 7pt">
																		<?=$i[2][Name]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Type:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[2][Slot]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Sex:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[2][Sex]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Level:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[2][Level]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Price:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[2][Price]?></span></td>
																	</tr>
																</table>
															</div>															</td>
														</tr>
														<tr>
															<td width="202" height="30" colspan="3">
															<div align="center">
															<a href="index.php?do=infoitem&itemid=<?=$i[2][ID]?>">
															<img border="0" src="images/btn_moreinfo.jpg" width="83" height="21" id="img1766" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1766'".',/*url*/'."'images/btn_moreinfo_on.jpg'".')"></a>
															<a href="index.php?do=buyitem&itemid=<?=$i[2][ID]?>">
															<img border="0" src="images/btn_buyitem.jpg" width="83" height="21" id="img1767" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1767'".',/*url*/'."'images/btn_buyitem_on.jpg'".')"></a></div></td>
														</tr>
													</table>
												</div>												</td>
											</tr>
											<tr>
												<td width="206" height="129">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="206" height="91%">
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72">&nbsp;</td>
															<td width="123">&nbsp;</td>
														</tr>
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72" valign="top">
															<img border="1" src="images/shop/<?=$i[3][ImageURL]?>" width="64" height="64"></td>
															<td width="123">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="123" height="48%">
																	<tr>
																		<td width="119" colspan="2">
																		<div align="left">
																		<span style="font-size: 7pt">
																		<?=$i[3][Name]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Type:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[3][Slot]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Sex:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[3][Sex]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Level:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[3][Level]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Price:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[3][Price]?></span></td>
																	</tr>
																</table>
															</div>															</td>
														</tr>
														<tr>
															<td width="202" height="30" colspan="3">
															<div align="center">
															<a href="index.php?do=infoitem&itemid=<?=$i[3][ID]?>">
															<img border="0" src="images/btn_moreinfo.jpg" width="83" height="21" id="img1768" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1768'".',/*url*/'."'images/btn_moreinfo_on.jpg'".')"></a>
															<a href="index.php?do=buyitem&itemid=<?=$i[3][ID]?>">
															<img border="0" src="images/btn_buyitem.jpg" width="83" height="21" id="img1769" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1769'".',/*url*/'."'images/btn_buyitem_on.jpg'".')"></a></div></td>
														</tr>
													</table>
												</div>												</td>
												<td width="207" height="129">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="206" height="91%">
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72">&nbsp;</td>
															<td width="123">&nbsp;</td>
														</tr>
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72" valign="top">
															<img border="1" src="images/shop/<?=$i[4][ImageURL]?>" width="64" height="64"></td>
															<td width="123">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="123" height="48%">
																	<tr>
																		<td width="119" colspan="2">
																		<div align="left">
																		<span style="font-size: 7pt">
																		<?=$i[4][Name]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Type:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[4][Slot]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Sex:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[4][Sex]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Level:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[4][Level]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Price:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$i[4][Price]?></span></td>
																	</tr>
																</table>
															</div>															</td>
														</tr>
														<tr>
															<td width="202" height="30" colspan="3">
															<div align="center">
															<a href="index.php?do=infoitem&itemid=<?=$i[4][ID]?>">
															<img border="0" src="images/btn_moreinfo.jpg" width="83" height="21" id="img1770" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1770'".',/*url*/'."'images/btn_moreinfo_on.jpg'".')"></a>
															<a href="index.php?do=buyitem&itemid=<?=$i[4][ID]?>">
															<img border="0" src="images/btn_buyitem.jpg" width="83" height="21" id="img1771" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1771'".',/*url*/'."'images/btn_buyitem_on.jpg'".')"></a></div></td>
														</tr>
													</table>
												</div>												</td>
											</tr>
											<tr>
												<td width="206" height="16">												</td>
												<td width="207" height="16">												</td>
											</tr>
										</table>
									</div>									</td>
								</tr>
								<tr>
									<td width="417">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-image: url('images/md_LI.jpg'); background-repeat: no-repeat; background-position: center top" height="305" width="417">
									<div align="center">
										<table border="0" style="border-collapse: collapse" width="417" height="100%">
											<tr>
												<td width="206" height="23">&nbsp;</td>
												<td width="207" height="23">&nbsp;</td>
											</tr>
											<tr>
												<td width="206" height="129">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="206" height="91%">
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72">&nbsp;</td>
															<td width="123">&nbsp;</td>
														</tr>
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72" valign="top">
															<img border="1" src="images/shop/<?=$c[1][ImageURL]?>" width="64" height="64"></td>
															<td width="123">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="123" height="48%">
																	<tr>
																		<td width="119" colspan="2">
																		<div align="left">
																		<span style="font-size: 7pt">
																		<?=$c[1][Name]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Type:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[1][Slot]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Sex:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[1][Sex]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Level:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[1][Level]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Price:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[1][Price]?></span></td>
																	</tr>
																</table>
															</div>															</td>
														</tr>
														<tr>
															<td width="202" height="30" colspan="3">
															<div align="center">
															<a href="index.php?do=infoitem&itemid=<?=$c[1][ID]?>">
															<img border="0" src="images/btn_moreinfo.jpg" width="83" height="21" id="img1772" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1772'".',/*url*/'."'images/btn_moreinfo_on.jpg'".')"></a>
															<a href="index.php?do=buyitem&itemid=<?=$c[1][ID]?>">
															<img border="0" src="images/btn_buyitem.jpg" width="83" height="21" id="img1773" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1773'".',/*url*/'."'images/btn_buyitem_on.jpg'".')"></a></div></td>
														</tr>
													</table>
												</div>												</td>
												<td width="207" height="129">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="206" height="91%">
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72">&nbsp;</td>
															<td width="123">&nbsp;</td>
														</tr>
                                                        <tr>
															<td width="5">&nbsp;</td>
															<td width="72" valign="top">
															<img border="1" src="images/shop/<?=$c[2][ImageURL]?>" width="64" height="64"></td>
															<td width="123">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="123" height="48%">
																	<tr>
																		<td width="119" colspan="2">
																		<div align="left">
																		<span style="font-size: 7pt">
																		<?=$c[2][Name]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Type:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[2][Slot]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Sex:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[2][Sex]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Level:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[2][Level]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Price:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[2][Price]?></span></td>
																	</tr>
																</table>
															</div>															</td>
														</tr>
														<tr>
															<td width="202" height="30" colspan="3">
															<div align="center">
															<a href="index.php?do=infoitem&itemid=<?=$c[2][ID]?>">
															<img border="0" src="images/btn_moreinfo.jpg" width="83" height="21" id="img1774" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1774'".',/*url*/'."'images/btn_moreinfo_on.jpg'".')"></a>
															<a href="index.php?do=buyitem&itemid=<?=$c[2][ID]?>">
															<img border="0" src="images/btn_buyitem.jpg" width="83" height="21" id="img1775" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1775'".',/*url*/'."'images/btn_buyitem_on.jpg'".')"></a></div></td>
														</tr>
													</table>
												</div>												</td>
											</tr>
											<tr>
												<td width="206" height="129">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="206" height="91%">
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72">&nbsp;</td>
															<td width="123">&nbsp;</td>
														</tr>
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72" valign="top">
															<img border="1" src="images/shop/<?=$c[3][ImageURL]?>" width="64" height="64"></td>
															<td width="123">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="123" height="48%">
																	<tr>
																		<td width="119" colspan="2">
																		<div align="left">
																		<span style="font-size: 7pt">
																		<?=$c[3][Name]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Type:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[3][Slot]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Sex:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[3][Sex]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Level:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[3][Level]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Price:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[3][Price]?></span></td>
																	</tr>
																</table>
															</div>															</td>
														</tr>
														<tr>
															<td width="202" height="30" colspan="3">
															<div align="center">
															<a href="index.php?do=infoitem&itemid=<?=$c[3][ID]?>">
															<img border="0" src="images/btn_moreinfo.jpg" width="83" height="21" id="img1776" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1776'".',/*url*/'."'images/btn_moreinfo_on.jpg'".')"></a>
															<a href="index.php?do=buyitem&itemid=<?=$c[3][ID]?>">
															<img border="0" src="images/btn_buyitem.jpg" width="83" height="21" id="img1777" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1777'".',/*url*/'."'images/btn_buyitem_on.jpg'".')"></a></div></td>
														</tr>
													</table>
												</div>												</td>
												<td width="207" height="129">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="206" height="91%">
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72">&nbsp;</td>
															<td width="123">&nbsp;</td>
														</tr>
														<tr>
															<td width="5">&nbsp;</td>
															<td width="72" valign="top">
															<img border="1" src="images/shop/<?=$c[4][ImageURL]?>" width="64" height="64"></td>
															<td width="123">
															<div align="center">
																<table border="0" style="border-collapse: collapse" width="123" height="48%">
																	<tr>
																		<td width="119" colspan="2">
																		<div align="left">
																		<span style="font-size: 7pt">
																		<?=$c[4][Name]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Type:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[4][Slot]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Sex:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[4][Sex]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Level:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[4][Level]?></span></td>
																	</tr>
																	<tr>
																		<td width="51" align="left">
																		<span style="font-size: 7pt" align="center">
																		Price:</span></td>
																		<td width="68" align="left">
																		<span style="font-size: 7pt" align="center">
																		<?=$c[4][Price]?></span></td>
																	</tr>
																</table>
															</div>															</td>
														</tr>
														<tr>
															<td width="202" height="30" colspan="3">
															<div align="center">
															<a href="index.php?do=infoitem&itemid=<?=$c[4][ID]?>">
															<img border="0" src="images/btn_moreinfo.jpg" width="83" height="21" id="img1778" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1778'".',/*url*/'."'images/btn_moreinfo_on.jpg'".')"></a>
															<a href="index.php?do=buyitem&itemid=<?=$c[4][ID]?>">
															<img border="0" src="images/btn_buyitem.jpg" width="83" height="21" id="img1779" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'."'img1779'".',/*url*/'."'images/btn_buyitem_on.jpg'".')"></a></div></td>
														</tr>
													</table>
												</div>												</td>
											</tr>
											<tr>
												<td width="206" height="16">												</td>
												<td width="207" height="16">												</td>
											</tr>
										</table>
									</div>									</td>
								</tr>-->
							</table>
<style>
.container { width: 100%; margin: 0; padding-top: 0; }
.container .ism-slider { margin-left: 0; margin-right: 0; }
</style>

<link rel="stylesheet" href="slide/ism/css/my-slider.css"/>
<script src="slide/ism/js/ism-2.2.min.js"></script>


<div class='container'>

<div class="ism-slider" data-transition_type="fade" data-play_type="loop" data-image_fx="zoompan" id="secondary-slider">
  <ol>
    <li>
      <img src="slide/ism/image/slides/1.jpg">
      <div class="ism-caption ism-caption-2" data-delay='0'>Welcome, invite your friends.</div>
    </li>
    <li>
      <img src="slide/ism/image/slides/2.jpg">
      <div class="ism-caption ism-caption-2" data-delay='0'>Welcome, invite your friends.</div>
    </li>
    <li>
      <img src="slide/ism/image/slides/3.jpg">
      <div class="ism-caption ism-caption-2" data-delay='0'>Welcome, invite your friends.</div>
    </li>
    <li>
      <img src="slide/ism/image/slides/4.jpg">
      <div class="ism-caption ism-caption-2" data-delay='0'>Welcome, invite your friends.</div>
    </li>
  </ol>
</div>


						</div>
						</td>
					  <td width="20" valign="top"> </td>
						<td width="171" valign="top">
						<div align="center"><? include "blocks/block_login.php";
                        ?></div></td>
					</tr>
				</table>