<?php session_start(); 

	include_once 'config/db.php';
		db_connect();
		
		if($_GET["end"] == 1){
		unset($_SESSION["login"]);
		unset($_SESSION["pass_key_id"]);
		}
		
		$way = (int)$_GET["auth"];
	if($way == 1){	
		if((isset($_POST["login"])&&($_POST["password"]))&&($_POST["login"] != "")&&($_POST["password"] != "")){
		
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
		 }else{echo 'Access Leve > 127';}
		 
		 } else if(($login != $login_check["login"])){echo 'Login Error';}
		   else if (($pass != $login_check["password"])){echo 'Password Error';}
		   mysql_close($sql);
		}
		
	}	
		
	$script = $_SERVER["SCRIPT_NAME"].'?auth=1';	
	
	if((isset($_SESSION["login"])&&($_SESSION["pass_key_id"]))){
	
	header("Location:home.php");
	
	}
	
      ?>
<html>
<head>
<title><?=$start_page ?></title>
<link type="text\css" rel="stylesheet" href="phdx_theme/login_style.css" />
</head>
<body>

<div id="login">
<form action="<?=$script ?>" method="POST">
<table>
<tr>
 <td>
	Login: 
 </td>
 <td>
	<input type="text" name="login" />
 </td>
</tr>
<tr>
<td>
	Password: 
 </td>
 <td>
	<input type="password" name="password" />
 </td>
</tr>
<tr>
<td>

</td>
 <td> 
	<input type="submit" value="Log IN" />
 </td>
</tr> 
</form>


</div>

</body>
</html>
