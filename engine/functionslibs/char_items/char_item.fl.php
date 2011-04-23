<?php 
		function char_items($get_charId){
		include_once 'char_item=icons.fl.php';
		include_once 'char_item=names.fl.php';
		include_once 'char_item=count.fl.php';
?>		
	<table align="center">
	 <tr>
	<td align="center">Иконка</td>	<td>Название предмета</td> 	<td>Заточен*</td> 	<td>Действия</td>
	 </tr>
		
	  <tr>
	  <td align="center"><?=items_icon($get_charId); ?></td>  <td><?=items_name($get_charId); ?></td> 	<td></td> 	<td></td>
	  </tr>
	</table>
		
<?php	
}
?>