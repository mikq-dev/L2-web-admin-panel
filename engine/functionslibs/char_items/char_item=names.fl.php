<?php 
function items_name($get_charId){
$sql = mysql_query("SELECT * from items where owner_id='{$get_charId}'");
		while($item_names = mysql_fetch_assoc($sql)){
		?>
<p>
<?php 

 switch($item_names["item_id"]){
 
 case 57:
	echo '<a href="" title="Количество:'.$item_names["count"].'">Адена</a>';
  break;
 case 4356:
 	echo '<a href="" title="Количество:'.$item_names["count"].'">Silver Shilen (Серебряная Шилен)</a>';
  break;
 case 4357:
	echo  '<a href="" title="Количество:'.$item_names["count"].'">Gold Einhasad (Золотая Эйнхасад)</a>';
  break;
 
 }



?>	
	</p>	
<?php		}

}
?>