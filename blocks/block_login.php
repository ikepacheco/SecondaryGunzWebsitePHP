<?
include "secure/anti_inject.php";
include "secure/sql_check.php";
if($_SESSION[AID] == "")
{
?>
                        <style type="text/css">
<!--
.style1 {
	font-size: 7pt
}
.textLogin{
	width: 100%;
}
-->
                        </style>
                        <body onLoad="FP_preloadImgs(/*url*/'images/btn_login_on.jpg', /*url*/'images/btn_editclan_on.jpg')">

                        <form name="login" method="POST" action="index.php?do=login">
							<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/md_login.png'); background-repeat:no-repeat; background-size: 100%;" width="175">
								<tr>
									<td width="5" height="175">&nbsp;</td>
									<td width="156" valign="top" height="175">
									<div align="center">
										<table border="0" style="border-collapse: collapse" width="156">
											<tr>
												<td width="154" colspan="2">&nbsp;</td>
											</tr>
											<tr>
												<td width="154" colspan="2">&nbsp;</td>
											</tr>
											<tr>
												<td width="154" colspan="2">&nbsp;</td>
											</tr>
											<tr>
												<td width="83">
													<input name="userid" size="12" class="textLogin" style="float: left" tabindex="1" style="width: 100%">
												</td>
											</tr>
											<tr>
												<td width="83">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="83">
												<input name="pass" size="12" class="textLogin" style="float: left" type="password" tabindex="2"></td>
											</tr>
											<tr>
												<td width="152" colspan="2">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="69">
													<div align="center">
														<input border="0" src="images/btn_login_off.png" id="img812" name="img812" width="140" height="47" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'img812',/*url*/'images/btn_login_on.png')" type="image">
													</div>
												</td>
											</tr>
											<tr>
												<td width="152" colspan="2" height="50" valign="middle">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="100%">
													  <tr><td>&nbsp;</td></tr>
														<tr>
															<td width="2"></td>
															<td width="10">
															<img border="0" src="images/mis_arrow.png" width="7" height="10" id="img1783"></td>
															<td width="134" align="left">
															<span style="font-size: 7pt">
															<a href="index.php?do=register">Register Now!</a></span></td>
													  </tr>
													  <tr><td></td></tr>
														<tr>
															<td width="2"></td>
															<td width="10">
															<img border="0" src="images/mis_arrow.png" width="7" height="10"></td>
															<td width="134" align="left">
															<span style="font-size: 7pt">
															<a href="#">
															Terms of use</span></a></td>
													  </tr>
													  <tr><td></td></tr>
														<tr>
															<td width="2"></td>
															<td width="10">
															<img border="0" src="images/mis_arrow.png" width="7" height="10"></td>
															<td width="134" align="left">
															<span style="font-size: 7pt">
															<a href="index.php?do=resetpwd">
															Forgot your password?</span></a></td>
													  </tr>
													</table>
												</div>
												</td>
											</tr>
										</table>
									</div>
									<p>&nbsp;</td>
									<td width="8" height="175">&nbsp;</td>
								</tr>
								<tr>
									<td width="169" colspan="3" >&nbsp;</td>
								</tr>
								<tr>
									<td width="169" colspan="3" >&nbsp;</td>
								</tr>
								
								<tr>
									<td width="169" colspan="3" style="background: url('../images/follow.png') no-repeat center top; background-size: 100% 100%; width: 100%";>
										<div align="center" style="margin-top: 0px;height: 238px;">
										<table width="100%" style="margin-top:55px" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td colspan="2">
													<center><a href="http://facebook.com"><img src="../images/facebook.png" style="width: 71%;"></a></center>
												</td>
											</tr>
											<tr>
												<td>
													<center><a href="http://twitch.tv"><img src="../images/twitch.png" style="width: 51%;margin-top: 10px;margin-right: -20px"></a></center>
												</td>
												<td>
													<center><a href="http://youtube.com"><img src="../images/youtube.png" style="width: 70%;margin-top: 10px;margin-left: -20px"></a></center>
												</td>
											</tr>
										</table>
										</div>
									</td>
								</tr>
								<tr>
									<td width="169" colspan="3" ><div align="center" style="margin-top: 20px;"><a href="index.php?do=signature"><img src="../images/signature.png" width="172" height="147" /></a></div></td>
								</tr>
								<!-- <tr>
									<td width="169" colspan="3" ><div align="center"><a href="index.php?do=teamspeak"><img src="../images/teamsk.png" width="151" height="156"></a></div></td>
								</tr>
																<tr>
									<td width="169" colspan="3"><p align="center"><a href="index.php?do=ventrillo"><img src="../images/ventrilo.png" width="156" height="148"></a></p>
									  </td>
							  </tr> -->
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
								<tr>
									<td width="169" colspan="3" >&nbsp;</td>
							  </tr>
								</table>
							<input type="hidden" name="submit" value="1">
							</form>
