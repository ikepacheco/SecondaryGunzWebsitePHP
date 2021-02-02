<?

if($_SESSION[UserID] == "")
{
    Setmessage ("Mensaje del sistema", Array("No estas logueado, Logueate primero para administrar o mirar clanes."));
    $doxurl = $_SERVER['QUERY_STRING'];
    SetURL("index.php?$doxurl");
    Header ("Location: index.php?do=login");
    Die();
}

$myAID = Clean($_SESSION[AID]);
$CLID = Clean($_GET['CLID']);


$query = mssql_query ("SELECT * FROM Clan WHERE CLID = '$CLID' and Name IS NOT NULL");

if (mssql_num_rows($query) == 0){
Setmessage("Mensaje del sistema", Array("The ClanID: $CLID doesn't exsit or is deleted", "You might login and click on your clan in your user info on the index 

page."));
Header ("Location: index.php");
Die();
}else{
$queryinfo = mssql_fetch_object($query);

$Name = $queryinfo->Name;
settitle("$Name's Clan Page");
$EmblemUrl = $queryinfo->EmblemUrl;
if ($EmblemUrl == NULL){
$EmblemUrl = 'noemblem.gif';
}
$ranking = $queryinfo->Ranking;
$Wins = $queryinfo->Wins;
$Losses = $queryinfo->Losses;
$Points = $queryinfo->Point;
$TotalPoints = $queryinfo->TotalPoint;
$CreationDate = $queryinfo->RegDate;
$MasterCID = $queryinfo->MasterCID;
$MCQuery = Mssql_query ("SELECT AID FROM Character WHERE CID = '$MasterCID'");
$MCQueryinfo = mssql_fetch_object($MCQuery);
//$MasterName = $MCQueryinfo->Name;
$MasterAID = $MCQueryinfo->AID;
If ($myAID == $MasterAID){
$isleader = 1;
}
}

if ($_GET['leaveclan'] != ""){
$leaveCID = Clean($_GET['leaveclan']);
if ($_GET['confirm'] == "true"){
$checkcid = mssql_query ("SELECT Name FROM Character WHERE AID = $myAID and DeleteFlag = 0 and CID = $leaveCID");
if (mssql_num_rows($checkcid) == 1 && $isleader != 1){
$checkcidinfo = mssql_fetch_assoc ($checkcid);
$leaveNAME = $checkcidinfo['Name'];
$checkclan = mssql_query ("SELECT Grade FROM ClanMember WHERE CLID = $CLID and CID = $leaveCID");
if (mssql_num_rows($checkclan) == 1){
$checkclaninfo = mssql_fetch_object ($checkclan);
$checkgrade = $checkclaninfo->Grade;
if ($checkgrade == 2){
$checkgradestr = 'Administrator';
}else{
$checkgradestr = 'Normal Member';
}
mssql_query ("DELETE FROM ClanMember WHERE CLID = $CLID and CID = $leaveCID");
Setmessage ("Mensaje del sistema Panel", Array ("Your Characrer: $leaveNAME as $checkgradestr in Clan: $Name has left it Successfully!"));
Header("Location: index.php?do=index");
Die();
}else{
Setmessage ("Mensaje del sistema", Array("There was an Error, please check your Clan Grade or your entered Link!"));
Header("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}
}else{
Setmessage ("Mensaje del sistema", Array("There was an Error, please check your Clan Grade or your entered Link!"));
Header("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}
}else{
$linkconfirm = '<a
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&leaveclan=' . $leaveCID . '&confirm=true">http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . 

'&leaveclan=' . $leaveCID . '&confirm=true</a>

';
Setmessage ("Message From Administration Panel",  Array("Do you really want to leave Clan: $Name?", "If yes, Please Click this link Below!", "$linkconfirm"));
Header ("Location: index.php?do=Clanadmin&CLID=$CLID");
Die();
}
}elseif ($_GET['resetclanscore'] == "true"){
if ($isleader == 1){
mssql_query ("UPDATE Clan SET Ranking=0, Wins=0, Losses=0, Point=1000, RankIncrease=0, LastDayRanking=0 WHERE CLID = $CLID");
Setmessage ("Mensaje del sistema", Array("You have Successfully reseted your Clan $Name"));
Header("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}else{
Setmessage ("Mensaje del sistema", Array("There was an Error, please check your Clan Grade or your entered Link!"));
Header("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}
}

if ($isleader != 1){
$myqueryx = mssql_query ("SELECT CID FROM Character WHERE AID = '$myAID' and DeleteFlag = 0");
                While ($myqueryxinfo = mssql_fetch_object($myqueryx)){
                $querys = mssql_query ("SELECT Grade FROM ClanMember WHERE CID = '$myqueryxinfo->CID' and CLID = $CLID");
                $mygradex = mssql_fetch_object($querys);
                $mygradexx = $mygradex->Grade;
                                
                if ($mygradexx == 2){
                $isleader = 2;
                break;
                }
                }
                }
                
if ($_GET['kick'] != ""){

$kick = Clean($_GET['kick']);


$query1 = mssql_query ("SELECT Grade, CID FROM ClanMember Where CLID = $CLID and CID = $kick");
$query1info = mssql_fetch_object($query1);
$kickCID = $query1info->CID;
$kickGrade = $query1info->Grade;

$query3 = mssql_query ("SELECT Name From Character WHERE CID = $kickCID");
$query3info = mssql_fetch_assoc($query3);
$kickName = $query3info['Name'];



if ($isleader < $kickGrade){
mssql_query("DELETE FROM ClanMember Where CLID = $CLID And CID = $kickCID");
Setmessage ("Mensaje del sistema", Array("You have just kicked $kickName out Successfully!"));
Header ("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}else{
Setmessage ("Mensaje del sistema", Array("There was an Error, please check your Clan Grade or your entered Link!"));
Header("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}


/*setmessage ("Mensaje del sistema", Array("Kick function is Under Construction!"));
header("Location: index.php?do=Clanadmin&CLID=$CLID");
die(); */
}elseif ($_GET['demote'] != ""){


$demote = Clean($_GET['demote']);


$query1 = mssql_query ("SELECT Grade, CID FROM ClanMember Where CLID = $CLID and CID = $demote");
$query1info = mssql_fetch_object($query1);
$demoteCID = $query1info->CID;
$demoteGrade = $query1info->Grade;

$query3 = mssql_query ("SELECT Name From Character WHERE CID = $demoteCID");
$query3info = mssql_fetch_assoc($query3);
$kickName = $query3info['Name'];



if ($isleader == 1 && $demoteGrade == 2){
mssql_query("UPDATE ClanMember SET Grade = 9 Where CLID = $CLID And CID = $demoteCID");
Setmessage ("Mensaje del sistema", Array("You have just demoted $kickName Successfully!"));
Header ("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}else{
Setmessage ("Mensaje del sistema", Array("There was an Error, please check your Clan Grade or your entered Link!"));
Header("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}


}elseif ($_GET['promote'] != ""){

$promote = Clean($_GET['promote']);

$query1 = mssql_query ("SELECT Grade, CID FROM ClanMember Where CLID = $CLID and CID = $promote");
$query1info = mssql_fetch_object($query1);
$promoteCID = $query1info->CID;
$promoteGrade = $query1info->Grade;

$query3 = mssql_query ("SELECT Name From Character WHERE CID = $promoteCID");
$query3info = mssql_fetch_assoc($query3);
$kickName = $query3info['Name'];



if ($isleader == 1 && $promoteGrade  == 9){
mssql_query("UPDATE ClanMember SET Grade = 2 Where CLID = $CLID And CID = $promoteCID");
Setmessage ("Mensaje del sistema", Array("You have just promoted $kickName Successfully!"));
Header ("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}else{
Setmessage ("Mensaje del sistema", Array("There was an Error, please check your Clan Grade or your entered Link!"));
Header("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}
}elseif ($_GET['closeclan'] != ""){
if ($_GET['closeclan'] == 'true' && $isleader == 1){
if ($_GET['confirm'] == 'true'){
Mssql_query ("DELETE FROM ClanMember WHERE CLID = $CLID");
Mssql_query ("DELETE FROM Clan WHERE CLID = $CLID");
Setmessage ("Mensaje del sistema Panel", Array ("You have just Deleted (Closed) your Clan: $Name Successfully!"));
Header ("Location: index.php?do=index");
die();
}else{
$linkconfirm = '<a
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&closeclan=true&confirm=true">http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . 

'&closeclan=true&confirm=true</a>

';
Setmessage ("Mensaje del sistema Panel", Array("Do you really want to Close (Delete) Clan: $Name?", "If yes, Please Click this link Below!", "$linkconfirm"));
Header ("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}
}else{
Setmessage ("Mensaje del sistema", Array("There was an Error, please check your Clan Grade or your entered Link!"));
Header("Location: index.php?do=Clanadmin&CLID=$CLID");
die();
}
}
$membersinlistcount = mssql_num_rows(Mssql_query ("SELECT * FROM ClanMember WHERE CLID = '$CLID'"));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
</head>
<body>
<div align="center">
<table style="border-color: rgb(0, 0, 0); border-collapse: collapse;"
 border="1" width="408">
  <tbody>
    <tr>
      <td
 style="background-image: url(./images/content_bar.jpg); background-repeat: no-repeat; background-position: center top;"
 height="24">
      <div align="center"><b><font face="Tahoma"
 size="2">Panel de Administraci&oacute;n para Clanes</font></b></div>
      </td>
    </tr>
    <tr>
      <td bgcolor="#2c2a2a">
      <div align="center">
      <table style="border-collapse: collapse; float: left;"
 border="0" width="408">
        <tbody>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" width="376">&nbsp;</td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="8">&nbsp;</td>
            <td colspan="3" align="center" width="380">
            <img alt=""
 src="http://i62.servimg.com/u/f62/11/82/86/31/mis_cl10.jpg"
 border="0" height="67" width="365"> </td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" width="376">&nbsp;</td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" align="center" width="376">Nombre de Clan: <b><big><?=$Name?></b></big></td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" width="376">&nbsp;</td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" align="center" width="376">Ranking:
            <b><?=$ranking?></b></td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" width="376">&nbsp;</td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr> 
    <td width="9">&nbsp;</td> 
    <td align="center" width="600" colspan="3">Ganados/Perdidos: <b><?=$Wins.'/'.$Losses?></b></td> 
    <td width="13">&nbsp;</td> 
</tr> 
<tr> 
    <td width="9">&nbsp;</td> 
    <td width="600" colspan="3">&nbsp;</td> 
    <td width="13">&nbsp;</td> 
</tr> 
<tr> 
    <td width="9">&nbsp;</td> 
    <td align="center" width="600" colspan="3">Puntos: <b><?=$Points?></b></td> 
    <td width="13">&nbsp;</td> 
</tr> 
<tr> 
    <td width="9">&nbsp;</td> 
    <td width="600" colspan="3">&nbsp;</td> 
    <td width="13">&nbsp;</td> 
</tr> 
<tr> 
    <td width="9">&nbsp;</td> 
    <td align="center" width="600" colspan="3">Puntos en Total: <b><?=$TotalPoints?></b></td> 
    <td width="13">&nbsp;</td> 
</tr> 
<tr> 
    <td width="9">&nbsp;</td> 
    <td width="600" colspan="3">&nbsp;</td> 
    <td width="13">&nbsp;</td> 
</tr> 
<tr> 
    <td width="9">&nbsp;</td> 
    <td align="center" width="600" colspan="3">Fecha en que se Cre&oacute;: <b><?=$CreationDate?></b></td> 
    <td width="13">&nbsp;</td> 
</tr> 
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" align="center" width="376">
            <img alt="emblem"
 style="border: 3px solid rgb(0, 0, 0);"
 src="http://toffigunz.de/<?=$EmblemUrl?>" height="120"
 width="120"> </td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" width="376">&nbsp;</td>
            <td width="13">&nbsp;</td>
          </tr>
         <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" align="center" width="376"><b>Lista de miembros del clan, (
              <?=$membersinlistcount?> en lista)</b></td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" width="376">&nbsp;</td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" width="376">
            <div align="center">
            <table border="0" cellpadding="3"
 cellspacing="1" width="600">
              <tbody>
            
                <? //PHP code here
                $ClanMemberquery = Mssql_query ("SELECT * FROM ClanMember WHERE CLID = '$CLID'");
                if (Mssql_num_rows($ClanMemberquery) != 0){
                echo '<tr>
                  <td bgcolor="#121212" width="131">Name</td>
                  <td bgcolor="#121212" width="50">Level</td>
                  <td bgcolor="#121212" width="40">Rank</td> 
                  <td bgcolor="#121212" width="120">JoinDate</td>
                  <td bgcolor="#121212" width="25">CwPoints</td>
                  <td bgcolor="#121212" width="100">Options</td>
                </tr>';
                While ($CMemberqueryinfo = mssql_fetch_object($ClanMemberquery)){
                $CMREGD = $CMemberqueryinfo->RegDate;
                $CMCWP = $CMemberqueryinfo->ContPoint;
                $CMCID = $CMemberqueryinfo->CID;
                $CMNamequery = mssql_query ("SELECT Name, Level, AID FROM Character WHERE CID = '$CMCID'");
                $CMNamequeryinfo = mssql_fetch_object($CMNamequery);
                $CMName = $CMNamequeryinfo->Name;
                $CMLevel = $CMNamequeryinfo->Level;
                $CMRank = $CMemberqueryinfo->Grade;
                $CMAID = $CMNamequeryinfo->AID;
                $CMANameqq = Mssql_query("SELECT UGradeID FROM Account WHERE AID = '$CMAID'");
                $CMANameinfo = mssql_fetch_assoc($CMANameqq);
                $CMAUGrade = $CMANameinfo['UGradeID'];
                            

            if ($isleader == 1 && $CMRank == 9){
                $Options = '<a
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&kick=' . $CMCID . '">Kick</a><big> - </big><a
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&promote=' . $CMCID . '">Promote</a>';
 }elseif($isleader == 1 && $CMRank == 2){
                 $Options = '<a
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&kick=' . $CMCID . '">Kick</a><big> - </big><a
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&demote=' . $CMCID . '">Demote</a>';
 
}elseif ($isleader == 2 && $CMRank == 9){ 
$Options = '<a
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&kick=' . $CMCID . '">Kick</a>';
  }elseif ($isleader == 1 && $CMRank == 1){
  $Options = '<a
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&closeclan=true"><span style="font-weight: bold; color: rgb(255, 0, 0);">Close
Clan</span>
<br><a
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&resetclanscore=true"><span style="font-weight: bold; color: rgb(200, 20, 255);">Reset Score</span>
</a>';
   }elseif ($CMAID == $myAID){
   $Options = '<a style="color: rgb(255, 204, 0);"
 href="http://toffigunz.de/index.php?do=Clanadmin&CLID=' . $CLID . '&leaveclan=' . $CMCID . '"><span
 style="font-weight: bold;">Leave Clan</span>
</a>';
     }else{
$Options = '<span style="font-style: italic;">None</span>'; 
}    
            
                switch ($CMRank){
                Case 9;
                $CMRankstr = '<span style="font-weight: bold; color: rgb(255, 204, 255);">Member</span>';
                Break;
                Case 2;
                $CMRankstr = '<span style="font-weight: bold; color: rgb(51, 255, 51);">Administrator</span>';
                Break;
                Case 1;
                $CMRankstr = '<span style="font-weight: bold; color: rgb(255, 0, 0);">Leader</span>';
                Break;
                Default;
                $CMRankstr = '<span style="font-weight: bold; color: rgb(102, 0, 0);">Member</span>';
                Break;
                }
                                
                ?>
                <tr>
                  <td bgcolor="#232323" width="131"><a
 href="http://toffigunz.de/index.php?do=Profile&User=<?echo '' . $CMAID . ''; ?>"><?=FormatCharNameclanadmin($CMName, $CMAUGrade)?></a></td>
                  <td bgcolor="#232323" width="50"><?=$CMLevel?></td>
                  <td bgcolor="#232323" width="75"><?=$CMRankstr?></td>
                  <td bgcolor="#232323" width="40"><?=$CMREGD?></td> 
                  <td bgcolor="#232323" width="40"><?=$CMCWP?></td>
                 <td bgcolor="#232323" width="120"><?=$Options?></td>
                </tr>
                <? }}else{
echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">



<div style="text-align: center;" id="box">
<div class="news">
<h2>
<table
 style="text-align: left; margin-left: auto; margin-right: auto;"
 bgcolor="#151515" width="408">
  <tbody>
    <tr>
      <td><div style="text-align: center;">This Clan does not have
any Clan Members yet!</div>
</td>
    </tr>
  </h2>
</div>
</div>';     }            ?>
              </tbody>
            </table>
            </div>
            </td>
            <td width="13">&nbsp;</td>
          </tr>
          <tr>
            <td width="9">&nbsp;</td>
            <td colspan="3" width="376">&nbsp;</td>
            <td width="13">&nbsp;</td>
          </tr>
        </tbody>
      </table>
      </div>
      </td>
    </tr>
  </tbody>
</table>
</body>
</html>