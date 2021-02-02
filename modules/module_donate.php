<?
SetTitle("SecondaryGunz - Donar");
if( $_SESSION['AID'] == "" )
{
    SetURL("index.php?do=donate");
    SetMessage("Donate", array("Para Donar Necesitas Loguearte"));
    header("Location: index.php?do=login");
    die();
}
?><head>
<script type="text/javascript">

    function updateForm()
    {
        var donation = document.donation.amount.value;
        var coins = donation*3
        document.getElementById("coins").innerHTML = coins;

        document.donation.item_name.value = coins + " Sa Gunz Coins";
        document.donation.item_number.value = coins;
    }

</script>
</head>


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
						</div>
						</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
						<td valign="top" style="background-image: url('images/md_center.png'); background-size: 100% 91%">
							<div style="margin: 20px 20px 20px 20px;">
						<div align="center">
							<table border="0" style="border-collapse: collapse;background: url('images/md_register.png') no-repeat center top; background-size: 100% 100%" width="100%">
								<tr>
									<td height="24" style="">
									<div align="left">
										<b><font face="Tahoma" size="2">&nbsp;&nbsp;Donate to SecondaryGunZ</font></b></td>
							  </tr>
								<tr>
									<td>
									<div align="center">
											<table border="0" style="border-collapse: collapse; float:left" width="408" height="100%">
											<tr>
												<div align="center" style="width: 380px;height: 45px;margin: 20px 20px 10px 20px;padding-top: 18px;background: url('images/mis_eumember.png') no-repeat center top; background-size: 100% 100%; font-size: 9pt;">
																<font color="#FFF">
																Thank you very much for donating to our server</font><br>
																<font color="#13759e">
																Donations are used to cover server expenses.</font></div>
													<td width="8" style="background-repeat: no-repeat; background-position: center top">&nbsp;
													</td>
													<td width="380" style="background-repeat: no-repeat; background-position: center top">
													
											<table border="0" width="100%">
												<tr>
												<td>
													<form name="donation" action="https://www.paypal.com/cgi-bin/webscr" method="post">
													<input type="hidden" name="cmd" value="_xclick">
													<input type="hidden" name="business" value="blaba7@gmail.com"><!-- Here your paypal emaill -->
													<input type="hidden" name="lc" value="US">
													<input type="hidden" name="currency_code" value="USD">
													<input type="hidden" name="no_note" value="1">
													<input type="hidden" name="no_shipping" value="1">
													<input type="hidden" name="tax_rate" value="0.000">
													<input type="hidden" name="bn" value="PP-BuyNowBF:btn_paynow_LG.gif:NonHosted"><!-- Here your button ID-->
													<center>	
													<br />
													<br />	
													<span style="color:#ff9600" >Select your amount</span><br><br>
													<select name="amount" onchange="updateForm();" style="width: 180px; font-size: 8pt; padding: 5px; box-shadow: inset 0px 0px 10px #000">
														<option value="10.00" selected="selected">100 Donator Coins - $10.00</option>
														<option value="20.00">200 Donator Coins - $20.00</option>
														<option value="50.00">500 Donator Coins - $50.00</option>
														<option value="100.00">1000 Donator Coins - $100.00</option>
														<option value="120.00">1200 Donator Coins - $120.00</option>
													</select>
													<br />
													<br />
													International Payments
													</center>
													<input type="hidden" name="item_name" value="50 DCoins">
													<input type="hidden" name="item_number" value="50">
													<input type="hidden" name="custom" value="<?php echo $_SESSION['AID']; ?>">

													<script type="text/javascript">
														updateForm();
													</script>

													<br /><br />
													<center>
														<!--<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_paynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!"> -->
														<img alt="" border="0" src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" width="1" height="1">
													</center>

													</p>
													</div>
													</td>
													<td>
													<input type="image" src="images/paypal.png" style="width: 170px; height: auto" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
													</td>
												</tr>
												<tr>
														<td colspan="2" style="text-align: center;">
														<br>
															<center><p style="border-bottom: 2px solid #3f3f3f; width: 140px; padding-bottom: 5px;">The packages costs</p>
															<p style="text-align:left;padding-left: 90px; color:#3d82aa">PackAge 1 = 1 USD 10 = Donator Coins</p>
															<p style="text-align:left;padding-left: 90px; color:#3d82aa">PackAge 2 = 5 USD 50 = Donator Coins</p>
															<p style="text-align:left;padding-left: 90px; color:#3d82aa">PackAge 3 = 10 USD 100 = Donator Coins</p>
															<p style="text-align:left;padding-left: 90px; color:#3d82aa">PackAge 4 = 15 USD 160 = Donator Coins</p>
															</center><br><br>
														</td>
												</tr>
												<tr>
														<td colspan="2" style="text-align: center;">
														<br>
															<center><p style="border-bottom: 2px solid #3f3f3f; width: 320px; padding-bottom: 5px;">Other Methods</p>
															<img src="images/othermethods.png" alt="Other Methods" width="80%" height="auto" >
															</center><br><br>
														</td>
												</tr>
												</form>
											</table>
                                                </td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="8" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											</table>
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