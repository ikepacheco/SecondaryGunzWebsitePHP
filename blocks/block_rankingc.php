<?
$res = mssql_query("SELECT TOP 9 * FROM Clan WHERE (DeleteFlag=0 OR DeleteFlag=NULL) AND (Wins != 0 OR Losses != 0) ORDER BY Point DESC, TotalPoint DESC, Wins DESC, Losses ASC");?>
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
<table width="174" height="155" border="0" style="background: url('images/md_cr.png') no-repeat top center; background-size: 100%;">
<tr>
    <td>
    <table width="169" height="87" border="0" style="border-collapse: collapse; margin: 5px">
      <tr>
        <td height="25" colspan="2">&nbsp;</td>
      </tr>
      <?
      $i = 1;
                                    if(mssql_num_rows($res) == 0){
                                        ?>
      <tr>
        <td height="23" colspan="2">
          <div align="left" class="Estilo2">No hay datos &laquo; </div></td>
      </tr>
     <?
                                    }else{
                                    while($user = mssql_fetch_assoc($res)){

                                    ?>
      <tr>
	  <td width="13" align="left">
  															<img border="0" src="images/order/<?=$i?>.jpg" width="10" height="9"></td>
  															<td width="80" align="left" style=" font-size: 6pt">
         <?=$user['Name']?></td>
       <td width="45" align="left">
           <?=$user['Point']?> Pts.</td>
      </td>
      </tr>
      <?
      $i++;
      }}
      ?>
    </table>    <td height="39"></tr>
</table>
<p><a href="index.php?do=donate"><img src="../images/donate.png" width="156" height="auto"></a></p>
<p><a href="index.php?do=usercp"><img src="../images/user.png" width="160" height="auto" /></a></p>
