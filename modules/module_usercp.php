<?php
SetTitle("SecondaryGunz - UserCP");
?>
<table border="0" style="border-collapse: collapse" width="100%">
					<tr>
					  <td width="183" valign="top">
						<div align="center">
							<? include "blocks/block_rankingu.php" ?>
						</div>
						<p>
						<div align="center">
                          <p>
                            <? include "blocks/block_rankingc.php" ?>
                          <p>
						</div>						<p>&nbsp;</p></td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
						<td valign="top" style="background-image: url('images/md_center.png'); background-size: 100% 29%">
							<div style="margin: 20px 20px 20px 20px;">
						<div align="center">
							<table border="0" style="border-collapse: collapse;background: url('images/md_register.png') no-repeat center top; background-size: 100%; border-bottom: 1px solid rgba(124,255,255, 0.3)" width="100%" bordercolor="#000000">
								<tr>
									<td height="24">
									<div align="left">
										<b><font face="Tahoma" size="2">&nbsp;&nbsp;Panel de Usuario</font></b></td>
							  </tr>
								<tr>
									<td>
									<div align="center"><form method="POST" action="index.php?do=changebt" name="changebt">
									  <table width="358" border="0">
                                        <tr>
                                          <td>&nbsp;Edit Account</td>
                                          <td><div align="center"><a href="index.php?do=editaccount">Click Aqui</a></div></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;Change Coins from bounty</td>
                                          <td><div align="center"><a href="index.php?do=changebt">Click Aqui</a></div></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;Donate to SecondaryGunZ</td>
                                          <td><div align="center"><a href="index.php?do=donate">Click Aqui</a></div></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;Signature Player</td>
                                          <td><div align="center"><a href="index.php?do=signature">Click Aqui</a></div></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;Download</td>
                                          <td><div align="center"><a href="index.php?do=download">Click Aqui</a></div></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;Individual Ranking</td>
                                          <td><div align="center"><a href="index.php?do=individualrank">Click Aqui</a></div></td>
                                        </tr>
                                        <tr>
                                          <td>&nbsp;Clan Ranking</td>
                                          <td><div align="center"><a href="index.php?do=clanrank">Click Aqui</a></div></td>
                                        </tr><!--
                                        <tr>
                                          <td>&nbsp;Hall of Fame</td>
                                          <td><div align="center"><a href="index.php?do=halloffame">Click Aqui</a></div></td>
                                        </tr>-->
                                      </table>
									</form>
									</div>
									</td>
								</tr>
							</table>
						</div>
            </div>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
						<p align="center">&nbsp;</td>
						<td width="171" valign="top">
						<div align="center">
							<? include "blocks/block_login.php" ?>
						</div>
						</td>
					</tr>
				</table>