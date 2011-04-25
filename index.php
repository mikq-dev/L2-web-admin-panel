<?php session_start(); include_once 'engine/config/db.php'; db_connect();
					   
	
		if($_GET["end"] == 1){
			unset($_SESSION["login"]);
			unset($_SESSION["pass_key_id"]);
		}
		
		$way = (int)$_GET["auth"];
	if($way == 1){	
		if((isset($_POST["login"])&&($_POST["password"]))&&($_POST["login"] != "")&&($_POST["password"] != "")){
		$login = null;$pass = null;
		$login = mysql_real_escape_string($_POST["login"]);
		$pass = base64_encode(pack("H*", sha1(utf8_encode($_POST["password"])))); 
		
			$sql = mysql_query("SELECT login,accessLevel,password from accounts where login='{$login}' ");
			$login_check = mysql_fetch_array($sql);
			
		if(($login == $login_check["login"])&&($pass == $login_check["password"]))
		 {
		 $status = true;
		 
		 $_SESSION["login"] = $login_check["login"];
		 if($login_check["accessLevel"] == 127){
			$_SESSION["pass_key_id"] = $login_check["accessLevel"];
		 }else{echo 'У вас нет прав';}
		 
		 } else if(($login != $login_check["login"])){$error = 'Login Error';}
		   else if (($pass != $login_check["password"])){$error = 'Password Error';}
		   
		}
	
	}	
		
	$script = $_SERVER["SCRIPT_NAME"].'?auth=1';	
	
	if((isset($_SESSION["login"])&&($_SESSION["pass_key_id"]))){
	
		header("Location:home.php");
	
	}
include_once 'engine/config/settings.php';
if(!defined('VERSION')) die ("VERSION HEKKING");
      ?>
<html>
<head>
<title>L2 W.E.B 1.05</title>
<link type="text/css" rel="stylesheet" href="phdx_theme/css/main_style.css" />
</head>
<body>

<div id="login">
<form action="<?=$script ?>" method="POST">
<table>
<tr>
 <td id="text_login_form">
	Логин: 
 </td>
 <td>
	<input type="text" name="login" id="login_form" />
 </td>
</tr>
<tr>
<td id="text_login_form">
	Пароль: 
 </td>
 <td>
	<input type="password" name="password" id="login_form" />
 </td>
</tr>
<tr>
<td>

</td>

 <td align="right"> 
	<input type="submit" value="Войти" />
 </td>
</tr> 
</form>


</div>

</body>
</html>
