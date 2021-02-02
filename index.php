<?
include "secure/config.php";
include "secure/functions.php";
include "secure/anti_inject.php";
include "secure/sql_check.php";
include "secure/ipban.php";
include "secure/ban.php";
include "secure/shield.php";

if( $_SESSION['AID'] != "" || $_SESSION['UserID'] != "" )
{
    $chkq = mssql_query("SELECT Password FROM Login(nolock) WHERE AID = '" . $_SESSION['AID'] .
                        "' AND UserID = '" . $_SESSION['UserID'] . "'");

    if( mssql_num_rows($chkq) != 1 )
    {
        /*$invaclogf = fopen("../gunzlogs/accesosinvalidos.txt", "a+");
        fprintf($invaclogf, "SUserID: %s - SAID: %s - SPass: %s - IP: %s - Date: %s\r\n", $_SESSION['UserID'], $_SESSION['AID'], $_SESSION['Password'], $_SERVER['REMOTE_ADDR'], date("d/m/Y h:i:s A") );
        fclose($invaclogf);*/

        session_unset();
        session_destroy();
        SetMessage("Acceso Invalido", "Acceso invalido a la cuenta");
        header("Location: index.php");
        die();
    }
    else
    {
        $data = mssql_fetch_row($chkq);
        if( md5(md5($data[0])) != $_SESSION['Password'] )
        {
            session_unset();
            session_destroy();
            SetMessage("Acceso Invalido", "Acceso invalido a la cuenta");
            header("Location: index.php");
            die();
        }
    }
}

function ParseTitle($content)
{
    if($_SESSION[PageTitle] <> "")
    {
        $r = str_replace("%TITLE%", $_SESSION[PageTitle], $content);
        //$r = str_replace("src=\"images/", "src=\"http://localhost/", $r);
        $_SESSION[PageTitle] = "";
        return $r;
    }else{
        $r = str_replace("%TITLE%", "SecondaryGunZ - Index", $content);
        //$r = str_replace("src=\"images/", "src=\"http://localhost/", $r);
        return $r;
    }
}

ob_start("ParseTitle");

?>
<html>

<head>
<meta name="GENERATOR" content="Namo WebEditor v6.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<meta http-equiv="Content-Type" content="text/html; charset="ISO-8859-1">
<title>%TITLE%</title>
<script language="JavaScript">
<!--

function FP_swapImgRestore() {//v1.0
 var doc=document,i; if(doc.$imgSwaps) { for(i=0;i<doc.$imgSwaps.length;i++) {
  var elm=doc.$imgSwaps[i]; if(elm) { elm.src=elm.$src; elm.$src=null; } }
  doc.$imgSwaps=null; }
}

function FP_swapImg() {//v1.0
 var doc=document,args=arguments,elm,n; doc.$imgSwaps=new Array(); for(n=2; n<args.length;
 n+=2) { elm=FP_getObjectByID(args[n]); if(elm) { doc.$imgSwaps[doc.$imgSwaps.length]=elm;
 elm.$src=elm.src; elm.src=args[n+1]; } }
}

function FP_preloadImgs() {//v1.0
 var d=document,a=arguments; if(!d.FP_imgs) d.FP_imgs=new Array();
 for(var i=0; i<a.length; i++) { d.FP_imgs[i]=new Image; d.FP_imgs[i].src=a[i]; }
}

function FP_getObjectByID(id,o) {//v1.0
 var c,el,els,f,m,n; if(!o)o=document; if(o.getElementById) el=o.getElementById(id);
 else if(o.layers) c=o.layers; else if(o.all) el=o.all[id]; if(el) return el;
 if(o.id==id || o.name==id) return o; if(o.childNodes) c=o.childNodes; if(c)
 for(n=0; n<c.length; n++) { el=FP_getObjectByID(id,c[n]); if(el) return el; }
 f=o.forms; if(f) for(n=0; n<f.length; n++) { els=f[n].elements;
 for(m=0; m<els.length; m++){ el=FP_getObjectByID(id,els[n]); if(el) return el; } }
 return null;
}

