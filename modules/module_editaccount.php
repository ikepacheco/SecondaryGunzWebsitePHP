<?
include "secure/anti_inject.php";
include "secure/sql_check.php";
if($_SESSION[AID] == "")
{
    SetMessage("Message de SecondaryGunz", array("Porfavor, Logueate primero."));
    SetURL("index.php?do=editaccount");
    header("Location: index.php?do=login");
    die();
}

if(isset($_POST[Checksubmit]))
{
    $pass = clean($_POST[CheckPass]);
    if(mssql_num_rows(mssql_query_logged("SELECT * FROM Login(nolock) WHERE UserID = '{$_SESSION[UserID]}' AND Password = '$pass'")) == 1)
    {
        $_SESSION[Modify] = $_SESSION[AID];
    }else{
        SetMessage("Por Favor Verifique La Informacion", array("Contrase�a incorrecta."));
        $_SESSION[Modify] = 0;
        header("Location: index.php?do=editaccount");
        die();
    }
}

if($_SESSION[Modify] != $_SESSION[AID])
{
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
						<td valign="top" style="background-image: url('images/md_center.png'); background-size: 100% 100%">
							<div style="margin: 20px 20px 20px 20px;">
						<div align="center">
							<table border="0" style="border-collapse: collapse;background: url('images/md_register.png') no-repeat center top; background-size: 100%;border-bottom: 1px solid rgba(124,255,255, 0.3)" width="100%" bordercolor="#000000">
								<tr>
									<td height="24" style="">
									<div align="center">
										<b><font face="Tahoma" size="2">
										Password Verify</font></b></td>
								</tr>
								<tr>
									<td>
									<div align="center">
										<form method="POST" action="index.php?do=editaccount" name="editacc">
											<table border="0" style="border-collapse: collapse; float:left" width="408" height="100%">
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top" colspan="3">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top" colspan="3">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top" colspan="3">
												<div align="center">Please insert your actual Password</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top" colspan="3">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="177" style="background-repeat: no-repeat; background-position: center top">
												<div align="right">Password</td>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="209" style="background-repeat: no-repeat; background-position: center top">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" name="CheckPass" size="20" class="textLogin" style="float: left" type="password"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top" colspan="3">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top" colspan="3">
												<div align="center">
												<input border="0" src="images/btn_continue_off.png" name="I1" width="136" height="22" id="img1337" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img1337',/*url*/'images/btn_continue_on.png')" type="image"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="380" style="background-repeat: no-repeat; background-position: center top" colspan="3">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											</table>
											<input type="hidden" name="Checksubmit" value="1"></form>
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
<?
}else{



if(isset($_POST[submit]) && $_SESSION[Modify] == $_SESSION[AID])
{
    $pass[0]        = clean($_POST[pass1]);
    $pass[1]        = clean($_POST[pass2]);
    $email          = clean($_POST[email]);
    $sq             = clean($_POST[sq]);
    $sa             = clean($_POST[sa]);

    $errors = array();

    if($pass[0] <> $pass[1])
        array_merge($errors, array("La contrase�a no Existe"));

    if(mssql_num_rows(mssql_query_logged("SELECT * FROM Account(nolock) WHERE Email = '$email'")) <> 0)
        array_merge($errors, array("El email esta en uso"));

    if($pass[0] <> "" || $pass[1] <> "")
        array_merge($errors, array("Porfavor Introduce tu contrase�a"));

    if($email <> "")
        array_merge($errors, array("Porfavor Introduce tu e-mail"));

    if($sq <> "")
        array_merge($errors, array("Porfavor Introduce tu Pregunta Secreta"));

    if($sa <> "")
        array_merge($errors, array("Porfavor Introduce tu Respuesta Secreta"));

    if(strlen($pass[0]) < 6)
        array_merge($errors, array("La Contrase�a debe ser minimo de 6 caracteres"));

    if(count($errors) == 0)
    {
        mssql_query_logged("UPDATE Account SET Email = '$email' WHERE AID = '{$_SESSION[AID]}'");

        if($_POST[C1] == "ON")
        {
	                  
	    mssql_query_logged("UPDATE Login SET Password = '".$pass[0]."' WHERE AID = '{$_SESSION[AID]}'");
            $_SESSION['Password'] = $pass[0];
        }
        if($_POST[C2] == "ON")
        {
            mssql_query_logged("UPDATE Account SET sq = '$sq', sa = '$sa' WHERE AID = '{$_SESSION[AID]}'");
        }
        SetMessage("Message De Sa GunZ", array("Cuenta Actualizada Perfectamente"));
        header("Location: index.php?do=editaccount");
        die();
    }else{
        SetMessage("Por Favor Verifique La Informacions", $errors);
        header("Location: index.php?do=editaccount");
        die();
    }
}else{
    SetTitle("South American Community - GunZ - Editar Cuenta");
    $europe = array('DE','AT','BG','BE','CY','DK','SK','SI','ES','EE','FI','FR','GR','HU','IE','LV','LT','LU','MT','NL','PL','PT','GB','CZ','RO','SE');

    $p = GetCountryCodeByIP($_SERVER[REMOTE_ADDR]);
    if(in_array(strtoupper($p), $europe))
    {
        $country = sprintf("[<font color='#00FF00'>%s</font>] %s", $p, GetCountryNameByIP($_SERVER[REMOTE_ADDR]));
    }else{
        $country = sprintf("[<font color='#FF0000'>%s</font>] %s", $p, GetCountryNameByIP($_SERVER[REMOTE_ADDR]));
    }

    $r = mssql_fetch_assoc(mssql_query_logged("SELECT * FROM Account(nolock) WHERE AID = {$_SESSION[AID]}"));
    $a = mssql_fetch_assoc(mssql_query_logged("SELECT * FROM Login(nolock) WHERE AID = {$_SESSION[AID]}"));

    $_MEMBER[UserID]        = $r[UserID];
    $_MEMBER[EMail]         = $r[Email];
    $_MEMBER[SA]            = $r[sa];
    $_MEMBER[SQ]            = $r[sq];
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
						<td valign="top" style="background-image: url('images/md_center.png'); background-size: 100% 68%">
							<div style="margin: 20px 20px 20px 20px;">
						<div align="center">
							<table border="0" style="border-collapse: collapse;background: url('images/md_register.png') no-repeat center top; background-size: 100%;border-bottom: 1px solid rgba(124,255,255, 0.3)" width="100%" bordercolor="#000000">
								<tr>
									<td height="24" style="">
									<div align="left">
										<b><font face="Tahoma" size="2">&nbsp;&nbsp;Edit Account</font></b></td>
								</tr>
								<tr>
									<td>
									<div align="center">
										<form method="POST" action="index.php?do=editaccount" name="editacc">
											<table border="0" style="border-collapse: collapse; float:left" width="408" height="100%">
											<tr>
												<td width="401" colspan="5" style="background-repeat: no-repeat; background-position: center top">&nbsp;
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
												<img border="0" src="images/mis_arrow.png" width="5" height="9" id="img13"></td>
												<td width="183" align="left">
												<div align="left">UserID</td>
												<td width="183" align="left">
												<b><?=$_MEMBER[UserID]?></b></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="images/mis_arrow.png" width="5" height="9" id="img13"></td>
												<td width="183" align="left">
												<div align="left">AID</td>
												<td width="183" align="left">
												<b><?=$_SESSION[AID]?></b></td>
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
												<td width="9">&nbsp;</td>
												<td width="183" align="left">&nbsp;</td>
												<td width="183" align="left">
												<input type="checkbox" name="C1" value="ON" onclick="document.editacc.pass1.disabled = !document.editacc.pass1.disabled; document.editacc.pass2.disabled = !document.editacc.pass2.disabled; ">Edit Password</td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="images/mis_arrow.png" width="5" height="9"></td>
												<td width="183" align="left">
												Password</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" disabled type="password" name="pass1" size="19" class="textLogin"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="images/mis_arrow.png" width="5" height="9"></td>
												<td width="183" align="left">
												Confirm Password</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" disabled type="password" name="pass2" size="19" class="textLogin"></td>
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
												<img border="0" src="images/mis_arrow.png" width="5" height="9"></td>
												<td width="183" align="left">
												E-Mail</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" type="text" name="email" size="19" value="<?=$_MEMBER[EMail]?>" class="textLogin"></td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">&nbsp;</td>
												<td width="183" align="left">&nbsp;</td>
												<td width="183" align="left">
												<div align="left">
												<font color="#575353">
												<span style="font-size: 7pt">
												Please insert a valid E-mail.</span></font></td>
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
												<td width="402" colspan="5">
												</td>
											</tr>
											<tr>
												<td width="402" colspan="5" background="images/mis_eumember.png" height="62" style="background-image: url('images/mis_eumember.png'); background-repeat: no-repeat; background-position: center top; background-size: 95% 100%;">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="404" height="100%">
														<tr>
															<td width="11">&nbsp;</td>
															<td width="378">
															<p align="center" style="color: #13759e">Secret question and answer are used for recover account in case you forget it.</td>
															<td width="9">&nbsp;</td>
														</tr>
													</table>
												</div>
												</td>
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
												<td width="9">&nbsp;</td>
												<td width="183" align="left">&nbsp;</td>
												<td width="183" align="left">
												<input type="checkbox" name="C2" value="ON" onclick="document.editacc.sq.disabled = !document.editacc.sq.disabled; document.editacc.sa.disabled = !document.editacc.sa.disabled; ">Edit Q/A</td>
												<td width="16">&nbsp;</td>
											</tr>
											<tr>
												<td width="11">&nbsp;</td>
												<td width="9">
												<img border="0" src="images/mis_arrow.jpg" width="5" height="9"></td>
												<td width="183" align="left">
												Secret Question</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" disabled type="text" name="sq" size="19" value="<?=$_MEMBER[SQ]?>" class="textLogin"></td>
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
												<img border="0" src="images/mis_arrow.jpg" width="5" height="9"></td>
												<td width="183" align="left">
												Secret Answer</td>
												<td width="183" align="left">
												<input style="background: #FFF;box-shadow: inset 0 0 10px #000;color:#000;padding: 5px 10px 5px 10px;" disabled type="text" name="sa" size="19" class="textLogin"></td>
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
												<input border="0" src="images/btn_modifyacc_off.png" name="img123" width="136" height="22" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img123',/*url*/'images/btn_modifyacc_on.png')" type="image"></td>
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
				</table></td>    <?}?>&nbsp;