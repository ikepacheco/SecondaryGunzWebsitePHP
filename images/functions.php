<?

function mysql_query_logged($query)
{
    $f = fopen(".\QueryLog.txt", "a+");
    fputs($f, $query);
    fprintf($f, "[AID=%s] %s [%s] - %s\n", $_SESSION['AID'],  date("d-m-y - H:i:S"), $_SERVER['REMOTE_ADDR'], $query);
    fclose($f);
    return mysql_query($query);
}

if(!function_exists("SetMessage") )
{
function SetMessage($title, $Elements)
{
    $output = "<tr><td width='10'>&nbsp;</td>
            <td width='778'>&nbsp;</td>
            <td width='12'>&nbsp;</td>
          </tr>
        	<tr>
            <td width='10'>&nbsp;</td>
            <td width='778'>
			<div align='center'>
				<table border='1' style='border-collapse: collapse' width='100%' bordercolor='#000000'>
					<tr>
						<td style='background-image: url(images/content_bar.jpg); background-repeat: repeat-x; background-position-y: top' height='24'>
						<div align='center'><b><font face='Tahoma' size='2'>
						Mensaje de SecondaryGunz</font></b></div></td>
					</tr>
					<tr>
						<td bgcolor='#2C2A2A'>
						<div align='center'>
							<table border='0' style='border-collapse: collapse' width='774' height='100%'>
								<tr>
									<td width='10'>&nbsp;</td>
									<td width='747'>&nbsp;</td>
									<td width='11'>&nbsp;</td>
								</tr>
								<tr>
									<td width='10'>&nbsp;</td>
									<td width='747' align='left'><b>
									<font face='Tahoma' size='2'>$title</font></b></td>
									<td width='11'>&nbsp;</td>
								</tr>
								<tr>
									<td width='10'>&nbsp;</td>
									<td width='747' align='left'>&nbsp;</td>
									<td width='11'>&nbsp;</td>
								</tr>
								<tr>
									<td width='10'>&nbsp;</td>
									<td width='747' align='left'>
						            <ul>";
                                        foreach($Elements as $value)
                                        {
							                $output.= "<li>" . $value . "</li>";
                                        }
						            $output.="</ul>
									</td>
									<td width='11'>&nbsp;</td>
								</tr>
								<tr>
									<td width='10'>&nbsp;</td>
									<td width='747'>&nbsp;</td>
									<td width='11'>&nbsp;</td>
								</tr>
							</table>
						</div>
						</td>
					</tr>
				</table>
			</div>
			</td>
            <td width='12'>&nbsp;</td></tr><tr><td width='10'>&nbsp;</td></tr>";
            $_SESSION[SiteMessage] = $output;
}}

if(!function_exists("re_dir") )
{
function re_dir($url)
{
    echo "<body  bgcolor='#000000'><script>document.location = '$url'</script></body>";
    die("Javascript disabled");
} }

function clean($sql)
{
    // remove palavras que contenham sintaxe sql
    $sql = preg_replace(sql_regcase("/(from|xp_|execute|exec|sp_executesql|sp_|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/"),"",$sql);
    $sql = trim($sql);//limpa espa�os vazio
    $sql = strip_tags($sql);//tira tags html e php
    $sql = addslashes($sql);//Adiciona barras invertidas a uma string
    return $sql;
}

if(!function_exists("msgbox")){
function msgbox($text, $url)
{
    echo "<body  bgcolor='#000000'><script>alert('$text');document.location = '$url'</script></body>";
    die("Javascript disabled");
} }

function SetTitle($title)
{
    $_SESSION[PageTitle] = $title;
}

function GetClanMasterByCLID($clid)
{
    $clanid = clean($clid);

    $res = mysql_query_logged("SELECT * FROM Clan WHERE CLID = '" . $clanid . "'");

    $clan = mysql_fetch_object($res);

    $res2 = mysql_query_logged("SELECT * FROM `Character` WHERE CID = '" . $clan->MasterCID . "'");

    $char = mysql_fetch_object($res2);


    return $char->Name;
}

function GetCharNameByCID($cid)
{
    $a = mysql_fetch_assoc(mysql_query_logged("SELECT Name FROM `Character` WHERE CID = '$cid'"));
    return $a[Name];
}


