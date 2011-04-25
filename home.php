<?php if(session_start()){include_once 'engine/l2wap1.0.php'; db_connect($error);}

	if((!$_SESSION["login"])&&(!$_SESSION["pass_key_id"]))
	{header("Location:index.php");} 

 ?>
<html>
<head>
<title><?=site_name ?></title>
<link type="text/css" rel="stylesheet" href="phdx_theme/css/main_style.css" />
</head>
<body background="phdx_theme/bg.png">

<div id="main">

<center><img src="phdx_theme/images/l2cp.png" />
<br/>
</center>
<div id="tool_bar_top">

</div>
<div id="left_menu">
<a href="index.php"><img src="phdx_theme/images/menu/home.png" /></a><br/>

<a href="search.php"><img src="phdx_theme/images/menu/stats.png" /></a><br/>

<a href="settings.php"><img src="phdx_theme/images/menu/settings.png" /></a><br/>

<a href="home.php?option=add_item"><img src="phdx_theme/images/menu/add_item.png" /></a>
</div>
<div id="content">
<?php 


if((isset($_GET["option"])))
{

 $option = $_GET["option"];
 if($option == add_item){add_item();}
 
} else { my_account_viewer(); }
?>
<?php echo '<p align="center" style=" color:#111;font-size:10px;font-famile:Verdana;"> 2011 © MIKQ. L2W.A.P '.$set_version.'</p>'; ?>
</div>
</div>

</body>
</html>
