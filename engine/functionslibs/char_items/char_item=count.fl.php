<?php 
function items_count($get_charId){
$sql = mysql_query("SELECT * from items where owner_id='{$get_charId}'");
		while($item_names = mysql_fetch_assoc($sql)){
		?>
<p>
<?php 

 switch($item_names["item_id"]){
 
 case 57:
  echo $item_count = $item_names["count"];
  break;
 case 4356:
 echo $item_count = $item_names["count"];
  break;
 case 4357:
  echo $item_count = $item_names["count"];
  break;
  case 10650:
  echo $item_count = $item_names["count"];
  break;
 case 10:
 echo $item_count = $item_names["count"];
  break;
 case 1146:
  echo $item_count = $item_names["count"];
  break;
 }



?>	
	</p>	
<?php		}

}
?>