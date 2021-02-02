<?
include "secure/anti_inject.php";
include "secure/sql_check.php";
if($_SESSION[AID] <> "")
{
    SetMessage("Mensaje de SecondaryGunz", array("Por Favor Desloguea Para Poder Recuperar Tu Cuenta"));
    header("Location: index.php");
    die();
}

SetTitle("SecondaryGunZ - Recuperar Cuenta");

if( $_GET['paso'] == 3 ){
if(isset($_POST[submit]))
{
    $userid     = $_SESSION['RstUserID'];
    $email      = clean($_POST[email]);
    $sq         = $_SESSION['RstSQ'];
    $sa         = clean($_POST[sa]);
    $pass1      = clean($_POST[pass1]);
    $pass2      = clean($_POST[pass2]);


	if( $_SESSION['RstSQ'] == 'SECRET QUESTION NOT SET' ){
            SetMessage("Mensaje de SecondaryGunZ", array("El UserID '$userid' No Es La Misma Pregunta/Respuesta Secreta"));
            header("Location: index.php?do=resetpwd");
            die();
	}

    $errorcount = 0;

    if($userid == ""){
        $errorcount++;
        SetMessage("Mensaje de SecondaryGunZ", array("Por Favor Introduza Un UserID"));
        header("Location: index.php?do=resetpwd");
        die();
    }

    if($email == ""){
        $errorcount++;
        SetMessage("Mensaje de SecondaryGunZ", array("Por Favor Introduza Un EMail"));
        header("Location: index.php?do=resetpwd");
        die();
    }

    if($sq == ""){
        $errorcount++;
        SetMessage("Mensaje de SecondaryGunZ", array("Por Favor Introduza Una Pregunta Secreta"));
        header("Location: index.php?do=resetpwd");
        die();
    }

    if($sa == ""){
        $errorcount++;
        SetMessage("Mensaje de SecondaryGunZ", array("Por Favor Introduza Una Respuesta Secreta"));
        header("Location: index.php?do=resetpwd");
        die();
    }

    if(strlen($pass1) < 6){
        $errorcount++;
        SetMessage("Mensaje de SecondaryGunZ", array("Por Favor Introduzca Un Contrase�a Mas Larga (6 Caracteres Minimo)"));
        header("Location: index.php?do=resetpwd");
        die();
    }

    if(mssql_num_rows(mssql_query_logged("SELECT * FROM Account(nolock) WHERE UserID = '$userid'")) != 1){
        $errorcount++;
        SetMessage("Mensaje de SecondaryGunZ", array("UserID '$userid' No Existe"));
        header("Location: index.php?do=resetpwd");
        die();
    }

    if($pass1 != $pass2){
        $errorcount++;
        SetMessage("Mensaje de SecondaryGunZ", array("Las Passwords No Coinciden"));
        header("Location: index.php?do=resetpwd");
        die();
    }

    if($errorcount == 0){

    $rs1 = mssql_query_logged("SELECT * FROM Account(nolock) WHERE UserID = '$userid' AND Email = '$email' AND sq = '$sq' AND sa = '$sa'");

    if(mssql_num_rows($rs1) != 1)
    {
         SetMessage("Mensaje de SecondaryGunZ", array("Informacion Incorrecta"));
         header("Location: index.php?do=resetpwd");
         die();
    }else{

        $pass1 = substr(($pass1), 0, 18);
	mssql_query_logged("UPDATE Login SET Password = '$pass1' WHERE UserID = '$userid'");
        SetMessage("Mensaje de SecondaryGunZ", array("Contrase�a Cambiada Para El '$userid'"));
        header("Location: index.php?do=login");
        die();
    }


    }
}else{
    header("Location: index.php?do=resetpwd");
    die();
}
}elseif( $_GET['paso'] == 2 ){
    if(isset($_POST[submit])){
        $userid     = clean($_POST[userid]);

        if($userid == ""){
            SetMessage("Mensaje de SecondaryGunZ", array("Por Favor Introduzca un UserID"));
            header("Location: index.php?do=resetpwd");
            die();
        }

        $query005 = mssql_query_logged("SELECT * FROM Account(nolock) WHERE UserID = '$userid'");

        if(mssql_num_rows($query005) == 0){
            SetMessage("Mensaje de SecondaryGunZ", array("UserID '$userid' No Existe"));
            header("Location: index.php?do=resetpwd");
            die();
        }

        $RstData = mssql_fetch_assoc($query005);
        $_SESSION['RstUserID'] = $userid;

	$_SESSION['RstSQ'] = $RstData['sq'];

	if( $_SESSION['RstSQ'] == 'SECRET QUESTION NOT SET' ){
            SetMessage("Mensaje de SecondaryGunZ", array("El UserID '$userid' No Existe Pregunta/Respuesta Secreta"));
            header("Location: index.php?do=resetpwd");
            die();
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
						<td valign="top">
						<div align="center">
							<table border="1" style="border-collapse: collapse" width="100%" bordercolor="#000000">
								<tr>
									<td background="images/content_bar.jpg" height="24" style="background-image: url('images/content_bar.jpg'); background-repeat: no-repeat; background-position: center top">
									<div align="center">
										<b><font face="Tahoma" size="2">Recuperar 
										Cuenta</font></b></td>
								</tr>
								<tr>
									<td bgcolor="#2C2A2A">
									<div align="center">
										<form method="POST" action="index.php?do=resetpwd&paso=3" name="resetpwd">
											<table border="0" style="border-collapse: collapse; float:left" width="408" height="100%">
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="376" style="background-repeat: no-repeat; background-position: center top" colspan="3">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="398" style="background-repeat: no-repeat; background-position: center top" colspan="5" background="images/mis_eumember.jpg" height="62">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="402" height="100%">
														<tr>
															<td width="10">&nbsp;</td>
															<td width="376">&nbsp;</td>
															<td width="10">&nbsp;</td>
														</tr>
														<tr>
															<td width="10">&nbsp;</td>
															<td width="376" rowspan="2">
															<div align="center">
															Por Favor Complete 
															Con La Informacion 
															Correcta
															</td>
															<td width="10">&nbsp;</td>
														</tr>
														<tr>
															<td width="10">&nbsp;</td>
															<td width="10">&nbsp;</td>
														</tr>
														<tr>
															<td width="10">&nbsp;</td>
															<td width="376">&nbsp;</td>
															<td width="10">&nbsp;</td>
														</tr>
													</table>
												</div>
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">
												<img border="0" src="images/mis_arrow.jpg" width="5" height="9" id="img1764"></td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">
												UserID</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">
												<?=$userid?></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">
												<img border="0" src="images/mis_arrow.jpg" width="5" height="9"></td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">
												EMail</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">
												<input type="text" name="email" size="20" class="textLogin"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">
												<img border="0" src="images/mis_arrow.jpg" width="5" height="9"></td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">
												Pregunta Secreta</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">
												<?=$RstData['sq']?></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">
												<img border="0" src="images/mis_arrow.jpg" width="5" height="9"></td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">
												Respuesta Secreta</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">
												<input type="text" name="sa" size="20" class="textLogin"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="401" style="background-repeat: no-repeat; background-position: center top" colspan="5" background="images/mis_eumember.jpg" height="64">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="402" height="100%">
														<tr>
															<td width="10">&nbsp;</td>
															<td width="377">&nbsp;</td>
															<td width="9">&nbsp;</td>
														</tr>
														<tr>
															<td width="10">&nbsp;</td>
															<td width="377" rowspan="2">
															<div align="center">
															Introduzca La Nueva 
															Contrase�a Y Por 
															Favor Recuerdela</td>
															<td width="9">&nbsp;</td>
														</tr>
														<tr>
															<td width="10">&nbsp;</td>
															<td width="9">&nbsp;</td>
														</tr>
														<tr>
															<td width="10">&nbsp;</td>
															<td width="377">&nbsp;</td>
															<td width="9">&nbsp;</td>
														</tr>
													</table>
												</div>
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">
												<img border="0" src="images/mis_arrow.jpg" width="5" height="9"></td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">
												Contrase�a</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">
												<input type="password" name="pass1" size="20" class="textLogin"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">
												<img border="0" src="images/mis_arrow.jpg" width="5" height="9"></td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">
												Repita Contrase�a</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">
												<input type="password" name="pass2" size="20" class="textLogin"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="401" style="background-repeat: no-repeat; background-position: center top" colspan="5">
												<p align="center">
												<input border="0" src="images/btn_changepass_off.jpg" name="I1" id="img67127" width="136" height="22" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img67127',/*url*/'images/btn_changepass_on.jpg')" type="image"></td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top">&nbsp;
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
						</td>
						<td width="171" valign="top">
						<div align="center">
							<? include "blocks/block_login.php" ?>
						</div>
						</td>
					</tr>
				</table>
                <?
    }else{
         header("Location: index.php?do=resetpwd");
         die();
    }
}else{
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
						<td valign="top">
						<div align="center">
							<table border="1" style="border-collapse: collapse" width="100%" bordercolor="#000000">
								<tr>
									<td background="images/content_bar.jpg" height="24" style="background-image: url('images/content_bar.jpg'); background-repeat: no-repeat; background-position: center top">
									<div align="center">
										<b><font face="Tahoma" size="2">
										Recuperar Cuenta</font></b></td>
								</tr>
								<tr>
									<td bgcolor="#2C2A2A">
									<div align="center">
										<form method="POST" action="index.php?do=resetpwd&paso=2" name="resetpwd">
											<table border="0" style="border-collapse: collapse; float:left" width="408" height="100%">
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="376" style="background-repeat: no-repeat; background-position: center top" colspan="3">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="398" style="background-repeat: no-repeat; background-position: center top" colspan="5" background="images/mis_eumember.jpg" height="62">
												<div align="center">
													<table border="0" style="border-collapse: collapse" width="402" height="100%">
														<tr>
															<td width="10">&nbsp;</td>
															<td width="377">&nbsp;</td>
															<td width="9">&nbsp;</td>
														</tr>
														<tr>
															<td width="10">&nbsp;</td>
															<td width="377" rowspan="2">
															<div align="center">
															Por Favor Complete 
															Con La Informacion 
															Correcta
															</td>
															<td width="9">&nbsp;</td>
														</tr>
														<tr>
															<td width="10">&nbsp;</td>
															<td width="9">&nbsp;</td>
														</tr>
														<tr>
															<td width="10">&nbsp;</td>
															<td width="377">&nbsp;</td>
															<td width="9">&nbsp;</td>
														</tr>
													</table>
												</div>
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">
												<img border="0" src="images/mis_arrow.jpg" width="5" height="9" id="img1764"></td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top" align="left">
												UserID</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top" align="left">
												<input type="text" name="userid" size="20" class="textLogin"></td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="13" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
											</tr>
											<tr>
												<td width="401" style="background-repeat: no-repeat; background-position: center top" colspan="5">
												<p align="center">
												<input border="0" src="images/btn_changepass_off.jpg" name="I1" id="img67127" width="136" height="22" onmouseout="FP_swapImgRestore()" onmouseover="FP_swapImg(1,1,/*id*/'img67127',/*url*/'images/btn_changepass_on.jpg')" type="image"></td>
											</tr>
											<tr>
												<td width="9" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="10" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="184" style="background-repeat: no-repeat; background-position: center top">&nbsp;
												</td>
												<td width="185" style="background-repeat: no-repeat; background-position: center top">&nbsp;
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
						</td>
						<td width="171" valign="top">
						<div align="center">
							<? include "blocks/block_login.php" ?>
						</div>
						</td>
					</tr>
				</table>
                <?
                }
                ?>