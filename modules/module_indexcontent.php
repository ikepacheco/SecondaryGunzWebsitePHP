<?
if($_GET['sub'] == "announcement"){
    $res = mssql_query("SELECT * FROM IndexContent WHERE ICID = '".clean($_GET['id'])."'");
    $a = mssql_fetch_assoc($res);
    ?>
    <div align="center">
						<table border="0" width="456" style="border-collapse: collapse">
							<tr>
								<td background="images/cont_up.jpg">&nbsp;</td>
							</tr>
							<tr>
								<td background="images/cont_bg.jpg">
								<div align="center">
									<table border="0" style="border-collapse: collapse" width="454" height="100%">
										<tr>
											<td width="4" rowspan="7">&nbsp;</td>
											<td width="436">
											<img border="0" src="images/inf/gmannouncements.jpg" width="414" height="18"></td>
											<td width="8">&nbsp;</td>
										</tr>
										<tr>
											<td width="434">
											Colocado por <b><?=$a['User']?></b>, el día <?=$a['Date']?></td>
											<td width="8">&nbsp;</td>
										</tr>
										<tr>
											<td width="434">&nbsp;
											</td>
											<td width="8">&nbsp;</td>
										</tr>
										<tr>
											<td width="434">
											<?=$a['Text']?></td>
											<td width="8">&nbsp;</td>
										</tr>
										<tr>
											<td width="434">
											<center>
											&nbsp;</center>
											</td>
											<td width="8">&nbsp;</td>
										</tr>
										</table>
								</div>
								</td>
							</tr>
							<tr>
								<td background="images/cont_top.jpg" height="27">&nbsp;</td>
							</tr>
						</table>
					</div>
    <?
}else{
    $res = mssql_query("SELECT * FROM IndexContent WHERE ICID = '".clean($_GET['id'])."'");
    $a = mssql_fetch_assoc($res);
    ?>
    <div align="center">
						<table border="0" width="456" style="border-collapse: collapse">
							<tr>
								<td background="images/cont_up.jpg">&nbsp;</td>
							</tr>
							<tr>
								<td background="images/cont_bg.jpg">
								<div align="center">
									<table border="0" style="border-collapse: collapse" width="454" height="100%">
										<tr>
											<td width="4" rowspan="7">&nbsp;</td>
											<td width="436">
											<img border="0" src="images/inf/updatenotes.jpg" width="414" height="18"></td>
											<td width="8">&nbsp;</td>
										</tr>
										<tr>
											<td width="434">
											Submitted By <b><?=$a['User']?></b>, <?=$a['Date']?></td>
											<td width="8">&nbsp;</td>
										</tr>
										<tr>
											<td width="434">&nbsp;
											</td>
											<td width="8">&nbsp;</td>
										</tr>
										<tr>
											<td width="434">
											<?=$a['Text']?></td>
											<td width="8">&nbsp;</td>
										</tr>
										<tr>
											<td width="434">
											<center>
											&nbsp;</center>
											</td>
											<td width="8">&nbsp;</td>
										</tr>
										</table>
								</div>
								</td>
							</tr>
							<tr>
								<td background="images/cont_top.jpg" height="27">&nbsp;</td>
							</tr>
						</table>
					</div>
<?}?>