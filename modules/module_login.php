<?
include "secure/anti_inject.php";
include "secure/sql_check.php";
if($_SESSION[AID] != "")
{
    header("Location: index.php");
    die();
}

if(isset($_POST[submit]))
{
    $user = clean($_POST[userid]);
    $pass = clean($_POST[pass]);

    $ip = $_SERVER['REMOTE_ADDR'];

    // Borrar fails antiguos
    mssql_query("DELETE FROM LoginFails WHERE Time < " . (time() - 3600) );

    // Buscar fails para la ip actual
    $strikeq = mssql_query("SELECT COUNT(*) AS strikes, MAX(Time) as lasttime FROM LoginFails WHERE IP = '$ip'");
    $strikedata = mssql_fetch_object($strikeq);

    if( $strikedata->strikes >= 5 && $strikedata->lasttime > ( time() - 900 ) )
    {
        SetMessage("You may not login", array("You have failed to login 5 times in the last 15 minutes", "You have to wait 15 minutes to try again"));
        header("Location: index.php");
        die();
    }

    $loginquery = mssql_query_logged("SELECT l.UserID, l.AID, c.UGradeID, l.Password FROM Login(nolock) l INNER JOIN Account(nolock) c ON l.AID = c.AID WHERE l.UserID = '$user' AND l.Password = '$pass'");
    if(mssql_num_rows($loginquery) == 1)
    {
        $logindata = mssql_fetch_row($loginquery);

        $_SESSION[UserID] = $logindata[0];
        $_SESSION[AID] = $logindata[1];
        $_SESSION[UGradeID] = $logindata[2];
        $_SESSION[Password] = md5(md5($logindata[3]));

        $url = ($_SESSION[URL] == "") ? "index.php" : $_SESSION[URL];
        $_SESSION[URL] = "";

        header("Location: $url");
        die();
    }else{
        mssql_query("INSERT INTO LoginFails (IP, UserID, Time) VALUES ('$ip', '$user', '" . time() . "')");
        SetMessage("Mensaje Del Login", array("Incorrecto UserID o Contrase�a"));
        header("Location: index.php?do=login");
        die();
    }
}else{
    SetTitle("SecondaryGunZ - Log in");
}


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
						</div>
						</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
					  <td width="20" valign="top">&nbsp;</td>
						<td valign="top" style="background-image: url('images/md_center.png'); background-size: 100% 35%">
							<div style="margin: 20px 20px 20px 20px;">
						<div align="center">
							<table border="0" style="border-collapse: collapse;background: url('images/md_register.png') no-repeat center top; background-size: 100%; border-bottom: 1px solid rgba(124,255,255, 0.3)" width="100%">
								<tr>
									<td  height="24">
									<div align="left">
										<b><font face="Tahoma" size="2">&nbsp;&nbsp;Member Login</font></b></td>
								</tr>
								<tr>
									<td>
									<div align="center">
										<form method="POST" action="index.php?do=login" name="login">
											<table border="0" style="border-collapse: collapse; float:left" width="408" height="100%">
											<tr>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="174" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="6" style="background-repeat: no-repeat; background-position: center top">
												</td>
												<td width="196" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="174" style="background-repeat: no-repeat; background-position: center top">
												<div align="right">UserID:</td>
												<td width="6" style="background-repeat: no-repeat; background-position: center top">
												</td>
												<td width="196" style="background-repeat: no-repeat; background-position: center top">
												<div align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" type="text" name="userid" size="20" class="textLogin"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="174" style="background-repeat: no-repeat; background-position: center top">
												<div align="right">Password:</td>
												<td width="6" style="background-repeat: no-repeat; background-position: center top">
												</td>
												<td width="196" style="background-repeat: no-repeat; background-position: center top">
												<div align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" type="password" name="pass" size="20" class="textLogin"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="174" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="6" style="background-repeat: no-repeat; background-position: center top">
												</td>
												<td width="196" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="377" colspan="3" style="background-repeat: no-repeat; background-position: center top">
												<div  align="center">
												<input border="0" src="images/btn_login2_off.png" name="img1762" width="126" height="22" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1762',/*url*/'images/btn_login2_on.png')" type="image"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="400" style="background-repeat: no-repeat; background-position: center top" colspan="5" height="10">
												</td>
											</tr>
											<tr>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="377" style="background-repeat: no-repeat; background-position: center top" colspan="3">
												<p align="center">
												<a href="index.php?do=register">
												New user?</a> |
												<a href="index.php?do=login&act=resetpwd">
												Forgot password?</a></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="174" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="6" style="background-repeat: no-repeat; background-position: center top">
												</td>
												<td width="196" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
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