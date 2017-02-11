<?php 

    header("Content-type:text/html;charset=utf-8");
    date_default_timezone_set('PRC');
	$db=mysql_connect("localhost","root","");
	mysql_select_db("car");
	mysql_query("set names utf8");  
	
	
	
	
	//PHP连接数据库的标准 模板
//	$db=mysql_connect("localhost","root","");
//	mysql_select_db("myfirstsql");
//	$query="select * from user";
//	$result=mysql_query($query);
//	$row=mysql_fetch_array($result);



//	var newDate=new Date();
////					newDate.setHours(9);
//					newDate.setTime(data[0].times*1000);
//					console.log(newDate.setHours());
?>