function CheckIfExistClan($aid){
    $aid = clean($aid);
    $a = mysql_query_logged("SELECT * FROM `Character` WHERE AID = '$aid'");
    while($char = mysql_fetch_assoc($a))
    {
        if(mysql_num_rows(mysql_query_logged("SELECT * FROM ClanMember WHERE CID = '".$char[CID]."'")) <> 0)
        {
            return true;
            break;
        }
    }
    return false;
}

function GetCountryCodeByIP($ipaddress)
{
/*    $res = mysql_fetch_assoc(mysql_query_logged("SELECT * FROM IPToCountry WHERE IPTo >= dbo.inet_aton('$ipaddress') AND IPFrom <= dbo.inet_aton('$ipaddress') LIMIT 0,1"));
    return $res[CountryCode2];*/
}

function GetCountryNameByIP($ipaddress)
{
/*    $res = mysql_fetch_assoc(mysql_query_logged("SELECT TOP 1 * FROM IPToCountry WHERE IPTo >= dbo.inet_aton('$ipaddress') AND IPFrom <= dbo.inet_aton('$ipaddress')"));
    return ucfirst(strtolower($res[CountryName]));*/
}

function IsEuropean()
{
    $europe = array('DE','AT','BG','BE','CY','DK','SK','SI','ES','EE','FI','FR','GR','HU','IE','LV','LT','LU','MT','NL','PL','PT','GB','CZ','RO','SE');

    $p = GetCountryCodeByIP($_SERVER[REMOTE_ADDR]);
    if(in_array(strtoupper($p), $europe))
    {
        return true;
    }else{
        return false;
    }
}

function MakePercent($Value, $Total)
{
    return ($Value * $Total) / 100;
}

function GetClanPercent($Wins, $Losses)
{
    $total = $Wins + $Losses;

    return ($total == 0) ? "0%" : round((100 * $Wins) / $total, 2) . "%";
}

function FormatCharName($cid)
{
    $res = mysql_fetch_object(mysql_query_logged("SELECT AID, Name From `Character` WHERE CID = $cid"));

    $name = $res->Name;

    $res = mysql_fetch_object(mysql_query_logged("SELECT UGradeID FROM Account WHERE AID = {$res->AID}"));

    switch($res->UGradeID)
    {
        case 255:
            return "<font color='#FF0000'>$name</font>";
        break;
        case 254:
            return "<font color='#00FF00'>$name</font>";
        break;
        default:
            return $name;
        break;
    }
}

function GetKDRatio($kills, $deaths)
{
    $total = $kills + $deaths;

    $percent = @round((100 * $kills) / $total, 2);

    if($kills == 0 && $deaths == 0)
    {
        return "0/0 (100%)";
    }else{
        return sprintf("%d/%d (%d%%)", $kills, $deaths, $percent);
    }
}

function SetURL($url)
{
    $_SESSION[URL] = $url;
}

function GetSexByID($sid)
{
    switch($sid)
    {
        case 0:
            return "Hombre";
        break;
        case 1:
            return "Mujer";
        break;
        case 2:
            return "All";
        break;
    }
}

function GetTypeByID($tid)
{
    switch($cat)
    {
        case 3:
            $type = "Armor";
        break;
        case 2:
            $img = "content_title_shop_meleewea.jpg";
            $type = "Melee";
        break;
        case 1:
            $img = "content_title_shop_rangedwe.jpg";
            $type = "Ranged";
        break;
        case 5:
            $img = "content_title_shop_speciali.jpg";
            $type = "Special";
        break;
        default:
            $img = "content_title_shop_armor.jpg";
            $type = "Armor";
        break;
    }

    return $type;
}


function UploadFTPFile($filename, $host, $user, $pass, $remotefile)
{
    $ftp = ftp_connect($host, 21, 30);

    if(!ftp_login($ftp, $user, $pass))
        return false;

    if(!ftp_pasv($ftp, false))
        return false;


    if(!ftp_put($ftp, $remotefile, $filename, FTP_BINARY))
        return false;
    else
        ftp_close($ftp);
        return true;
}

function GetImageByType($ntype)
{
    if(substr($ntype, 0, 6) == "[NEWS]")
    {
        return "btn_news.jpg";
    }else{
        return "btn_update.jpg";
    }
}

function DeleteType($ptitle)
{
    $ptitle = str_replace("[NEWS]", "", $ptitle);

    return str_replace("[UPDATE]", "", $ptitle);
}

function get_file_extension($filename)
{
    $path_info = pathinfo($filename);
    return $path_info['extension'];
}





?>