<head>
<meta http-equiv="Content-Language" content="es">
</head>

<?
SetTitle("SecondaryGunz - Hall of Fame");
?>
<table border="0" style="border-collapse: collapse" width="778">
					<tr>
						<td width="164" style="background-image: url('images/md_content_menu.jpg'); background-repeat: no-repeat; background-position: center top" valign="top">
						<div align="center">
							<table border="0" style="border-collapse: collapse" width="164">
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">&nbsp;</td>
									<td width="17">&nbsp;</td>
								</tr>
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">
									<a href="index.php?do=individualrank">
									<img border="0" src="images/btn_individualrank_off.jpg" id = "76176img" width="131" height="21" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'76176img',/*url*/'images/btn_individualrank_on.jpg')"></a></td>
									<td width="17">&nbsp;</td>
								</tr>
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">
									<a href="index.php?do=clanrank">
									<img border="0" src="images/btn_clanranking_off.jpg" id="7816img271" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'7816img271',/*url*/'images/btn_clanranking_on.jpg')"></a></td>
									<td width="17">&nbsp;</td>
								</tr>
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">
									<a href="index.php?do=halloffame">
									<img border="0" src="images/btn_halloffame_on.jpg" width="131" height="21"></a></td>
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
						<p>&nbsp;</td>
						<td width="599" valign="top">
						<div align="center">
                        <?
                            if( isset($_GET['date']) )
                            {
                                $date = clean($_GET['date']);
                                $date = explode("-", $date);
                                $month = $date[0];
                                $year = $date[1];
                                $date = ( isset($month) && isset($year) ) ? $month."-".$year : "";
                        ?>
                            <table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/content_bg.jpg'); background-repeat:repeat-y" width="603">
								<tr>
									<td style="background-image: url('images/content_title_halloffame.jpg'); background-repeat: no-repeat; background-position: center top" height="25" width="601" colspan="3">&nbsp;</td>
								</tr>
								<tr>


									<td style="background-repeat: repeat; background-position: center top" width="583" align="left" valign="top">
                                    <form method="GET" name="honorrank" action="index.php">
                                    <input type="hidden" name="do" value="halloffame" />
                                    <table align="center">
                                    <tr>
                                    <td align="left" width="50%">Viewing ranking from <?=$month?>/<?=$year?></td>
                                    <td align="right" width="50%">
                                    Date: <select name="date" onchange="document.honorrank.submit()">
                                    <option>Select Date</option>
                                    <?
                                    $listq = mssql_query("SELECT Month, Year FROM ClanHonorRanking(nolock) GROUP BY Month, Year ORDER BY Year DESC, Month DESC");
                                    while($halldata = mssql_fetch_assoc($listq))
									{
										echo '<option value="'.$halldata[Month].'-'.$halldata[Year].'">'.$halldata[Month].'/'.$halldata[Year].'</option>';
									}
                                    ?>
                                    </select>
									</td>
									</tr>
									</table>
									</form>
                                    
                                    </td>
									<td style="background-repeat: repeat; background-position: center top" width="7" rowspan="5">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<div align="center">
                                        <table border="0" style="border-collapse: collapse; background-image: url('images/content_ranking_data_bg.jpg'); background-repeat: no-repeat; background-position: center top">
											<tr>
												<td width="14" height="21">&nbsp;</td>
												<td width="60" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>
													Ranking</b></font></td>
												<td width="44" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Emblem</b></font></td>
												<td width="98" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Clan
													Name</b></font></td>
												<td width="93" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>
													Leader</b></font></td>
												<td width="82" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Win/Losses</b></font></td>
												<td width="92" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Win %</b></font></td>
												<td width="69" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>
													Points</b></font></td>
												<td width="13" height="21">&nbsp;</td>
											</tr>
											<tr>
												<td width="14">&nbsp;<p>&nbsp;</p>
												<p>&nbsp;</p>
												<p>&nbsp;</td>
												<td width="538" colspan="7" valign="top">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="102%">
														<tr>
															<td width="59">&nbsp;</td>
															<td width="43">&nbsp;</td>
															<td width="99">&nbsp;</td>
															<td width="93">&nbsp;</td>
															<td width="82">&nbsp;</td>
															<td width="92">&nbsp;</td>
															<td width="69">&nbsp;</td>
														</tr>
                        <?
                                switch( clean($_GET['page']) )
                                {
                                    case "":
                                        $ranks = "Ranking <= 20";
                                    break;
                                    case "2":
                                        $ranks = "Ranking > 20 AND Ranking <= 40";
                                    break;
                                    case "3":
                                        $ranks = "Ranking > 40 AND Ranking <= 60";
                                    break;
                                    case "4":
                                        $ranks = "Ranking > 60 AND Ranking <= 80";
                                    break;
                                    case "5":
                                        $ranks = "Ranking > 80 AND Ranking <= 100";
                                    break;
                                    default:
                                        $ranks = "Ranking <= 20";
                                    break;
                                }
                                $res = mssql_query_logged("SELECT * FROM ClanHonorRanking(nolock) WHERE Month = '$month' AND Year = '$year' AND $ranks ORDER BY Ranking ASC");
                                if(mssql_num_rows($res) <> 0)
                                {
                                    while($clan = mssql_fetch_object($res))
                                    {

                                        $clanemburl = ($clan->EmblemUrl == "") ? "noemblem.jpg" : $clan->EmblemUrl;
                                ?>
                                    <tr>
									    <td width="59" align="center">
										<b><?=$clan->Ranking?></b></td>
										<td width="43" align="center">
										<div align="center">
										<img src="http://emblem.herogamers.net/<?=$clanemburl?>" width="34" height="30" style="border: 1px solid #000000"></td>
										<td width="99" align="center">
										<?=$clan->ClanName?></td>
										<td width="93" align="center">
										<?=GetCharNameByCID($clan->MasterCID)?></td>
										<td width="82" align="center">
										<?=$clan->Wins?>/<?=$clan->Losses?></td>
										<td width="92" align="center">
										<?=GetClanPercent($clan->Wins, $clan->Losses)?></td>
										<td width="69" align="center">
										<?=$clan->Point?></td>
									</tr>
                                <?
                                    }
                                }
                                else
                                {
                                ?>
									<tr>
									<td width="537" align="center" colspan="7">
									No hay datos</td>
									</tr>
                                <?
                                }

                            }
                            else
                            {
                                $querydate = mssql_query("SELECT TOP 1 Month, Year FROM ClanHonorRanking(nolock) GROUP BY Month, Year ORDER BY Year DESC, Month DESC");
                                $ddata = mssql_fetch_row($querydate);
                                $month = $ddata[0];
                                $year = $ddata[1];
                                $date = ( isset($month) && isset($year) ) ? $month."-".$year : "";
                        ?>
							<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/content_bg.jpg'); background-repeat:repeat-y" width="603">
								<tr>
									<td style="background-image: url('images/content_title_halloffame.jpg'); background-repeat: no-repeat; background-position: center top" height="25" width="601" colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" align="left" valign="top">
                                    <form method="GET" name="honorrank" action="index.php">
                                    <input type="hidden" name="do" value="halloffame" />
                                    <table align="center">
                                    <tr>
                                    <td align="left" width="50%">Viewing ranking from <?=$month?>/<?=$year?></td>
                                    <td align="right" width="50%">
                                    Date: <select name="date" onchange="document.honorrank.submit()">
                                    <option>Select Date</option>
                                    <?
                                    $listq = mssql_query("SELECT Month, Year FROM ClanHonorRanking(nolock) GROUP BY Month, Year ORDER BY Year DESC, Month DESC");
                                    while($halldata = mssql_fetch_assoc($listq))
									{
										echo '<option value="'.$halldata[Month].'-'.$halldata[Year].'">'.$halldata[Month].'/'.$halldata[Year].'</option>';
									}
                                    ?>
                                    </select>
									</td>
									</tr>
									</table>
									</form>
                                    
                                    </td>
									<td style="background-repeat: repeat; background-position: center top" width="7" rowspan="5">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<div align="center">
                                        <table border="0" style="border-collapse: collapse; background-image: url('images/content_ranking_data_bg.jpg'); background-repeat: no-repeat; background-position: center top">
											<tr>
												<td width="14" height="21">&nbsp;</td>
												<td width="60" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>
													Ranking</b></font></td>
												<td width="44" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Emblema</b></font></td>
												<td width="98" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Clan
													Name</b></font></td>
												<td width="93" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>
													Leader</b></font></td>
												<td width="82" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Win/Losses</b></font></td>
												<td width="92" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Win %</b></font></td>
												<td width="69" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>
													Points</b></font></td>
												<td width="13" height="21">&nbsp;</td>
											</tr>
											<tr>
												<td width="14">&nbsp;<p>&nbsp;</p>
												<p>&nbsp;</p>
												<p>&nbsp;</td>
												<td width="538" colspan="7" valign="top">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="102%">
														<tr>
															<td width="59">&nbsp;</td>
															<td width="43">&nbsp;</td>
															<td width="99">&nbsp;</td>
															<td width="93">&nbsp;</td>
															<td width="82">&nbsp;</td>
															<td width="92">&nbsp;</td>
															<td width="69">&nbsp;</td>
														</tr>
                                                <?
                                                        switch( clean($_GET['page']) )
                                                        {
                                                            case "":
                                                                $ranks = "Ranking <= 20";
                                                            break;
                                                            case "2":
                                                                $ranks = "Ranking > 20 AND Ranking <= 40";
                                                            break;
                                                            case "3":
                                                                $ranks = "Ranking > 40 AND Ranking <= 60";
                                                            break;
                                                            case "4":
                                                                $ranks = "Ranking > 60 AND Ranking <= 80";
                                                            break;
                                                            case "5":
                                                                $ranks = "Ranking > 80 AND Ranking <= 100";
                                                            break;
                                                            default:
                                                                $ranks = "Ranking <= 20";
                                                            break;
                                                        }
                                                        $res = mssql_query_logged("SELECT TOP 50 * FROM ClanHonorRanking(nolock) WHERE Month = '$month' AND Year = '$year' AND $ranks ORDER BY Ranking ASC");
                                                        if(mssql_num_rows($res) <> 0)
                                                        {
                                                            while($clan = mssql_fetch_object($res))
                                                            {

                                                        $clanemburl = ($clan->EmblemUrl == "") ? "noemblem.jpg" : $clan->EmblemUrl;
                                                        ?>
                                                        <tr>
															<td width="59" align="center">
															<b><?=$clan->Ranking?></b></td>
															<td width="43" align="center">
															<div align="center">
													        <img src="http://emblem.herogamers.net/<?=$clanemburl?>" width="34" height="30" style="border: 1px solid #000000"></td>
															<td width="99" align="center">
															<?=$clan->ClanName?></td>
															<td width="93" align="center">
															<?=GetCharNameByCID($clan->MasterCID)?></td>
															<td width="82" align="center">
															<?=$clan->Wins?>/<?=$clan->Losses?></td>
															<td width="92" align="center">
															<?=GetClanPercent($clan->Wins, $clan->Losses)?></td>
															<td width="69" align="center">
															<?=$clan->Point?></td>
														</tr>
                                                        <?
                                                            }
                                                        }
                                                        else
                                                        {
                                                        ?>
														<tr>
															<td width="537" align="center" colspan="7">
															No data</td>
														</tr>
                                                        <?
                                                        }
                                                }
                                                        ?>
													</table>
												</div>
												</td>
												<td width="13">&nbsp;</td>
											</tr>
											</table>
									</div>
									<p align="center"><a href="index.php?do=halloffame&date=<?=$date?>">[1-20]</a> - <a href="index.php?do=halloffame&date=<?=$date?>&page=2">[21-40]</a> - <a href="index.php?do=halloffame&date=<?=$date?>&page=3">[41-60]</a>
									- <a href="index.php?do=halloffame&date=<?=$date?>&page=4">[61-80]</a> - <a href="index.php?do=halloffame&date=<?=$date?>&page=5">[81 - 100]</a></p></td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">&nbsp;</td>
								</tr>
								<tr>
									<td height="17" style="background-image: url('images/content_top.jpg'); background-repeat: no-repeat; background-position: center bottom" width="601" colspan="3"></td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>