<?
}else{

    //$query1 = mssql_query_logged("SELECT * FROM AccountItem(nolock) WHERE AID = '{$_SESSION[AID]}'");
    $query2 = mssql_query_logged("SELECT Coins, EventCoins FROM Account(nolock) WHERE AID = '{$_SESSION[AID]}'");
    //$_MEMBER[NumItems]      = mssql_num_rows($query1);
    $_MEMBER[AccountData]   = mssql_fetch_assoc($query2);
?>


<script language="javascript">
function UpdateClan()
{
	var Emblem = document.getElementById("imageclan");
	var ClanList = document.getElementById("clanlist");
	var MasterTxt = document.getElementById("clanmaster");
	var ClanLink = document.getElementById("editlink");

	var ClanData = ClanList.value;
	var CData = ClanData.split("-|-");

	MasterTxt.innerHTML = CData[1];
	Emblem.src = "http://localhost/emblem/" + CData[3];
	ClanLink.href = "javascript:ShowPanel(" + CData[2] + ");";
}
</script>


<script type="text/javascript">

    YAHOO.namespace("example.container");


    function HidePanel()
    {
        YAHOO.example.container.ChangeEmblem.hide();
        document.getElementById("content").innerHTML = "";
    }

    function ShowPanel(clanid) {

        if (!YAHOO.example.container.wait) {

            // Initialize the temporary Panel to display while waiting for external content to load

            YAHOO.example.container.wait =
                    new YAHOO.widget.Panel("wait",
                                                    { width: "240px",
                                                      fixedcenter: true,
                                                      close: false,
                                                      draggable: false,
                                                      zindex:4,
                                                      modal: true,
                                                      visible: false
                                                    }
                                                );

            YAHOO.example.container.wait.setHeader("Loading, please wait...");
            YAHOO.example.container.wait.setBody("<img src=\"http://us.i1.yimg.com/us.yimg.com/i/us/per/gr/gp/rel_interstitial_loading.gif\"/>");
            YAHOO.example.container.wait.render(document.body);

        }


        if (!YAHOO.example.container.ChangeEmblem) {

            // Initialize the temporary Panel to display while waiting for external content to load

            YAHOO.example.container.ChangeEmblem =
                    new YAHOO.widget.Panel("wait",
                                                    { width: "430px",
                                                      fixedcenter: true,
                                                      close: false,
                                                      draggable: false,
                                                      zindex:4,
                                                      modal: true,
                                                      visible: false
                                                    }
                                                );

            YAHOO.example.container.ChangeEmblem.setHeader("Change Emblem");
            YAHOO.example.container.ChangeEmblem.setBody("<div id=\"content\"></div>");
            YAHOO.example.container.ChangeEmblem.render(document.body);

        }

       // Define the callback object for Connection Manager that will set the body of our content area when the content has loaded


        var content = document.getElementById("content");

        content.innerHTML = "";

        var callback = {
            success : function(o) {
                content.innerHTML = o.responseText;
                content.style.visibility = "visible";
                YAHOO.example.container.wait.hide();
                YAHOO.example.container.ChangeEmblem.show();
            },
            failure : function(o) {
                content.innerHTML = o.responseText;
                content.style.visibility = "visible";
                YAHOO.example.container.wait.hide();
                YAHOO.example.container.ChangeEmblem.show();
            }
        }

        content.innerHTML = "<center><b><font face=\"Tahoma\" size=\"2\" color=\"#FFFFFF\">Loading content</font></b></center></br><center><img src=\"http://us.i1.yimg.com/us.yimg.com/i/us/per/gr/gp/rel_interstitial_loading.gif\"/></center>";

        YAHOO.example.container.ChangeEmblem.show();

        // Connect to our data source and load the data
        var conn = YAHOO.util.Connect.asyncRequest("GET", "emblemupload.php?clid=" + clanid, callback);
    }

</script>
<table border="0" style="background-position: center top; border-collapse: collapse; background-image:url('images/md_logued.jpg'); background-repeat:no-repeat; background-size: 100%" width="175" background="images/md_login.jpg">
								<tr>
									<td width="175" height="230">
									<div align="center">
										<table border="0" style="border-collapse: collapse" width="175" height="289%">
<tr>
												<td width="6">&nbsp;</td>
												<td width="155" rowspan="2">
												<div align="left"><b>
													<font face="Tahoma" style="color:#fff;">Welcome, <?=$_SESSION[UserID]?> </font></b></td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="155">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="155">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="153" rowspan="4">
												<div align="center">
                                                <?
                                                    if(CheckIfExistClan($_SESSION[AID]))
                                                    {
                                                ?>
                                                <table border="0" style="border-collapse: collapse" width="100%" height="100%">
														<tr>
															<td rowspan="4">
															<img id="imageclan" src="http://localhost/emblem" width="55" height="55" style="border: 1px solid #000000"></td>
															<td width="124">
															<div align="left">
															<select onChange="UpdateClan()" id="clanlist" size="1" name="selclan" style="color: #FFFFFF; font-family: Verdana; font-size: 7pt; border: 1px solid #000000; background-color: #101010">
															<?
                                                            $qr = mssql_query("SELECT CID FROM Character(nolock) WHERE AID = '{$_SESSION[AID]}' AND DeleteFlag = 0");
                                                            if( mssql_num_rows($qr) > 0 )
                                                            {
                                                            while($char = mssql_fetch_assoc($qr))
                                                            {
                                                                     $queryc = mssql_query("SELECT * FROM ClanMember(nolock) WHERE CID = '{$char[CID]}'");
                                                                     if( mssql_num_rows($queryc) > 0 )
                                                                     {
                                                                        $a = mssql_fetch_assoc($queryc);
                                                                        $b = mssql_fetch_assoc(mssql_query("SELECT * FROM Clan(nolock) WHERE CLID = '{$a[CLID]}' AND DeleteFlag = 0"));

                                                                         $_CLAN[Name]       = $b[Name];
                                                                         $_CLAN[Master]     = GetClanMasterByCLID($a[CLID]);
                                                                         $_CLAN[CLID]       = $a[CLID];
                                                                         $_CLAN[Emblem]     = ($b[EmblemUrl] == "") ? "noemblem.png" : $b[EmblemUrl];

                                                                         $info = implode("-|-", $_CLAN);

                                                                         if($_CLAN[Name] <> "")
                                                                            echo "<option value = '$info'>{$_CLAN[Name]}</option>";
                                                                     }
                                                                }
                                                            }
                                                            ?>
															</select></td>
														</tr>
														<tr>
															<td height="2" width="124"></td>
														</tr>
														<tr>
															<td width="124">
															<a id="editlink" href="">
															<img border="0" src="images/btn_editclan_off.jpg" width="95" height="17" id="img1780" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'img1780',/*url*/'images/btn_editclan_on.jpg')"></a></td>
														</tr>
														<tr>
															<td width="124">
															<div align="left">
															<span style="font-size: 7pt">
															M: </span><span id="clanmaster"></span></td>
														</tr>
													</table>
                                                    <?
                                                    }else{
                                                    ?>
                                                    <table border="0" style="border-collapse: collapse" width="100%" height="100%">
														<tr>
															<td><p align="center" class="style1">No eres miembro de ningun clan.</p>
															<p align="center" style="font-size: 7pt"> &iexcl;Hazte miembro de un clan o crea el tuyo! </p></td>
														</tr>
													</table>
                                                    <?
                                                    }
                                                    ?>
												</div>												</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="155">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="155">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="155" rowspan="3">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="155" height="100%">
														<tr>
															<td width="3"></td>
															<td width="73">
															<div align="left">
														    Coins:</td>
														  <td width="73">
															<div align="left"><b>
															<?=$_MEMBER[AccountData][Coins]?></b></td>
														</tr>
														<tr>
                                                          <td></td>
														  <td><div align="left">
														    Event Coins:</td>
														  <td><div align="left">
														      <b>
                                                              <?=$_MEMBER[AccountData][EventCoins]?>
													        </b></td>
													  </tr>
														<tr>
															<td width="3"></td>
															<td width="73">
															<div align="left">
															DCoins:</td>
															<td width="73"><b>
                                                              <?=$_MEMBER[AccountData][Coins]?>
													        </b></td>
													  </tr>
                                                        <?
                                                        /*
                                                        echo '
                                                        <tr>
															<td width="3"></td>
															<td width="73">
															<div align="left">
															Items:</td>
															<td width="73">
															<div align="left"><b>
															'.$_MEMBER[NumItems].'</b></td>
														</tr>'; */
                                                        ?>
														<tr>
															<td width="3"></td>
														</tr>
														<tr>
														  <td></td>
													  </tr>
													</table>
												</div>												</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6">&nbsp;</td>
												<td width="155"><div align="center"><a href="index.php?do=changebt">Comprar SG Coins</a></div></td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
												<td width="6" height="38">&nbsp;</td>
											  <td width="155"><div align="center"><a href="index.php?do=usercp"><img border="0" src="images/btn_editacc_off.jpg" width="72" height="16" id="img1781" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'img1781',/*url*/'images/btn_editacc_on1.jpg')"></a> <a href="index.php?do=logout"> <img border="0" src="images/btn_changebt_off.jpg" width="72" height="16" id="img1782" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'img1782',/*url*/'images/btn_changebt_on1.jpg')"></a></div></td>
												<td width="8">&nbsp;</td>
											</tr>
											<tr>
											  <td height="21">&nbsp;</td>
											  <td><p>&nbsp;</p>
										      <p>&nbsp;</p></td>
											  <td>&nbsp;</td>
										  </tr>
										</table>
									</div>
									</td>
								
								<tr>
									<td width="169" colspan="3" style="background: url('../images/follow.png') no-repeat center top; background-size: 100% 100%; width: 100%";>
										<div align="center" style="margin-top: 0px;height: 238px;">
										<table width="100%" style="margin-top:55px" border="0" cellspacing="0" cellpadding="0">
											<tr>
												<td colspan="2">
													<center><a href="http://facebook.com"><img src="../images/facebook.png" style="width: 71%;"></a></center>
												</td>
											</tr>
											<tr>
												<td>
													<center><a href="http://twitch.tv"><img src="../images/twitch.png" style="width: 51%;margin-top: 10px;margin-right: -20px"></a></center>
												</td>
												<td>
													<center><a href="http://youtube.com"><img src="../images/youtube.png" style="width: 70%;margin-top: 10px;margin-left: -20px"></a></center>
												</td>
											</tr>
										</table>
										</div>
									</td>
								</tr>
								<tr>
									<td width="169">&nbsp;</td>
								</tr>
								<tr>
									<td width="169" colspan="3" ><div align="center" style="margin-top: 0px;"><a href="index.php?do=signature"><img src="../images/signature.png" width="172" height="147" /></a></div></td>
								</tr>
								</table>
								<script language="javascript">
									UpdateClan();
								</script>
<?
}
?>