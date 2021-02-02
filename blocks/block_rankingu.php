<?
$res = mssql_query("SELECT TOP 9 * FROM Account a, Character b WHERE b.AID=a.AID AND a.UGradeID !=255|254|253|252 AND DeleteFlag=0 ORDER BY Level DESC, XP DESC, KillCount DESC, DeathCount ASC");
?>
<style type="text/css">
<!--
body,td,th {
	font-family: verdana;
	font-size: 10px;
	color: #FFF;
	background-repeat: no-repeat;
}
.Estilo1 {color: #090912}
.Estilo2 {	font-size: 10px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
-->
</style>
<table width="174" height="155" border="0" style="background: url('images/md_ir.png') no-repeat top center; background-size: 100%;">
<tr>
    <td><table width="169" height="87" border="0" style="border-collapse: collapse; margin: 5px">
      <tr>
        <td height="25" colspan="2">&nbsp;</td>
      </tr>
      <?
      $i = 1;
                                    if(mssql_num_rows($res) == 0){
                                        ?>
      <tr>
        <td height="23" colspan="2">
          <div align="left" class="Estilo2">No Data &laquo; </div></td>
      </tr>
     <?
                                    }else{
                                    while($user = mssql_fetch_assoc($res)){
                                    
                                    ?>
      <tr>
	  <td width="7" align="left">
  															<img border="0" src="images/order/<?=$i?>.jpg" width="10" height="9"></td>
  															<td width="104" align="left">
         <?=$user['Name']?></td>
       <td width="27" align="left">
           <?=$user['Level']?> Lv.</td>
      </td>
      </tr>
      <?
      $i++;
    }}?>
    </table>    <td height="35"></tr>
</table>
