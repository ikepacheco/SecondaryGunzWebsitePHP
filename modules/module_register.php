<?
include "secure/anti_inject.php";
include "secure/sql_check.php";
if($_SESSION[UserID] <> "")
{
    SetMessage("Mensaje de SecondaryGunz", array("�Deslogueate Primero Para Crear Otras Cuentas!"));
    header("Location: index.php");
    die();
}

if(isset($_POST[submit]))
{
    $user           = clean($_POST[userid]);
	$names          = clean($_POST[namea]);
	$countrys		= clean($_POST[country]);
    $pass[0]        = clean($_POST[pass1]);
    $pass[1]        = clean($_POST[pass2]);
    $email          = clean($_POST[email]);
    $sq             = clean($_POST[sq]);
    $sa             = clean($_POST[sa]);

    if($pass[0] != $pass[1]){
        SetMessage("Register", array("The passwords do not match"));
        header("Location: index.php?do=register");
        die();
    }
    elseif ( mssql_num_rows( mssql_query_logged("SELECT * FROM Account(nolock) WHERE UserID = '$user'") ) <> 0 ){
        SetMessage("Register", array("The UserID $userid is already in use"));
        header("Location: index.php?do=register");
        die();
    }
    elseif ( mssql_num_rows( mssql_query_logged("SELECT * FROM Account(nolock) WHERE Email = '$email'") ) <> 0 ){
        SetMessage("Register", array("The Email $email is already in use"));
        header("Location: index.php?do=register");
        die();
    }
    elseif ($user == ""){
        SetMessage("Register", array("Please enter an UserID"));
        header("Location: index.php?do=register");
        die();
    }
    elseif ($pass[0] == "" || $pass[1] == ""){
        SetMessage("Register", array("Please enter a password"));
        header("Location: index.php?do=register");
        die();
    }
    elseif ($email == ""){
        SetMessage("Register", array("Please enter an email"));
        header("Location: index.php?do=register");
        die();
    }
    elseif ($sq == ""){
        SetMessage("Register", array("Please enter a secret question"));
        header("Location: index.php?do=register");
        die();
    }
    elseif ($sa == ""){
        SetMessage("Register", array("Please enter a secret answer"));
        header("Location: index.php?do=register");
        die();
    }
    elseif (strlen($user) < 3){
        SetMessage("Register", array("The userid is too short (6 chars min)"));
        header("Location: index.php?do=register");
        die();
    }
    elseif (strlen($pass[0]) < 3){
        SetMessage("Register", array("The password is too short (6 chars min)"));
        header("Location: index.php?do=register");
        die();
    }
    else{

            $registered = 1;
           mssql_query("INSERT INTO Account (UserID, Name, Email, UGradeID, PGradeID, RegDate, sa, sq, Coins, EventCoins, Coins, Country)Values ('$user', '$names','$email', 0, 0, GETDATE(), '$sa', '$sq', 0, 0, 0, '$countrys')");
	    $res = mssql_query("SELECT * FROM Account WHERE UserID = '$user'");
	    $usr = mssql_fetch_assoc($res);
	    $aid = $usr['AID'];
          mssql_query("INSERT INTO Login ([UserID], [AID], [Password])Values ('$user', '$aid', '$pass[0]')");
        SetMessage("Register", array("The account $user has been created successfully"));
        header("Location: index.php");
        die();
    }

}else{
    SetTitle("SecondaryGunZ - Registro");
/*    $europe = array('DE','AT','BG','BE','CY','DK','SK','SI','ES','EE','FI','FR','GR','HU','IE','LV','LT','LU','MT','NL','PL','PT','GB','CZ','RO','SE');

    $p = GetCountryCodeByIP($_SERVER[REMOTE_ADDR]);
    if(in_array(strtoupper($p), $europe))
    {
        $country = sprintf("[<font color='#00FF00'>%s</font>] %s", $p, GetCountryNameByIP($_SERVER[REMOTE_ADDR]));
    }else{
        $country = sprintf("[<font color='#FF0000'>%s</font>] %s", $p, GetCountryNameByIP($_SERVER[REMOTE_ADDR]));
    }*/
}



?>
<body onLoad="FP_preloadImgs(/*url*/'../images/btn_register_on.jpg')">

