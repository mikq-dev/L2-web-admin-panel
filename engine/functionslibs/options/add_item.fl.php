<?php
function add_item($get_charId){
?>
<form action="" method="POST">
<table align="center" id="add_item-t">
<tr style="border-bottom:1px solid #333;">
<td style="border-bottom:1px solid #333;"> �������� ������� ���������, </td><td style="border-bottom:1px solid #333;"> <?php $sql = mysql_fetch_array(mysql_query("SELECT char_name from characters where charId='{$get_charId}'")) ;echo $sql["char_name"];?></td>
</tr>
<tr>
<td>id ��������:</td><td> ����������:</td>
</tr>
<tr>
<td><input type="text" name="item_id" /></td><td><input type="text" name="item_count" /></td><td><input type="submit" value="��������" /></td>
</tr>
</table>
</form>

<?php 

if((isset($_POST["item_id"])&&($_POST["item_count"]))){


 $item_id = (int)$_POST["item_id"];
 $item_count = (int)$_POST["item_count"];
 
 if(($item_id != "")&&($item_count != "")){
 
 mysql_query("INSERT INTO items () values ()");
 
 
 }




}



?>


<?php }
?>