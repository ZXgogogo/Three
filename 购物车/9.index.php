<?php
session_start();
echo $_SESSION["userId"];
if (isset($_SESSION["userId"])){
	echo "写这个网页的作用就是为了让我们不是用a标签进行跳转，而是PHP页面直接跳转到PHP页面";
	header("Location:2.fenye.php");
} else {
	header("Location:8.register.php?");
	}

?>