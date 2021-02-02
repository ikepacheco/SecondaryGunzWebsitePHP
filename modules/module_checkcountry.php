<?
SetTitle("SecondaryGunz - Chequiar Pass");

if(IsEuropean())
{
    $img = "images/mis_countryallowed.jpg";
}else{
    $img = "images/mis_countrynotallowed.jpg";
}
?>

<table border="0" style="border-collapse: collapse" width="100%">
					<tr>
						<td width="183" valign="top">
						<div align="center">
							<? include "blocks/block_ranking.php" ?>
						</div>
						</td>
						<td valign="top">
						<div align="center">
							<table border="1" style="border-collapse: collapse" width="100%" bordercolor="#000000">
								<tr>
									<td background="images/content_bar.jpg" height="24" style="background-image: url('images/content_bar.jpg'); background-repeat: no-repeat; background-position: center top">Chequiar Pa&iacute;s</td>
							  </tr>
								<tr>
									<td bgcolor="#2C2A2A">
									<div align="center">
										<form method="POST" action="index.php?do=editaccount" name="resetpwd">
											<table border="0" style="border-collapse: collapse; float:left" width="408" height="100%">
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top">
												<div align="left">As you can see,
													EuroGunZ is only for
													European people, no one
													outside the European Union
													can access it without an
													invitation or admin access.<br>
													<br>
													The image below will show
													you if you can access
													EuroGunZ Server or not, If
													you live in any of European
													union&#39;s countries and you
													cant access to the server,
													please email me clicking
													<a href="mailto:lambdacerro@gmail.com">
													here</a></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top">
												<div align="center">
												<img border="0" src="<?=$img?>" width="367" height="70"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
                                            <tr>
                                            <td height="10"></td>
                                            </tr>
											<tr>
												<td width="402" style="background-repeat: no-repeat; background-position: center top" colspan="3" background="images/mis_eumember.jpg" height="64">
												<div align="center"><b>Detected 
												Country: <?=GetCountryNameByIP($_SERVER[REMOTE_ADDR])?></b></td>
											</tr>
											</table>
											<input type="hidden" name="Checksubmit" value="1"></form>
									</div>
									</td>
								</tr>
							</table>
						</div>
						</td>
						<td width="171" valign="top">
						<div align="center">
							<? include "blocks/block_login.php" ?>
						</div>
						</td>
					</tr>
				</table>