<table border="0" style="border-collapse: collapse" width="100%">
					<tr>
						<td width="183" valign="top">
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
						<td valign="top" style="background-image: url('images/md_center.png'); background-size: 100% 80%">
							<div style="margin: 20px 20px 20px 20px;">
						<div align="center">
							<table border="0" style="border-collapse: collapse;background: url('images/md_register.png') no-repeat center top; background-size: 100% 100%" width="100%" height="440" bordercolor="#000000">
								<tr>
									<td height="24" style="">
									<div align="left">
										<font face="Tahoma" size="2"><b>&nbsp;&nbsp;&nbsp;&nbsp;</b></font><font face="Tahoma" size="2">Register Account</font></td>
								</tr>
								<tr>
									<td>
									<div align="center">
										<form method="POST" action="index.php?do=register" name="register">
											<table border="0" style="float:left;" width="100%" height="100%">
											<tr>
												<td colspan="5">
												<div align="center" style="width: 380px;height: 40px;margin: 20px 20px 10px 20px;padding-top: 18px;background: url('images/mis_eumember.png') no-repeat center top; background-size: 100% 100%">
															<font color="#FFF">
															Fill all the boxes with the information</font><br>
															<font color="#00FF00">
															Thanks for being part of us</font></div>
												</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">&nbsp;</td>
												<td width="183">&nbsp;</td>
												<td width="183">&nbsp;</td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="" width="5" height="9" id="img13"></td>
												<td width="183" align="left">
												<div align="left">UserID:</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" type="text" name="userid" size="19" class="textLogin"></td>
												
												<td width="16">&nbsp;</td>
												
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9"><img border="0" src="" width="5" height="9" id="img13"></td>
												<td width="183" align="left">Name:</td>
												<td width="183" align="left"><input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" name="namea" type="text" class="textLogin" id="namea" size="19"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9"><img border="0" src="" width="5" height="9" id="img13"></td>
												<td width="183" align="left">Country:</td>
												<td width="183" align="left"><input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" name="namea" type="text" class="textLogin" id="country" size="19"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="" width="5" height="9"></td>
												<td width="183" align="left">
												Password:</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" type="password" name="pass1" size="19" class="textLogin"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="" width="5" height="9"></td>
												<td width="183" align="left">
												Repeat Password:</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" type="password" name="pass2" size="19" class="textLogin"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">&nbsp;</td>
												<td width="183" align="left">&nbsp;</td>
												<td width="183" align="left">&nbsp;</td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="" width="5" height="9"></td>
												<td width="183" align="left">
												E-Mail</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" type="text" name="email" size="19" class="textLogin"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">&nbsp;</td>
												<td width="183" align="left">&nbsp;</td>
												<td width="183" align="left">
												<div align="left">
												<font color="#575353">
												<span style="font-size: 7pt">Please insert a valid e-mail!</span></font></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="" width="5" height="9"></td>
												<td width="183" align="left">
												Secret Question:</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" type="text" name="sq" size="19" class="textLogin"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">&nbsp;</td>
												<td width="183" align="left">&nbsp;</td>
												<td width="183" align="left">&nbsp;</td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="" width="5" height="9"></td>
												<td width="183" align="left">
												Secret Answer:</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" type="text" name="sa" size="19" class="textLogin"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">&nbsp;</td>
												<td width="183">&nbsp;</td>
												<td width="183">&nbsp;</td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">&nbsp;</td>
												<td width="366" colspan="2">
												<p align="center">
												<input border="0" style="margin-top: 20px" src="images/btn_register_off.png" name="img123" width="228" height="37" onMouseOut="FP_swapImgRestore()" onMouseOver="FP_swapImg(1,1,/*id*/'img123',/*url*/'images/btn_register_on.png')" type="image"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">&nbsp;</td>
												<td width="183">&nbsp;</td>
												<td width="183">&nbsp;</td>
												<td width="16">&nbsp;</td>
											</tr>
										</table>
											<input type="hidden" name="submit" value="1"></form>
									</div>
									</td>
								</tr>
							</table>
							</div>
						</div>
						</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
						<td width="171" valign="top">
						<div align="center">
							<? include "blocks/block_login.php" ?>
						</div>
						</td>
					</tr>
				</table>