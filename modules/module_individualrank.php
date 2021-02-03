
<?
SetTitle("SecondaryGunz - Individual Ranking");
	$charactername = clean($_POST[charactername]);
	$charname = $charactername;
	if($charactername <> ""){
		$res = mssql_query_logged("select * from Character(nolock) where Name like '$charname' AND DeleteFlag=0 ORDER BY Level DESC, XP DESC, KillCount DESC, DeathCount ASC");
	}else{
		$res = mssql_query_logged("SELECT TOP 100 * FROM Character a, Account b WHERE a.AID=b.AID AND b.UGradeID !=255|254|253|252 AND DeleteFlag=0 ORDER BY Level DESC, XP DESC, KillCount DESC, DeathCount ASC");
	}

?><head>
<meta http-equiv="Content-Language" content="es" />
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
</head>


<table border="0" style="border-collapse: collapse" width="778">
					<tr>
						<td width="164" style="background-image: url('images/md_center.png'); background-repeat: no-repeat; background-position: center top; background-size: 100% 65px" valign="top">
						<div align="center">
							<table border="0" style="border-collapse: collapse" width="164">
								<tr>
									<td width="14" height="1">&nbsp;</td>
									<td width="127" height="1">&nbsp;</td>
									<td width="17" height="1">&nbsp;</td>
								</tr>
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">
									<p style="font-size: 11pt; text-shadow: 0px 0px 5px #fff">Individual Rank</p></td>
									</td>
									<td width="17">&nbsp;</td>
								</tr>
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">
									<a href="index.php?do=clanrank">
									<p style="font-size: 11pt;">Clan Rank</p></td>
									</a></td>
									<td width="17">&nbsp;</td>
								</tr><!--
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127"><a href="index.php?do=halloffame"><img src="images/btn_halloffame_off.jpg" alt="" border="0" id="hall" onmouseover="FP_swapImg(1,1,/*id*/'hall',/*url*/'images/btn_halloffame_on.jpg')" onmouseout="FP_swapImgRestore()" /></a>									</td>
								  <td width="17">&nbsp;</td>
								</tr> -->
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">&nbsp;</td>
									<td width="17">&nbsp;</td>
								</tr>
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">&nbsp;</td>
									<td width="17">&nbsp;</td>
								</tr>
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">&nbsp;</td>
									<td width="17">&nbsp;</td>
								</tr>
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">&nbsp;</td>
									<td width="17">&nbsp;</td>
								</tr>
								<tr>
									<td width="158" colspan="3">&nbsp;</td>
								</tr>
								</table>
						</div>
						</td>
						<td width="4">&nbsp;<p>&nbsp;</p>
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
						<p></p></td>
						<td width="599" valign="top">
						<div align="center">
							<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/content_bg.jpg'); background-repeat:repeat-y;background-size: 100%" width="603">
								<tr>
									<td style="background-image: url('images/content_title_ranking2.jpg'); background-repeat: no-repeat; background-position: center top; background-size: 100%" height="52" width="601" colspan="3">
										<form method="POST" action="index.php?do=individualrank"  name="frmSearch">
											<div align="right" style="margin-right:20px;margin-bottom: 8px">
											<table>
											<tr>
											<td>
											<input name="charactername" id="charactername" style=" border: none; padding: 5px; box-shadow: inset 0px 0px 6px #000; height: 26" align="right" type="text" placeholder="Character"> 
											</td>
											<td>
											<input name="search" id="search" style="background: url('images/search.jpg'); width: 100; height: 26; border: none;" type="submit" value="">
											</td>
											</tr>
											</table>
											<div>
										</form>
									</td>
								</tr>
								<!--<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7" rowspan="6">&nbsp;<p>&nbsp;</p>
									<p></p></td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
                                    <form method="GET" name="indsearch" action="index.php">
                                    <input type="hidden" name="do" value="individualrank" />
                                    <p align="center">
                                    &nbsp;&nbsp;&nbsp;
                                    </p>
					                </form>
                                    </td>
									<td style="background-repeat: repeat; background-position: center top" width="7" rowspan="6">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<div align="center">
									<img border="0" src="images/mis_rankinglegend.jpg" width="563" height="30" /></td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">&nbsp;
									</td>
								</tr>-->
								<tr>
									<td style="background-repeat: no-repeat; background-position: center top" width="583" valign="top">
									<div align="center">
										<table border="0" style="border-collapse: collapse; background-image: url('images/content_ranking_data_bg.jpg'); background-repeat: no-repeat; background-position: center top" width="573">
											<tr>
												<td width="14" height="21">&nbsp;</td>
												<td width="60" height="21" valign="bottom" align="center">
												<div align="center">
													<font face="Tahoma"><b>
													Ranking</b></font></td>
												<td width="132" height="21" valign="bottom" align="center">
												<b><font face="Tahoma">Name</font></b></td>
												<td width="43" height="21" valign="bottom" align="center">
												<b><font face="Tahoma">Level</font></b></td>
												<td width="149" height="21" valign="bottom" align="center">
												<b><font face="Tahoma">
												Exp</font></b></td>
												<td width="148" height="21" valign="bottom" align="center">
												<font face="Tahoma"><b>Kill / </b></font>
												<b><font face="Tahoma">%</font></b></td>
												<td width="13" height="21">&nbsp;</td>
											</tr>
											<tr>
												<td width="14">&nbsp;</td>
												<td width="538" colspan="5" valign="top">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="538">
														<tr>
															<td width="59">&nbsp;</td>
															<td width="132">&nbsp;</td>
															<td width="43">&nbsp;</td>
															<td width="149">&nbsp;</td>
															<td width="145">&nbsp;</td>
														</tr>
                                                        
																  <?
																  															  
															

                                                        if(mssql_num_rows($res) <> 0)
                                                        {
                                                            $count = 1;
                                                            while($char = mssql_fetch_object($res))
                                                            {

                                                        ?>
                                                                    <tr>
                                                                        <td width="59" align="center">
                                                                        <b><?=$count?></b></td>
                                                                        <td width="132" align="center">
                                                                        <?=FormatCharName($char->CID)?></td>
                                                                        <td width="43" align="center">
                                                                        <?=$char->Level?></td>
                                                                        <td width="149" align="center">
                                                                        <?=number_format($char->XP, 0, ",", ".")?></td>
                                                                        <td width="145" align="center">
                                                                        <?=GetKDRatio($char->KillCount, $char->DeathCount)?></td>
                                                                    </tr>
                                                                  <?
                                                                  $count++;
                                                                  }
                                                              }
                                                              else
                                                              {
                                                              ?>
                                                                <tr>
                                                                    <td width="528" colspan="5">
                                                                    <p align="center">
                                                                    No data</p></td>
                                                                </tr>
                                                              <?
                                                              }
                                                              ?>
													</table>
												</div>
												</td>
												<td width="13">&nbsp;</td>
											</tr>
									  </table>
									</div>
                                    <?
                                    if( $search == 0 )
                                    { ?>
                                    <p align="center"><a href="#"></a></p>
                                    <?
                                    }
                                    ?>
                                    </td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<p></p></td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">&nbsp;</td>
								</tr>
								<tr>
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat; background-position: center bottom;background-size: 100%" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>