<?php 
function items_icon($get_charId){
$sql = mysql_query("SELECT * from items where owner_id='{$get_charId}'");
		while($item_icon = mysql_fetch_assoc($sql)){
		?>
<p>
<?php 

 switch($item_icon["item_id"]){
 
 case 57:
 echo $adena = '<img src="http://www.linedia.ru/w/images/1/1b/Etc_adena_i00_0.jpg" width="16" heidth="16" />';
  break;
 case 4356:
	echo $silver_shilen = '<img src="http://www.linedia.ru/w/images/7/70/Etc_magic_coin_gold_i02_0.jpg" width=16 height=16 />';
  break;
 case 4357:
  echo $gold_eish =  '<img src="http://www.linedia.ru/w/images/5/5b/Etc_magic_coin_silver_i02_0.jpg" width=16 height=16 />';
  break;
 
 }



?>	
	</p>	
<?php		}

}
?>