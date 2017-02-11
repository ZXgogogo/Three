<?php
	header("Content-type:text/html;charset=utf-8");
	date_default_timezone_set('PRC');
	mysql_connect("localhost","root","");
	mysql_select_db("register");
	mysql_query("set names utf8");  
	$name=$_POST["username"];
	$password=$_POST["password"];
	$query="INSERT INTO `res`(`username`, `password`) VALUES('$name','$password')";
	$result=mysql_query($query);
	if ($result) {
		echo "注册成功,请返回<a href='1.index.php'>登录</a>页面";
			
	}else {
		echo "请重新注册";
	}
?>