<head>
<meta http-equiv="Content-Language" content="es-cr">
</head>

<?
SetTitle("SecondaryGunz - Clan Ranking");
$clanname = clean($_POST[clanname]);
$clname = $clanname;
?>
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
									<a href="index.php?do=individualrank">
									<p style="font-size: 11pt;">Individual Rank</p></td>
									<td width="17">&nbsp;</td>
								</tr>
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127">
									<p style="font-size: 11pt; text-shadow: 0px 0px 5px #fff">Clan Rank</p></td>
									<td width="17">&nbsp;</td>
								</tr><!--
								<tr>
									<td width="14">&nbsp;</td>
									<td width="127"><a href="index.php?do=halloffame"><img src="images/btn_halloffame_off.jpg" alt="" border="0" id="hall" onmouseover="FP_swapImg(1,1,/*id*/'hall',/*url*/'images/btn_halloffame_on.jpg')" onmouseout="FP_swapImgRestore()" /></a></td>
								  <td width="17">&nbsp;</td>
								</tr>-->
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
						<p></td>
						<td width="599" valign="top">
						<div align="center">
							<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/content_bg.jpg'); background-repeat:repeat-y;background-size: 100%" width="603">
							<tr>
									<td style="background-image: url('images/content_title_ranking2.jpg'); background-repeat: no-repeat; background-position: center top; background-size: 100%" height="52" width="601" colspan="3">
										
									</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="7" rowspan="5">&nbsp;<p>&nbsp;</p>
									<p></td>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">&nbsp;
									</td>
									<td style="background-repeat: repeat; background-position: center top" width="7" rowspan="5">&nbsp;</td>
								</tr>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top">
									<div align="center">
										<table border="0" style="background-position: center top; border-collapse: collapse; background-image: url('images/content_ranking_clan_top4.jpg'); background-repeat:no-repeat" width="563" height="146">
                                        <?
                                            $res = mssql_query_logged("SELECT TOP 4 * FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) AND (Wins != 0 OR Losses != 0) ORDER BY Point DESC, TotalPoint DESC, Wins DESC, Losses ASC");

                                            $Count = 0;

                                            while($resa = mssql_fetch_object($res))
                                            {
                                                $FirstClan[$Count][Name]        = $resa->Name;
                                                $FirstClan[$Count][EmblemURL]   = ($resa->EmblemUrl == "") ? "noemblem.png" : $resa->EmblemUrl;

                                            if($Count == 4)
                                                break;
                                            else
                                                $Count++;
                                            }

                                            $firstclanemb0 = ($FirstClan[0][EmblemURL] == "") ? "noemblem.png" : $FirstClan[0][EmblemURL];
                                            $firstclanemb1 = ($FirstClan[1][EmblemURL] == "") ? "noemblem.png" : $FirstClan[1][EmblemURL];
                                            $firstclanemb2 = ($FirstClan[2][EmblemURL] == "") ? "noemblem.png" : $FirstClan[2][EmblemURL];
                                            $firstclanemb3 = ($FirstClan[3][EmblemURL] == "") ? "noemblem.png" : $FirstClan[3][EmblemURL];

                                            $firstclanname0 = ($FirstClan[0][Name] == "") ? "No hay datos" : $FirstClan[0][Name];
                                            $firstclanname1 = ($FirstClan[1][Name] == "") ? "No hay datos" : $FirstClan[1][Name];
                                            $firstclanname2 = ($FirstClan[2][Name] == "") ? "No hay datos" : $FirstClan[2][Name];
                                            $firstclanname3 = ($FirstClan[3][Name] == "") ? "No hay datos" : $FirstClan[3][Name];

											if(!file_exists("http://localhost/emblem/$firstclanemb0")){
												$firstclanemb0 = "noemblem.png";
											}
											if(!file_exists("http://localhost/emblem/$firstclanemb1")){
												$firstclanemb1 = "noemblem.png";
											}
											if(!file_exists("http://localhost/emblem/$firstclanemb2")){
												$firstclanemb2 = "noemblem.png";
											}
											if(!file_exists("http://localhost/emblem/$firstclanemb3")){
												$firstclanemb3 = "noemblem.png";
											}
                                            $toprank = '
											<tr>
												<td width="144" valign="bottom" height="107">
												<div  align="center">
												<img src="http://localhost/emblem/'.$firstclanemb0.'" width="64" height="64" style="border: 0px solid #000000"></td>
												<td width="135" valign="bottom" height="107">
												<div align="center">
												<img src="http://localhost/emblem/'.$firstclanemb1.'" width="64" height="64" style="border: 0px solid #000000"></td>
												<td width="126" valign="bottom" height="107">
												<div align="center">
												<img src="http://localhost/emblem/'.$firstclanemb2.'" width="64" height="64" style="border: 0px solid #000000"></td>
												<td width="151" valign="bottom" height="107">
												<div align="center">
												<img src="http://localhost/emblem/'.$firstclanemb3.'" width="64" height="64" style="border: 0px solid #000000"></td>
											</tr>
											<tr>
												<td width="556" colspan="4" height="40">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="556" height="100%">
														<tr>
															<td width="5">&nbsp;</td>
															<td width="128">
															<div align="center">
															<font color="#00FF00">
															<b>'.$firstclanname0.'</b></font></td>
															<td width="10">&nbsp;</td>
															<td width="126">
															<div align="center">
															<b>'.$firstclanname1.'</b></td>
															<td width="7">&nbsp;</td>
															<td width="122">
															<div align="center">
															<b>'.$firstclanname2.'</b></td>
															<td width="11">&nbsp;</td>
															<td width="122">
															<div align="center">
															<b>'.$firstclanname3.'</b></td>
															<td width="7">&nbsp;</td>
														</tr>
														<tr>
															<td width="5">&nbsp;</td>
															<td width="128">&nbsp;</td>
															<td width="10">&nbsp;</td>
															<td width="126">&nbsp;</td>
															<td width="7">&nbsp;</td>
															<td width="122">&nbsp;</td>
															<td width="11">&nbsp;</td>
															<td width="122">&nbsp;</td>
															<td width="7">&nbsp;</td>
														</tr>
													</table>
												</div>
												</td>
												</tr>
											</table>
									</div>
									</td>
								</tr>';
                                echo $toprank;
                                ?>
								<tr>
									<td style="background-repeat: repeat; background-position: center top" width="583" valign="top"><br>
                                    <form method="POST" action="index.php?do=clanrank"  name="frmSearch">
											<div align="center" style="margin-right:20px;margin-bottom: 8px">
											<table>
											<tr>
											<td>
											<input name="clanname" id="clanname" style=" border: none; padding: 5px; box-shadow: inset 0px 0px 6px #000; height: 26" align="right" type="text" placeholder="Clan"> 
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
													<b><font face="Tahoma">
													Name</font></b></td>
												<td width="93" height="21" valign="bottom">
												<div align="center">
													<b><font face="Tahoma">Leader</font></b></td>
												<td width="82" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Win/Losses</b></font></td>
												<td width="92" height="21" valign="bottom">
												<div align="center">
													<font face="Tahoma"><b>Win %</b></font></td>
												<td width="69" height="21" valign="bottom">
												<div align="center">
													<b><font face="Tahoma">
													Puntos</font></b></td>
												<td width="13" height="21">&nbsp;</td>
											</tr>
											<tr>
												<td width="14">&nbsp;<p>&nbsp;</p>
												<p>&nbsp;</p>
												<p></td>
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
                                                        if( isset($_GET['type']) && isset($_GET['name']) )
                                                        {
                                                            $search = 1;
                                                            $type = clean($_GET['type']);
                                                            $name = clean($_GET['name']);

                                                            if($type == 1)
                                                            {
                                                                $squery = "SELECT * FROM Clan(nolock) WHERE Name = '$name'";
                                                            }
                                                            elseif($type == 2)
                                                            {
                                                                $charq = mssql_query("SELECT CID FROM Character(nolock) WHERE Name = '$name'");
                                                                if( mssql_num_rows($charq) == 1 )
                                                                {
                                                                $characterdata = mssql_fetch_row($charq);
                                                                $cid = $characterdata[0];
                                                                $squery = "SELECT * FROM Clan(nolock) WHERE MasterCID = '$cid' AND DeleteFlag=0 ORDER BY Point DESC";
                                                                }
                                                                else
                                                                {
                                                                    echo '
                                                                <tr>
                                                                    <td width="528" colspan="5">
                                                                    <p align="center">
                                                                    No hay datos</td>
                                                                </tr>';
                                                                }
                                                            }
                                                            else
                                                            {
                                                                $search = 0;
                                                            }
                                                        }
                                                        else
                                                        {
                                                            $search = 0;
                                                        }

                                                        if( $search == 0 )
                                                        {
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
															
														
															if($clname <> ""){
																$res = mssql_query_logged("SELECT * FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) AND Name like '$clname'");
															}else{
																$res = mssql_query_logged("SELECT TOP 100 * FROM Clan(nolock) WHERE (DeleteFlag=0 OR DeleteFlag=NULL) AND (Wins != 0 OR Losses != 0) AND $ranks ORDER BY Point DESC, TotalPoint DESC, Wins DESC, Losses ASC");
															}
                                                            
														}
                                                        else
                                                        {
                                                            $res = mssql_query_logged($squery);
														}


                                                       if(mssql_num_rows($res) <> 0)
                                                        {
                                                            $count = 1;
															
                                                            while($clan = mssql_fetch_object($res))
                                                            {

														$clanemburl = ($clan->EmblemUrl == "") ? "noemblem.png" : $clan->EmblemUrl;
														
														if(!file_exists("http://localhost/emblem/$clanemburl")){
															$clanemburl = "noemblem.png";
														}
                                                        $clanrank .= '
                                                        <tr>
															<td width="59" align="center">
															<b>'.$count.'</b></td>
															<td width="43" align="center">
															<div align="center">
													        <img src="http://localhost/emblem/'.$clanemburl.'" width="34" height="30" style="border: 0px solid #000000"></td>
															<td width="99" align="center">
															'.$clan->Name.'</td>
															<td width="93" align="center">
															'.GetCharNameByCID($clan->MasterCID).'</td>
															<td width="82" align="center">
															'.$clan->Wins . "/" . $clan->Losses.'</td>
															<td width="92" align="center">
															'.GetClanPercent($clan->Wins, $clan->Losses).'</td>
															<td width="69" align="center">
															'.$clan->Point.'</td>
														</tr>';
														$count++;
                                                            }
                                                        }else{
                                                        $clanrank = '
														<tr>
															<td width="537" align="center" colspan="7">
															No data</td>
														</tr>';
                                                        }
                                                echo $clanrank;
                                                     ?>
													</table>
												</div>
                                            <?
                                            if( $search == 0 )
                                            {
                                            ?>
                                                <p align="center"><a href="index.php?do=clanrank"></a></p>
                                                <?
                                            }
                                            ?>
                                    </td>
												<td width="13">&nbsp;</td>
											</tr>
											</table>
									</div>
									<p></td>
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