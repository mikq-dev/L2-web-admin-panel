<?php function add_item(){ ?>

<?php 

if((isset($_POST["item_id"])&&($_POST["item_count"])&&($_POST["char_name"]))){
if(($_POST["item_id"] > 0)&&($_POST["item_count"] > 0))
{
	if($qp = mysql_query("SELECT charId from characters where char_name='{$_POST["char_name"]}'"))
		{
			$get = mysql_fetch_array($qp);
		}

 $item_id = (int)$_POST["item_id"];
 $item_count = (int)$_POST["item_count"];
}
 
 if($_POST["enchant_value"] < 51)
 {
	$item_enchant = (int)$_POST["enchant_value"];
	
 }else{$message4 = "<font color='red'>Error: Max Enchant Value - 51</font>";}
 
 if(($item_id > 0)&&($item_count > 0)&&($get["charId"] > 0)){
 
 $qpr = mysql_query("SELECT * from items where owner_id='{$get["charId"]}'");
	$item_check = mysql_fetch_array($qpr);
		if($item_check["item_id"] != $item_id)
		{
			echo mysql_query("INSERT INTO items (`owner_id`,`item_id`,`count`,`enchant_level`,`loc`) values ('{$get["charId"]}','{$item_id}','{$item_count}','{$item_enchant}','INVENTORY')");
			
		}
		elseif($item_id == $item_check["item_id"]){$item_count = $item_check["item_id"] + $item_count; mysql_query("UPDATE items SET items.count='{$item_count}' where owner_id='{$get["charId"]}'");}
	$message_btn = "<div id='add_item_ok'></div>";
		?>
		
		<script>
		var get_itemId,get_itemCount,get_Char;
		
		get_itemId = <?php echo $item_id; ?>;
		get_Char = <?php echo $get["charId"]; ?>;
		get_itemCount = <?php echo $item_count; ?>;
		
		alert('Предмет выдан, id: '+ get_itemId + ', количество ' + get_itemCont + ', персонажу ' + get_Char);
		//window.refresh;
		</script>
		
		<?php
 }


}



?>
<script>
function check(){
 if ((document.forms[0].char_name.value < 1) || (document.forms[0].username.value == "")) {
  alert('Пожалуйста, введите имя персонажа');
   return false
  }
 
 if ((document.forms[0].item_id.value < 1) || (document.forms[0].useremail.value == "")) {
  alert('Пожалуйста, введите норер предмета');
   return false
  } 
 if (document.forms[0].item_count.value < 1) {
  alert('Не правильное количество предмета');
   return false
 }  
 
}
</script>
<form action="" method="POST" onsubmit="return check();">
<table align="center" id="add_item-t">
<tr style="border-bottom:1px solid #333;">
<td style="border-bottom:1px solid #333;">Введите имя персонажа: <input type="text" name="char_name" /> </td>
</tr>
</table>
<table align="center" id="add_item-t">
<tr>
<td>Уникальный номер(id):</td><td> Количество:</td><td> Заточить на:</td>
</tr>
<tr>

	<td><input type="text" name="item_id" /></td>

		<td><input type="text" name="item_count" /></td>

		<td><input type="text" name="enchant_value" /></td>

	

</tr>
</table>
<p align="center" id="add_item-t">Или выберите предмет из списка:</p>
<table align="center" id="add_item-t">
<tr>
<td>
	<select name="fir_items" disabled>
		<option value="57">Adena
		<option value="4537">Silver_Shilen
		<option value="4356">Gold Einhasad
	</select> 	
</td> <td><input type="text" name="item_count" disabled /></td>
</tr>
</table>
<table align="center" id="add_item-t">
<tr>
<td><?php if((isset($message_btn))){echo $message_btn;}else{echo '<input type="submit" value="Выдать предмет" />';} ?></td>
</tr>
<tr>
	<td><?php echo $message1,$message2,$message3,$message4; ?></td>
</tr>	

</table>
</form>

<?php } ?>