<?php
 header("Content-type:text/html;charset=utf-8");
 date_default_timezone_set('PRC');
$db=mysql_connect("localhost","root","");
mysql_select_db("register");
mysql_query("set names utf8");
$name=$_POST["username"];
$password=$_POST["password"];
$uuu=$_POST["uuu"];
session_start();
$query="select * from res where username='$name' and password='$password'";
$result=mysql_query($query);

//如果你同意了设置七天免登陆功能，那么就会设置cookie
//然后下一次输入别的用户名的时候，如果也设置七天免登陆功能
//那么这次的cookie就会覆盖上次的cookie的值
//但如果下一次，你没要七天免登陆功能
//那么这次的cookie还是第一次的cookie
if (mysql_num_rows($result)==1&&$uuu=="要"){
	$row=mysql_fetch_assoc($result);
	$_SESSION["userId"]=$row["userId"];
//	把上次设置的cookie设置为空
	setcookie("username",null);
	setcookie("password",null);
	setcookie("username",$name,time()+3600*24*7);
	setcookie("password",$password,time()+3600*24*7);
	echo $row["userId"];
	echo "登录成功且具有了7天免登录功能";
}else if(mysql_num_rows($result)==1){
	$row=mysql_fetch_assoc($result);
	echo $row["userId"];
	$_SESSION["userId"]=$row["userId"];
		echo "登录成功没有7天免登录功能";
	}else{
//		如果输进了一段错误的数据，那么肯定不会赋予$_SESSION["userId"]
//		所以会导致session用的上次的session[userId]
//		所以可以在这里对上次的session进行销毁
//对session进行操作的时候，如果是赋值这种的
//会立刻能够显现，而如果是销毁这种的在当前页面是无法生效的
//必须要刷新，或跳转到新的页面才能生效
		session_destroy();
		echo "没有此用户,请先注册";
	}

?>
<hr>
<a href="9.index.php">验证有木有此用户,如果有会直接跳到登录成功页面,如果没有会直接跳到注册页面</a>
