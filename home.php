<?php session_start(); if((!$_SESSION["login"])&&(!$_SESSION["pass_key_id"])){header("Location:index.php");}

include_once 'config/db.php'; db_connect(); 
	include_once 'l2cp.php';

 ?>
<html>
<head>
<title><?=$start_page ?></title>
<link type="text/css" rel="stylesheet" href="phdx_theme/css/main_style.css" />
</head>
<body background="bg.png">

<div id="main">
<center><img src="phdx_theme/images/l2cp.png" />
<br/>
<div id="menu_h">
<a title="" href="?option=accounts&get_access=1">Accounts</a>
<a title="" href="?option=chars&get_access=1">Characters</a> 
<a  title=""href="?option=my_account&get_access=1">My account</a>
<a title="" href="index.php?end=1">Exit</a>
</div>
</center>
<?php 
if(isset($_GET["option"])&&($_GET["get_access"])){

 $option = $_GET["option"];
 $get_access = (int)$_GET["get_access"];

 if(($option == chars)&&($get_access == 1)){
 
 chars_viewer();
 
 }
}

if(isset($_GET["option"])&&($_GET["get_char_id"])){

	$option = $_GET["option"];
	
 if($option == char_items){
	
	$get_charId = (int)$_GET["get_char_id"];
		char_items($get_charId);

 } 
}
if((isset($_GET["char_id"])&&($_GET["option"]))){
 $option = $_GET["option"];
	
	if($option == add_item){
		$get_charId = (int)$_GET["char_id"];
				add_item($get_charId);
 }
}
?>

</div>

</body>
</html>
