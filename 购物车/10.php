<?php
$source = "hello1,hello2,hello3,hello4,hello5";//按逗号分离字符串 
$hello = explode(',',$source); 

for($index=0;$index<count($hello);$index++) 
{ 
echo $hello[$index];echo "</br>"; 
} 
?>

	$db=mysql_connect("localhost","root","");
			mysql_select_db("car");
			mysql_query("set names utf8");
			
			$page=$_GET["dd"];
			echo $page;
			//如何进行字符串的拆分呢？？
			$hello = explode(',',$page); 
			for($index=0;$index<count($hello);$index++) 
			{ 
			echo $hello[$index];echo "</br>"; 
			$query="insert into car ('carId','picture','name','num','price') values ('$hello[$index]')";
				} 