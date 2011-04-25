<?php
function chars_viewer(){
echo '<table align="center" id="my_chars">
	<tr id="my_chars_titles">
	  <td align="center">Nick</td> <td align="center">Account</td> <td align="center">Level</td><td align="center"> Status</td><td align="center"> AcessLevel</td><td align="center">
	  '; ?>
	  </td>
	</tr> <?php
 
   $sql = mysql_query("SELECT * from characters");
	  while($chars = mysql_fetch_assoc($sql)){ ?>
	
	 
	  
	<tr>
	  <td align="left"> <a href="?option=char_info&get_char_id=<?=$chars["charId"] ?>"><?=$chars["char_name"] ?></a></td> 
	    <td align="left"> <a href="?option=account_info&get_account=<?=$chars["account_name"] ?>"><?=$chars["account_name"] ?></a></td> 
	  <td align="center"><?=$chars["level"] ?></td>
	  <td align="center">
	  <?php switch($chars["online"]){
		
		case 1:
			echo '<font color="green">OnLine</font>';
		break;
		case 0:
			echo '<font color="red">OffLine</font>';
		break;
		
		} ?>
		</td>
		<td align="center">
		<form method="POST">
		<select name="access">
		 <option value="1" <?php if($chars["accesslevel"] == 1){echo 'selected="yes"';} ?>>Administrator
		 <option value="0" <?php if($chars["accesslevel"] == 0){echo 'selected="yes"';} ?>>Player
		<option value="-1" <?php if($chars["accesslevel"] == -1){echo 'selected="yes"';} ?>>Banned
		</select>
		</form>
		</td>
		<td>
		<form action="" method="get" >
		
		<select name="option">
		 <option value="add_item">Add item</option>
		 <option value="edit_title" onclick="edit_title();">Set title</option>
		<option value="add_noble">Nobless </option>
		</select>
		<input type="hidden" name="char_id" value="<?=$chars["charId"] ?>" />
		</td>
		<td>
		<input type="submit" style="border:1px solid #222;" value="Ok" />
		</form>
		</td>
	</tr>
	
<?php
 }
  
  echo '</table>
   ';
   
}
?>