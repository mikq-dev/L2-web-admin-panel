<?php function add_item($get_charId){ ?>

<?php 

if((isset($_POST["item_id"])&&($_POST["item_count"]))){


 $item_id = (int)$_POST["item_id"];
 $item_count = (int)$_POST["item_count"];
 if($_POST["enchant_value"] < 51){
	$item_enchant = (int)$_POST["enchant_value"];
 }else{$message = "<font color='red'>Error: Max Enchant Value - 51</font>";}
 
 if(($item_id != "")&&($item_count != "")){
 
 mysql_query("INSERT INTO items (`owner_id`,`item_id`,`count`,`enchant_level`,`loc`) values ('{$get_charId}','{$item_id}','{$item_count}','{$item_enchant}','INVENTORY')");
 
	$message = "<font color='green'>Item add</font>";
 
 }




}



?>

<form action="" method="POST">
<table align="center" id="add_item-t">
<tr style="border-bottom:1px solid #333;">
<td style="border-bottom:1px solid #333;"> Add item ,  <?php $sql = mysql_fetch_array(mysql_query("SELECT char_name from characters where charId='{$get_charId}'")) ;echo $sql["char_name"];?> </td>
</tr>
<tr>
<td>Item id:</td><td> Count:</td><td> Enchant Value:</td>
</tr>
<tr>
<td><input type="text" name="item_id" /></td><td><input type="text" name="item_count" /></td><td><input type="text" name="enchant_value" /></td><td><?php if(isset($message)){echo $message;}else{echo '<input type="submit" value="ADD" />';} ?></td>
</tr>
<tr>
<td>or
	<select name="fir_items" disabled>
		<option value="57">Adena
		<option value="4537">Silver_Shilen
		<option value="4356">Gold Einhasad
	</select> 	
</td> <td><input type="text" name="item_count" disabled /></td>
</tr>
</table>
</form>

<?php } ?>