function UpdatePrice()
{
	try
	{
	var SelectedDays = document.frmBuy.rentdays.value;
	var PricePerDay = Math.ceil(document.getElementById("currentprice").innerHTML / 10);
	var CurrentFounds = document.getElementById("currbalance").innerHTML;
	document.getElementById("dayprice").innerHTML = PricePerDay;

	document.getElementById("Total").innerHTML = SelectedDays * PricePerDay;

	document.getElementById("afterpur").innerHTML = CurrentFounds - (SelectedDays * PricePerDay);

	if(CurrentFounds < (SelectedDays * PricePerDay)){
		alert("You not have enought euCoins to buy " + SelectedDays + " days");
		document.frmBuy.rentdays.value = "10";
		//UpdatePrice();
	}

	}catch(err){

	}

}
// -->
</script>

<script type="text/javascript" src="ajax/utilities/utilities.js"></script>
<script type="text/javascript" src="ajax/container/container.js"></script>
<link rel="stylesheet" type="text/css" href="e_style.css">
</head>

<body topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" style="background: #1f1f1f url('images/headbg.jpg') no-repeat center top; background-size: 100%;">
<div class="menu-top">
                <table border="0" cellspacing="0" cellpadding="0">
                    <tr>
                        <td width="13.5%"><a href="/">HOME</a></td>
                        <td width="12.5%"><a href="?do=register">REGISTER</a></td>
                        <td width="18.5%"><a href="?do=download">DOWNLOAD</a></td>
                        <td width="19%">&nbsp;</td>
                        <td width="12%"><a href="?do=forum">FORUM</a></td>
                        <td width="10%"><a href="?do=shop">SHOP</a></td>
                        <td><a href="?do=ranking">RANKING</a></td>
                    </tr>
                </table>
</div>
<div align="center">
	<table border="0" style="border-collapse: collapse" width="90%">
		<tr>
			<td>
                <p align="center">
                
			</td>
		</tr>
		<tr>
			<td>
		<div align="center">

		<table border="0" cellpadding="0" cellspacing="0" width="800">
        <tbody ><tr>
        	<td width="800" colspan="3">&nbsp;
						</td>
          </tr>
            <?
            if($_SESSION['SiteMessage']== "")
            {
                SetMessage("", array("SecondaryGunz es un servidor de GunZ completamente gratuito!",
                "Haz click <a href=\"index.php?do=register\"><b>aqu�</b> para registrarte</a>"));
            }
            echo $_SESSION[SiteMessage];

            $_SESSION[SiteMessage]="";?>
          <tr>
            <td width="10">&nbsp;</td>
            <td width="778">
            <?

            if($_CONFIG[OfflinePage] == "")
            {
                if(isset($_GET['do']))
                {
                    $do = $_GET['do'];
                }else{
                    $do = "index";
                }

                if(file_exists("modules/module_$do.php"))
                {
                    include "modules/module_$do.php";
                    //CheckIPBan();
                    CheckIsBanned();

                }else{
                    SetMessage("An error has ocurred", array("Module '$do' not found"));
                    header("Location: index.php");
                }

            }else{
                include "modules/module_offline.php";
            }

            ?>
			</td>
            <td width="12">&nbsp;</td>
          </tr>
        	<tr>
            <td width="800" colspan="3">&nbsp;
			</td>
          </tr>
        	<tr>
            <td width="800" colspan="3">
            <p align="center" style="margin-bottom: 40px; color:#fff; font-size: 10.5pt;">&nbsp;<map name="FPMap0"><area href="mailto:demonfas@gmail.com" shape="rect" coords="560, 17, 611, 84"></map>
            Copyright &copy; Secondary GunZ 2019. All rights reserved. All images, logos and names belong to their respective owners. 
            Please read our Privacy Policy before using any of the functions or services we offer. Coded by: Demonfas
            </p>
            </td>
          </tr>
        </tbody></table>
          </div>
          	</td>
		</tr>
	</table>
</div>

</body>

</html>