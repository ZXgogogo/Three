<?php

	var_dump($_FILES);	
	echo $names=$_POST["name"];
	echo $intro=$_POST["intro"];
	echo $writer=$_POST["writer"];
	echo $chubanshe=$_POST["chubanshe"];
	echo $date=$_POST["date"];
	echo $price=$_POST["price"];
	echo $ISBN=$_POST["ISBN"];
	//要先判断一下有木有img1这个文件夹。
		if (!file_exists("./img1")){
		if (!mkdir("./img1")){
			echo "上传失败了吧";
			return;
		}
	}
	//先把图片保存起来
	move_uploaded_file($_FILES["picture"]["tmp_name"],"./img1/".$_FILES["picture"]["name"]);
	echo $picture="img1/".$_FILES["picture"]["name"];
			$db=mysql_connect("localhost","root","");
			mysql_select_db("books");
			mysql_query("set names utf8");
			$query="insert into bookes(name,intro,writer,chubanshe,date,price,ISBN,picture) values('$names','$intro','$writer','$chubanshe','$date','$price','$ISBN','$picture')";
			$result=mysql_query($query);
			echo "注册成功";
			
			
?>


