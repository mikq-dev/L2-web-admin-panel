<?php
  
    function db_connect(){
	
	$db['host'] ='localhost'; 
	$db['root_user'] ='root'; 
	$db['password'] ='vertrigo'; 
	$db['name'] ='l2universe'; 
	
	if(mysql_connect($db['host'], $db['root_user'], $db['password'])){true;}
	else{false;}
	mysql_select_db($db['name']);

}
?>