<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<style>
	.login{
		text-align: center;
		margin-top: 200px;
	}
	ul{
		list-style: none;
	}
	</style>
</head>
<body>
	<div class="login">
	<h2>USER LOGIN</h2> 
	<form action="<?php echo U(Index.'/Login/loginHandle');?>" method="post">
		<ul><li>account:</li><li><input type="text" name="account" /></li></ul>
		<ul><li>password:</li><li><input type="password" name="pwd" /></li></ul>
		<ul><li><input type="submit" value="login" /></li></ul>
	</form>
	</div>
	<div align="center"><a href="<?php echo U(Index.'/Register/index');?>">register..</a></div>
	<div align="center"><p>test account:swon  pwd:swon</p><p>account:liu  pwd:liu</p></div>
</body>
</html>