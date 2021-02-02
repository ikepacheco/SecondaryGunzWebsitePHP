<?
include "config.php";
include "functions.php";

function ParseTitle($content)
{
    if($_SESSION[PageTitle] <> "")
    {
        $r = str_replace("%TITLE%", $_SESSION[PageTitle], $content);
        //$r = str_replace("src=\"images/", "src=\"http://images.eurogunz.com/", $r);
        $_SESSION[PageTitle] = "";
        return $r;
    }else{
        $r = str_replace("%TITLE%", "Radiality Gunz - Argentino only private server", $content);
        //$r = str_replace("src=\"images/", "src=\"http://images.eurogunz.com/", $r);
        return $r;
    }
}

ob_start("ParseTitle");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Language" content="es">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>%TITLE%</title>
<link rel="stylesheet" type="text/css" href="e_style.css">
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
		UpdatePrice();
	}

	}catch(err){

	}

}
// -->
</script>

<script type="text/javascript" src="ajax/utilities/utilities.js"></script>
<script type="text/javascript" src="ajax/container/container.js"></script>

</head>

<body class=" yui-skin-sam" topmargin="0" leftmargin="0" rightmargin="0" bottommargin="0" marginwidth="0" marginheight="0" style="background-color: #373737; background-image: url('images/body_bg.jpg'); background-repeat: repeat-x; background-position-y: top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
  <!-- MSTableType="layout" -->
	<tbody><tr>
    <td class="head_bg" align="center" height="768" valign="top"><table border="0" cellpadding="0" cellspacing="0" width="100%">
      <tbody><tr>
        <td class="body_izq">&nbsp;</td>
        <td width="802">
		<div align="center">

		<table border="0" cellpadding="0" cellspacing="0" width="800">
        <tbody><tr>
        	<td width="800" colspan="3">
						<object classid="clsid:D27CDB6E-AE6D-11CF-96B8-444553540000" id="obj1" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,40,0" border="0" width="800" height="308">
							<param name="movie" value="images/head_flash.swf">
							<param name="quality" value="High">
							<param name="wmode" value="transparent">
							<embed src="images/head_flash.swf" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" name="obj1" width="800" height="308" quality="High" wmode="transparent"></object>
						</td>
          </tr>
            <? echo $_SESSION[SiteMessage];$_SESSION[SiteMessage]=""?>
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
            <td width="800" colspan="3">
			<p align="center">&nbsp;<map name="FPMap0"><area href="mailto:lambdacerro@gmail.com" shape="rect" coords="560, 17, 611, 84"></map><img border="0" src="images/top_bg.jpg" width="626" height="102" usemap="#FPMap0"></td>
          </tr>
        </tbody></table>
          </div>
          </td>
        <td>&nbsp;</td>
      </tr>
    </tbody></table></td>
  </tr>
</tbody></table>
</body>

</html>

<?
ob_end_flush();
?>